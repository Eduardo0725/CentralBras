<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthenticationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testVerifyIfUserIsAuthenticated()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/account')
                ->type('email', User::all()->random()->email)
                ->type('password', 'password')
                ->click('.box [type=submit]')
                ->assertAuthenticated()
                ->logout();
        });
    }
}
