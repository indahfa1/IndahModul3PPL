<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testEdit(): void
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
            ->clickLink(link: 'Create Note')
            ->assertPathIs(path: '/create-note')
            ->type(field: 'title', value: 'Belajar')
            ->type(field: 'description', value: 'PPL')
            ->press(button: 'CREATE' )
            ->assertPathIs(path: '/notes')
            ->click('@edit-2')
            ->assertPathIs(path: '/edit-note-page/2')
            ->type(field: 'title', value: 'Praktiku')
            ->type(field: 'description', value: 'Modul3')
            ->press(button: 'UPDATE' )
            ->assertPathIs(path: '/notes');
        });
    }
}
