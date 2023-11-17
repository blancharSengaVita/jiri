<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Boolean;

class SearchInput extends Component
{
    #[Url]
    public string $search;
    public Collection $contactsToAddToJiri;
    public string $id;
    public Boolean $isChecked;

    public function mount()
    {
        $this->search = '';
        $this->contactsToAddToJiri = new Collection();
        $this->id = 1;
    }

    #[Computed]
    public function filteredContacts(): Collection
    {
        $contacts = Contact::where('name', 'like', '%' . $this->search . '%')
            ->get();

        return $contacts;
    }


    //faire en sorte que j'ai un variable isChecked qui vaut false de base
    //en fonction de cette valeur mon test va soit ajouter ou retire un contact de la liste des contacts à ajoutér
    //si isChecked est faux et qu'on clique dessus, elle devient vrai et ajouter l'item à

    public function addContactToContactsToAddToJiri(Contact $contact)
    {
        // Je veux verifier que chaque élément de la liste sois unique
        // On ne peut pas ajouter 2 fois un contact avec le même id.
        //Je sens que le problème est plus deep que ça mais, c'est un bandage que je mets là.
        //Il faudrait utiliser un debugger

//        if (!$this->contactsToAddToJiri->contains($contact)) {
//            $this->contactsToAddToJiri->add($contact);
//        }
//
//        if ($this->contactsToAddToJiri->contains($contact)) {
//
//        }

        $this->contactsToAddToJiri->add($contact);
    }


    public function render()
    {
        //wiremodel
        return view('livewire.search-input');
    }
}
