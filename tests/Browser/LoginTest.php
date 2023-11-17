<?php

namespace Tests\Browser;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    use DatabaseTruncation;

    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Laravel');
        });

    }


}


