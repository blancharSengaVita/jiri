<?php

namespace Tests\Browser;

use App\Models\Contact;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SearchInputTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $seletedContact = Contact::factory()->create([
                'name' => 'Blanchar Sen',
            ]);

            $notSelectContact = Contact::factory()->create([
                'name' => 'Renaud Van',
            ]);

            //test qu'il y a que l'élément check dans la des éléments selectionner
            $browser->visit('/searchInput')
                ->assertSeeIn('@notSelectedContact-' . $seletedContact->id, $seletedContact->name)
                ->check('input')
                ->assertMissing('@selectedContact-' . $notSelectContact->id);

            //DONE tester qu'il y'a pas de doublons lorsqu'on double click sur la checkbox (à refaire celui là)
//            $browser->visit('/searchInput')
//                ->assertSeeIn('@notSelectedContact-' . $seletedContact->id, $seletedContact->name)
//                ->check('input')
//                ->check('input')
//                ->assertNotPresent('@notSelectedContact-' . $seletedContact->id);

            //DONE faire en sorte que lorsqu'on rappuie sur le la checkbox l'item s'enleve (c'est le test d'en haut)
            $browser->visit('/searchInput')
                ->assertSeeIn('@notSelectedContact-' . $seletedContact->id, $seletedContact->name)
                ->check('input')
                ->uncheck('input')
                ->assertNotPresent('@selectedContact-' . $seletedContact->id);
        });
    }
}
