<?php

namespace App\Http\Livewire;

use App\Models\Facility as ModelsFacility;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Facility extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name;

    public function submitFacility(FlasherInterface $flasherInterface){
        $this->validate([
            'name' => 'required|unique:facilities,name'
        ]);

        ModelsFacility::create([
            'name' => $this->name,
            'district' => Auth::user()->district
        ]);

        $this->name = "";
        $flasherInterface->addSuccess('Facility saved successfully!');
    }

    public function deleteFacility($id, FlasherInterface $flasherInterface) {
        ModelsFacility::find($id)->delete();
        $flasherInterface->addSuccess('Deleted facility successfully!');
    }

    public function render()
    {
        $facilities = ModelsFacility::where('district', Auth::user()->district)->paginate(5);
        return view('livewire.facility', compact('facilities'));
    }
}
