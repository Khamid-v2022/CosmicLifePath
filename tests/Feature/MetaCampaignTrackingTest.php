<?php

namespace Tests\Feature;

use Tests\TestCase;

class MetaCampaignTrackingTest extends TestCase
{
    private const META_LANDING = '/?fbclid=TEST_META_CLICK_ID&vtid=meta_clp_us_launch'
        .'&utm_source=meta&utm_medium=paid_social&utm_campaign=clp_test&utm_content=creative_test';

    public function test_landing_captures_campaign_parameters_into_the_session(): void
    {
        $this->get(self::META_LANDING)
            ->assertOk()
            ->assertSessionHas(COSMIC_TRACKING_SESSION_KEY.'.params.fbclid', 'TEST_META_CLICK_ID')
            ->assertSessionHas(COSMIC_TRACKING_SESSION_KEY.'.params.vtid', 'meta_clp_us_launch')
            ->assertSessionHas(COSMIC_TRACKING_SESSION_KEY.'.params.utm_source', 'meta')
            ->assertSessionHas(COSMIC_TRACKING_SESSION_KEY.'.params.utm_medium', 'paid_social')
            ->assertSessionHas(COSMIC_TRACKING_SESSION_KEY.'.params.utm_campaign', 'clp_test')
            ->assertSessionHas(COSMIC_TRACKING_SESSION_KEY.'.params.utm_content', 'creative_test');
    }

    public function test_first_values_are_kept_and_never_replaced_later(): void
    {
        $this->get(self::META_LANDING)->assertOk();

        $this->get('/?fbclid=SECOND_CLICK_ID&vtid=other_campaign')
            ->assertOk()
            ->assertSessionHas(COSMIC_TRACKING_SESSION_KEY.'.params.fbclid', 'TEST_META_CLICK_ID')
            ->assertSessionHas(COSMIC_TRACKING_SESSION_KEY.'.params.vtid', 'meta_clp_us_launch');
    }

    public function test_unsafe_values_are_rejected(): void
    {
        $this->get('/?fbclid[]=a&vtid=%3Cscript%3Ealert(1)%3C/script%3E&utm_source='.str_repeat('a', 600))
            ->assertOk()
            ->assertSessionMissing(COSMIC_TRACKING_SESSION_KEY);
    }

    public function test_meta_traffic_is_never_pushed_into_the_no_opt_in_path(): void
    {
        $this->get(self::META_LANDING)->assertOk();

        // Even an explicit ext=no is ignored for this visitor.
        $this->get('/birth-alignment/aries?ext=no')
            ->assertOk()
            ->assertSessionMissing('cosmic.reading.ext');

        $this->post('/birth-alignment', [
            'sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => 'no',
        ])->assertRedirect('/final-alignment/aries');
    }

    public function test_non_meta_traffic_keeps_the_existing_no_opt_in_path(): void
    {
        $this->get('/?ext=no')->assertOk();

        $this->post('/birth-alignment', [
            'sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => 'no',
        ])->assertRedirect('/path-unfolding/aries?ext=no');
    }

