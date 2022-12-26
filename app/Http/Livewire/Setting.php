<?php

namespace App\Http\Livewire;

use App\Models\Setting as ModelsSetting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Setting extends Component
{
    use WithFileUploads;

    public $activateForm = false;
    public $name = "";
    public $slogan = "";
    public $description = "";
    public $logo;
    public $email = "";
    public $phone = "";
    public $domain = "";

    public $message = "";

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'logo' => 'required|image|max:2048',
        'phone' => 'required',
    ];

    public function editSetting(){

        $settings = ModelsSetting::first();

        if ($settings !== null) {
            //activate form
            $this->activateForm = true;

            //populate results
            $this->name = $settings->company_name;
            $this->slogan = $settings->slogan;
            $this->description = $settings->description;
            $this->logo = $settings->logo;
            $this->email = $settings->email;
            $this->phone = $settings->phone_number;
            $this->domain = $settings->domain;
        } else {
            // // display message
            // $this->dispatchBrowserEvent('alert',
            //     ['type' => 'info',  'message' => 'No settings record found!']);
            $this->message = "No settings records found!";
            //activate form
            $this->activateForm = true;
        }

    }


    public function updateSetting(){

        $this->validate();
        // we only need one record in the table
        $check_if_setting_exists = ModelsSetting::first();

        $logo_name = $this->name .'.'. $this->logo->extension(); //file name

        if($check_if_setting_exists) {
            $update = ModelsSetting::find($check_if_setting_exists->id)->update([
                'company_name' => $this->name,
                'slogan' => $this->slogan,
                'logo' => $logo_name,
                'description' => $this->description,
                'email' => $this->email,
                'phone_number' => $this->phone,
                'domain' => $this->domain
            ]);

            if($update) {
                $this->logo->storeAs('public/logos', $logo_name); // store logo file
                $this->message = "Settings updated successfully!";
                //activate form
                $this->activateForm = true;
            }
        } else {
            $create = ModelsSetting::create([
                'company_name' => $this->name,
                'slogan' => $this->slogan,
                'logo' => $logo_name,
                'description' => $this->description,
                'email' => $this->email,
                'phone_number' => $this->phone,
                'domain' => $this->domain
            ]);

            if($create) {
                $this->logo->storeAs('public/logos', $logo_name); // store logo file
                $this->message = "Settings added successfully!";
                //activate form
                $this->activateForm = true;
            }
        }
    }

    public function render()
    {
        $setting = ModelsSetting::first();
        return view('livewire.setting', compact('setting'));
    }
}
