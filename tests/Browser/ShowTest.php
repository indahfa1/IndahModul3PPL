<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowTest extends DuskTestCase
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
            ->assertPathIs(path: '/dashboard') //memastikan url setelah mengklik tautan sebelumnya
            ->clickLink(link: 'Notes')
            ->assertPathIs(path: '/notes')
            ->assertSee('Praktiku') 
            ->assertSee('Modul3') 
            ->clickLink('Praktiku')
            ->assertPathIs('/note/2')
            ->assertSee('Praktiku')
            ->assertSee('Modul3'); 
        });
    }
}


