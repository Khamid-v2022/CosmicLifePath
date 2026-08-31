<?php

namespace Tests\Feature;

use Illuminate\Support\Carbon;
use Tests\TestCase;

class AgeGateTest extends TestCase
{
    protected function tearDown(): void
    {
        Carbon::setTestNow();

        parent::tearDown();
    }

    public function test_a_visitor_who_turns_18_tomorrow_is_blocked(): void
    {
        Carbon::setTestNow(Carbon::create(2026, 4, 1));

        // Born 2008-04-02: still 17 on 2026-04-01, and only the year would pass.
        $this->from('/birth-alignment/aries')
            ->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 2, 'year' => 2008, 'ext' => ''])
            ->assertRedirect('/birth-alignment/aries')
            ->assertSessionHasErrors('age');

        $this->assertNull(session('cosmic.reading.birth'));
    }

    public function test_a_visitor_who_turns_18_today_is_allowed(): void
    {
        Carbon::setTestNow(Carbon::create(2026, 4, 1));

        $this->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 1, 'year' => 2008, 'ext' => ''])
            ->assertRedirect('/final-alignment/aries')
            ->assertSessionHasNoErrors();
    }

    public function test_the_blocked_visitor_sees_the_adults_only_notice(): void
    {
        Carbon::setTestNow(Carbon::create(2026, 4, 1));

        $this->from('/birth-alignment/aries')
            ->post('/birth-alignment', ['sign' => 'aries', 'month' => 4, 'day' => 2, 'year' => 2008, 'ext' => '']);

        $this->get('/birth-alignment/aries')
            ->assertOk()
            ->assertSee('Cosmic Life Path readings are available to adults only.')
            ->assertSee('at least 18 years old');
    }
}
