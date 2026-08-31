<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * The full documented test journey, asserted end to end.
 *
 * Landing URL from the brief:
 *   /?fbclid=TEST_META_CLICK_ID&vtid=meta_clp_us_launch&utm_source=meta
 *    &utm_medium=paid_social&utm_campaign=clp_test&utm_content=creative_test
 */
class JourneyProofTest extends TestCase
{
    private const META_LANDING = '/?fbclid=TEST_META_CLICK_ID&vtid=meta_clp_us_launch&utm_source=meta'
        .'&utm_medium=paid_social&utm_campaign=clp_test&utm_content=creative_test';

    public function test_the_documented_meta_journey_ends_at_the_expected_checkout_links(): void
    {
        $this->get(self::META_LANDING)->assertOk();
        $this->get('/birth-alignment/aries')->assertOk();

        $this->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => ''])
            ->assertRedirect('/final-alignment/aries');

        $this->get('/final-alignment/aries')->assertOk();

        $this->post('/final-alignment', ['name' => 'Test Visitor', 'email' => 'test@example.com'])
            ->assertRedirect('/path-unfolding/aries');

        $this->get('/path-unfolding/aries')->assertOk();
        $this->get('/preview-reveal/aries')->assertOk();

        $this->assertSame([
            'https://clifepath.pay.clickbank.net/?cbitems=fe-aries47&template=BCoFTclp&cbfid=63364'
                .'&vtid=meta_clp_us_launch&fbclid=TEST_META_CLICK_ID',
            'https://clifepath.pay.clickbank.net/?cbitems=fe-aries15&template=BCoFTclp&cbfid=63364'
                .'&vtid=meta_clp_us_launch&fbclid=TEST_META_CLICK_ID',
        ], $this->checkoutLinks());
    }

    public function test_the_same_journey_as_direct_traffic_is_byte_for_byte_unchanged(): void
    {
        $this->get('/')->assertOk();

        $this->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 1990, 'ext' => '']);
        $this->post('/final-alignment', ['name' => 'Test Visitor', 'email' => 'test@example.com']);

        $this->assertSame([
            config('variables.signs.aries.vip_purchase_url'),
            config('variables.signs.aries.standard_purchase_url'),
        ], $this->checkoutLinks());
    }

    /** @return list<string> */
    private function checkoutLinks(): array
    {
        $html = $this->get('/private-offer/aries')->assertOk()->getContent();

        preg_match_all('#href="(https://clifepath\.pay\.clickbank\.net[^"]*)"#', $html, $matches);

        return array_values(array_unique(array_map(html_entity_decode(...), $matches[1])));
    }
}
