<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

// test készítés: php artisan dusk:make admin/LoginTest
class LoginTest extends DuskTestCase
{
    //use \DatabaseMigrations;

    protected $user;
    protected $baseurl;
    public function setUp(): void//test előtti beállítások

    {
        parent::setUp();
        $this->baseurl = config('dusk.baseurl');

    }

    public function testLogin() //távoli gépen is használható

    {
        $this->browse(function (Browser $browser) {

            $response = $this->call('POST', $this->baseurl . '/logout', ['_token' => csrf_token()]);
            $browser->visit($this->baseurl)
                ->assertVisible('@registration-link')
                ->assertVisible('@login-link')
                ->click('@login-link')
                ->type('email', 'menkuotto@gmail.com')
                ->press('button[type="submit"')
                ->screenshot('image_name')
                ->assertPresent('@timepage')
            ;
        });
    }
/*
    public function testLoginLocalhost() //artisan futtatási lehetőséggel
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/')
                ->logout()
                ->assertGuest()
                ->loginAs(User::find(1)) //vagy  ->loginAs( $this->user)
                ->visit('/home')
                ->assertSee('Dashboard')
                ->assertAuthenticated()
                ->assertAuthenticatedAs(User::find(1));
        });
    }*/
}
