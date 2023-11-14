<?php

namespace App\Http\Livewire\Carreras;

use Livewire\Component;
use App\Models\Carreras;

class CarreraComponent extends Component
{
    public $nombrecarrera;
    public $sede;
    public $carreras;

    public function render()
    {
        $this->carreras = Carreras::all();
        return view('livewire.carreras.carrera-component');
    }
}
