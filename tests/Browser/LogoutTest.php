<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(callback: function (Browser $browser): void {
            $browser->visit('/login')
            ->assertSee(text: 'Email') //melihat teks Started
            ->type(field: 'email', value: 'user@gmail.com')
            ->type(field: 'password', value: '123')
            ->press(button: 'LOG IN')
            ->assertPathIs(path: '/dashboard')
            ->assertSee('user') 
            ->press('user')
            ->clickLink('Log Out'); 
        });
    }
}
