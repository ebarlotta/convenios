<?php

namespace App\Http\Livewire\Carreras;

use Livewire\Component;
use App\Models\Carreras;

class CarreraComponent extends Component
{
    public $nombrecarrera;
    public $sede;
    public $carreras;

    public $carrera_id;

    public function render()
    {
        $this->carreras = Carreras::all();
        return view('livewire.carreras.carrera-component')->extends('layouts.admin');
    }

    public function Llamar() {
        dd('llego');
    }

    public function showEdit($id) {
        $carreras = Carreras::find($id);
        $this->nombrecarrera = $carreras->nombrecarrera;
        $this->sede = $carreras->sede;
        $this->carrera_id = $id;
    }

    public function showDelete($id) {
        $carreras = Carreras::find($id);
        $this->nombrecarrera = $carreras->nombrecarrera;
        $this->carrera_id = $id;
    }

    public function showNew() {
        $this->reset();
    }

    public function destroy($id) {
        Carreras::destroy($this->carrera_id);
        $this->reset();
        session()->flash('mensaje', 'Se eliminó la carrera.');
    }

    public function store() {
        $this->validate([
            'nombrecarrera' => 'required|unique:carreras|max:255',
            'sede' => 'required',
        ]);
        Carreras::updateOrCreate(['id'=>$this->carrera_id],[
            'nombrecarrera' => $this->nombrecarrera,
            'sede' => $this->sede,
        ]);
        $this->carrera_id = null;
        session()->flash('mensaje', 'Se guardó la carrera.');
    }
}
