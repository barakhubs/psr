<?php

namespace App\Http\Livewire;

use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $old_password;
    public $password;
    public $password_confirmation;
    public $name;

    public function changePassword (FlasherInterface $flasherInterface){
        $this->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::find(Auth::user()->id);
        if(Hash::check($this->old_password, $user->password)) {
            $this->clearForm();

            $user->fill([
                'password' => Hash::make($this->password)
            ])->save();

            $flasherInterface->addSuccess('Password changed successfully');
        } else {
            $this->clearForm();
            $flasherInterface->addError('Passwords do not match');
        }

    }

    public function clearForm()
    {
        // clear fields
        $this->old_password = "";
        $this->password = "";
        $this->password_confirmation = "";
    }

    public function render()
    {
        $profile = User::find(Auth::user()->id);
        return view('livewire.profile', compact('profile'));
    }
}
