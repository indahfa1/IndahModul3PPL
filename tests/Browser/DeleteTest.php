<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteTest extends DuskTestCase
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
            ->press(button: 'Delete')
            ->assertPathIs('/notes');
        });
    }
}
