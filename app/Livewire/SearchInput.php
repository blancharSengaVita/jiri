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

//        $this->contactsToAddToJiri->push($contact);
//
//        info($this->contactsToAddToJiri->count());

        if (!$this->contactsToAddToJiri->contains($contact)){
            $this->contactsToAddToJiri->put($contact->id,$contact);
        } else {
            $reducedContacts = $this->contactsToAddToJiri->filter(fn($c) => $contact->isNot($c));
            $this->contactsToAddToJiri = $reducedContacts;
        }
    }


    public function render()
    {
        //wiremodel
        return view('livewire.search-input');
    }
}
