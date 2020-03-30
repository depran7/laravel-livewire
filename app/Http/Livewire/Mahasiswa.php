<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Mahasiswa extends Component
{
    public $name;
    public $nrp;
    public $focus = true;
    public $readyToLoad = false;

    public function loadMahasiswa()
    {
        $this->readyToLoad = true;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'nrp' => 'required|min:9|max:9',
        ]);

        // Execution doesn't reach here if validation fails.

        \App\Mahasiswa::create([
            'name' => $this->name,
            'nrp' => $this->nrp,
        ]);
        $this->name = '';
        $this->nrp = '';
        $this->focus= true;

    }

    public function onChange(){
        $this->focus= false;
    }
    public function delete($id){
        \App\Mahasiswa::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.mahasiswa', [
            'mahasiswa' => $this->readyToLoad
                ? \App\Mahasiswa::all()
                : [],
        ]);
    }
}
