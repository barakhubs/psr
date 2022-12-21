<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $old_password;
    public $new_password;
    public $password_confirmation;

    protected $rules = [
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
    ];

    public function changePassword (){
        $this->validate();
    }
    public function render()
    {
        $profile = User::find(Auth::user()->id);
        return view('livewire.profile', compact('profile'));
    }
}
