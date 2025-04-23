<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testNotes(): void
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
            ->assertPathIs(path: '/notes');
        });
    }
}
