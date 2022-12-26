<?php

namespace App\Http\Livewire;

use App\Models\Facility;
use App\SMS\ExcelModel;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Client extends Component
{
    use WithFileUploads;

    public $upload_file;

    public bool $button = false;

    public $iteration;

    protected $rules = [
        'upload_file' => 'required|mimes:xlsx,cvs,txt',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->button = true;
    }

    public function uploadFile (FlasherInterface $flasherInterface) {
        $validatedData = $this->validate();

        $update =  Excel::import(new ExcelModel, $this->upload_file);

        if($update) {
            $flasherInterface->addSuccess('Database updated successfully!');
            $this->upload_file = null;
            $this->iteration ++;
            $this->button = false;
        } else {
            $flasherInterface->addSuccess('An error occured. Please try again!');
            $this->upload_file = "";
            $this->button = false;
        }
    }

    public function render()
    {
        return view('livewire.client');
    }
}
