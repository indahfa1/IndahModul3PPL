<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrasiLogin extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group regis
     */
    public function testRegister(): void
    {
        $this->browse(callback: function (Browser $browser): void {

            $browser->visit(url: '/') //mengunjungi halama url
                    ->assertSee(text: 'Modul 3') //melihat teks Started
                    ->clickLink(link: 'Register') //mengklik tautan register
                    ->assertPathIs(path: '/register') //memastikan url setelah mengklik tautan sebelumnya
                    ->type(field: 'name', value: 'user')
                    ->type(field: 'email', value: 'user@gmail.com')
                    ->type(field: 'password', value: '123')
                    ->type(field: 'password_confirmation', value: '123')
                    ->press(button: 'REGISTER')
                    ->pause(1000)
                    ->assertPathIs(path: '/dashboard');
        });
    }
}