    public function test_meta_visitor_reaches_a_checkout_link_with_the_vtid_and_fbclid(): void
    {
        $this->get(self::META_LANDING)->assertOk();

        $this->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => ''])
            ->assertRedirect('/final-alignment/aries');

        $this->post('/final-alignment', ['name' => 'Test', 'email' => 'test@example.com'])
            ->assertRedirect('/path-unfolding/aries');

        $this->get('/path-unfolding/aries')->assertOk();
        $this->get('/preview-reveal/aries')->assertOk();

        $response = $this->get('/private-offer/aries')->assertOk();

        $response->assertSee('vtid=meta_clp_us_launch', false);
        $response->assertSee('fbclid=TEST_META_CLICK_ID', false);
        // Product, template and affiliate/vendor ids are untouched.
        $response->assertSee('cbitems=fe-aries47', false);
        $response->assertSee('cbitems=fe-aries15', false);
        $response->assertSee('template=BCoFTclp', false);
        $response->assertSee('cbfid=63364', false);
        $response->assertDontSee('vtid=cta1', false);
    }

    public function test_direct_traffic_checkout_link_is_untouched(): void
    {
        $this->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => ''])
            ->assertRedirect('/final-alignment/aries');

        $this->post('/final-alignment', ['name' => 'Test', 'email' => 'test@example.com'])
            ->assertRedirect('/path-unfolding/aries');

        $response = $this->get('/private-offer/aries')->assertOk();

        $response->assertSee('vtid=cta1', false);
        $response->assertDontSee('meta_clp_us_launch', false);
        $response->assertDontSee('fbclid', false);
    }

    public function test_an_fbclid_without_the_meta_vtid_does_not_reach_clickbank(): void
    {
        $this->get('/?fbclid=ORGANIC_SHARE_CLICK_ID')->assertOk();

        $this->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => '']);
        $this->post('/final-alignment', ['name' => 'Test', 'email' => 'test@example.com']);

        $response = $this->get('/private-offer/aries')->assertOk();

        $response->assertSee('vtid=cta1', false);
        $response->assertDontSee('meta_clp_us_launch', false);
        $response->assertDontSee('ORGANIC_SHARE_CLICK_ID', false);
    }

    public function test_all_twelve_signs_reach_a_correct_meta_checkout_link(): void
    {
        $signs = array_keys(config('variables.signs'));

        $this->assertCount(12, $signs);

        foreach ($signs as $slug) {
            $this->flushSession();
            $this->get(self::META_LANDING)->assertOk();

            $month = (int) array_key_first(config("variables.signs.$slug.months"));
            $day = (int) config("variables.signs.$slug.months.$month")[0];

            $this->post('/birth-alignment', [
                'sign' => $slug, 'month' => $month, 'day' => $day, 'year' => 1990, 'ext' => '',
            ])->assertRedirect("/final-alignment/$slug");

            $this->post('/final-alignment', ['name' => 'Test', 'email' => 'test@example.com'])
                ->assertRedirect("/path-unfolding/$slug");

            $expectedVip = cosmic_clickbank_url(config("variables.signs.$slug.vip_purchase_url"));
            $expectedStandard = cosmic_clickbank_url(config("variables.signs.$slug.standard_purchase_url"));

            $this->get("/private-offer/$slug")
                ->assertOk()
                // escaped, because Blade renders & as &amp; inside the href
                ->assertSee($expectedVip)
                ->assertSee($expectedStandard);

            $this->assertStringContainsString('vtid=meta_clp_us_launch', $expectedVip);
            $this->assertStringContainsString('fbclid=TEST_META_CLICK_ID', $expectedVip);
            $this->assertStringNotContainsString('vtid=cta1', $expectedVip);
        }
    }

    public function test_the_generated_link_shape_is_stable(): void
    {
        $this->get(self::META_LANDING)->assertOk();

        $this->assertSame(
            'https://clifepath.pay.clickbank.net/?cbitems=fe-aries47&template=BCoFTclp&cbfid=63364'
            .'&vtid=meta_clp_us_launch&fbclid=TEST_META_CLICK_ID',
            cosmic_clickbank_url(config('variables.signs.aries.vip_purchase_url'))
        );
    }

    public function test_a_new_session_does_not_inherit_the_previous_visitors_values(): void
    {
        $this->get(self::META_LANDING)->assertOk();

        $this->flushSession();

        $this->get('/')->assertOk()->assertSessionMissing(COSMIC_TRACKING_SESSION_KEY);

        $this->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => '']);
        $this->post('/final-alignment', ['name' => 'Test', 'email' => 'test@example.com']);

        $this->get('/private-offer/aries')
            ->assertOk()
            ->assertDontSee('meta_clp_us_launch', false)
            ->assertDontSee('TEST_META_CLICK_ID', false);
    }
}
