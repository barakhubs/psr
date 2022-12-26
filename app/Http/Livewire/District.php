<?php

namespace App\Http\Livewire;

use App\Models\District as ModelsDistrict;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class District extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $language;
    public $initials;

    public bool $editStatus = false;
    public $formTitle = "Add new District";
    public $submitFunction = "storeDistrict";

    protected $rules = [
        'name' => 'required',
        'language' => 'required',
        'initials' => 'required',
    ];

    public function storeDistrict (FlasherInterface $flasherInterface){
        
        $create = ModelsDistrict::create([
                    'name'      =>  $this->name,
                    'language'  =>  $this->language,
                    'initials'  =>  strtoupper($this->initials),
                ]);

        if($create) {
            $this->clearForm();

            $flasherInterface->addSuccess('District saved successfully');
        } else {
            $flasherInterface->addError('An error occured. Please try again!');
        }
    }

    public function initiateUpdate($id, FlasherInterface $flasherInterface) {
        $this->editStatus = true;

        // check the row
        $district = ModelsDistrict::find($id);

        if($district !== null) {
            $this->name = $district->name;
            $this->language = $district->language;
            $this->initials = strtoupper($district->initials);

            $this->formTitle = "Editing " . $district->name . " District";
            $this->submitFunction = "updateDistrict(".$id.")";

        } else {
            $flasherInterface->addError('An error occured. Please try again');
        }
    }

    public function updateDistrict($id, FlasherInterface $flasherInterface){

        $update =  ModelsDistrict::find($id)->update([
                    'name'      =>  $this->name,
                    'language'  =>  $this->language,
                    'initials'  =>  strtoupper($this->initials),
                ]);

        if($update) {
            $this->clearForm();

            $flasherInterface->addSuccess('District update saved successfully');

        } else {
            $flasherInterface->addError('An error occured. Please try again!');
        }
    }

    public function deleteDistrict($id, FlasherInterface $flasherInterface) {

        $delete = ModelsDistrict::find($id)->delete();

        if($delete) {
            $flasherInterface->addSuccess('District saved successfully');
        } else {
            $flasherInterface->addError('An error occured. Please try again');
        }
    }


    public function clearForm(){
        $this->name = "";
        $this->language = "";
        $this->initials = "";
    }
    public function render()
    {
        $districts = ModelsDistrict::paginate(5);
        return view('livewire.district', compact('districts'));
    }
}
