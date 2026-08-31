<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConsentAndPixelTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'app.ga4_id' => 'G-TESTGA4ID',
            'app.clarity_id' => 'testclarity',
            'app.meta_pixel_id' => '2936742933339042',
        ]);
    }

    public function test_no_third_party_tag_is_requested_by_the_served_html(): void
    {
        $response = $this->get('/')->assertOk();

        // The markup itself must not contact anyone: the consent script decides.
        $response->assertDontSee('connect.facebook.net', false);
        $response->assertDontSee('googletagmanager.com/gtag/js', false);
        $response->assertDontSee('clarity.ms/tag', false);
    }

    public function test_consent_defaults_are_denied_and_the_banner_is_present(): void
    {
        $response = $this->get('/')->assertOk();

        $response->assertSee("analytics_storage: 'denied'", false);
        $response->assertSee("ad_storage: 'denied'", false);
        $response->assertSee("ad_user_data: 'denied'", false);
        $response->assertSee("ad_personalization: 'denied'", false);
        $response->assertSee('id="clpCcBanner"', false);
        $response->assertSee('id="clpCcModal"', false);
        $response->assertSee('Cookie Settings', false);
    }

    public function test_the_pixel_is_enabled_on_the_homepage_only(): void
    {
        $this->get('/')->assertOk()->assertSee('metaPixelEnabled: true', false);

        $this->get('/birth-alignment/aries')
            ->assertOk()
            ->assertSee('metaPixelEnabled: false', false);

        $this->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => '']);

        $this->get('/final-alignment/aries')->assertOk()->assertSee('metaPixelEnabled: false', false);

        $this->post('/final-alignment', ['name' => 'Test', 'email' => 'test@example.com']);

        foreach (['/path-unfolding/aries', '/preview-reveal/aries', '/private-offer/aries'] as $path) {
            $this->get($path)->assertOk()->assertSee('metaPixelEnabled: false', false);
        }
    }

    public function test_no_browser_lead_initiatecheckout_or_purchase_event_exists(): void
    {
        $paths = ['/', '/birth-alignment/aries'];

        foreach ($paths as $path) {
            $response = $this->get($path)->assertOk();

            $response->assertDontSee("'Lead'", false);
            $response->assertDontSee("'InitiateCheckout'", false);
            $response->assertDontSee("'Purchase'", false);
            $response->assertDontSee('googletagmanager.com/gtm.js', false);
        }
    }

    public function test_the_quizstart_handler_carries_no_visitor_information(): void
    {
        $response = $this->get('/')->assertOk();

        $response->assertSee("window.fbq('trackCustom', 'QuizStart');", false);
        // No second argument, so no sign and no other parameter can be sent.
        $response->assertDontSee("'QuizStart',", false);
    }
}
