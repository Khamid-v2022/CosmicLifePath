<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class PagesSmokeTest extends TestCase
{
    public function test_every_public_get_page_still_renders(): void
    {
        $skip = ['/', 'up', 'aweber/authorize', 'aweber/callback'];
        $checked = 0;

        foreach (Route::getRoutes() as $route) {
            if (! in_array('GET', $route->methods(), true)) {
                continue;
            }

            $uri = $route->uri();

            if (in_array($uri, $skip, true) || str_contains($uri, '{')) {
                continue;
            }

            $this->get('/'.$uri)->assertOk();
            $checked++;
        }

        $this->assertGreaterThan(50, $checked);
    }

    public function test_the_cookie_settings_link_is_on_every_page_with_a_footer(): void
    {
        foreach (['/', '/privacy-policy', '/terms-service', '/about-us', '/affiliate'] as $path) {
            $this->get($path)
                ->assertOk()
                ->assertSee('data-clp-cookie-settings', false)
                ->assertSee('id="clpCcModal"', false);
        }
    }
}
