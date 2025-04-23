<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLogin(): void
    {
        $this->browse(callback: function (Browser $browser): void {
            $browser->visit(url: '/') //mengunjungi halama url
            ->assertSee(text: 'Modul 3') //melihat teks Started
            ->clickLink(link: 'Log in') //mengklik tautan register
            ->assertPathIs(path: '/login') //memastikan url setelah mengklik tautan sebelumnya
            ->type(field: 'email', value: 'user@gmail.com')
            ->type(field: 'password', value: '123')
            ->press(button: 'LOG IN')
            ->pause(1000)
            ->assertPathIs(path: '/dashboard');
        });
    }
}
