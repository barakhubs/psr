<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class CustomSms extends Component
{
    public $client;
    public $message;

    public bool $singleRecipient = true;
    public bool $groupRecipient = false;
    public bool $categoryRecipient = false;

    public function activateSingleForm() {
        $this->groupRecipient = false;
        $this->categoryRecipient = false;
        $this->singleRecipient = true;
    }

    public function activateGroupForm() {
        $this->groupRecipient = true;
        $this->categoryRecipient = false;
        $this->singleRecipient = false;
    }

    public function activateCategoryForm() {
        $this->groupRecipient = false;
        $this->categoryRecipient = true;
        $this->singleRecipient = false;
    }


    public function render()
    {
        $clients = Client::get();
        return view('livewire.custom-sms', compact('clients'));
    }
}
