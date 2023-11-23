<?php

namespace App\Http\Livewire\Responsables;

use Livewire\Component;
use App\Models\Responsable;
use App\Models\Roles;

class ResponsablesComponent extends Component
{
    public $nombreresponsable;
    public $dniresponsable, $telefonoresponsable, $emailresponsable;
    
    public $responsables;
    public $roles;

    public $buscar;

    public $responsable_id;
    public $rol_id;

    public function render()
    {
        $this->roles=Roles::all();
        if ($this->buscar) {
            $this->responsables = Responsable::where('nombreresponsable', 'LIKE', "%" . $this->buscar . "%")
                ->get();
        } else {
            $this->responsables = Responsable::all();
        }
        return view('livewire.responsables.responsables-component')->extends('layouts.admin');
    }

    public function showNew()
    {
        $this->reset('nombreresponsable','dniresponsable','telefonoresponsable','emailresponsable','rol_id');
    }

    public function showEdit($id)
    {
        $responsables = Responsable::find($id);
        $this->nombreresponsable = $responsables->nombreresponsable;
        $this->dniresponsable = $responsables->dniresponsable;
        $this->telefonoresponsable = $responsables->telefonoresponsable;
        $this->emailresponsable = $responsables->emailresponsable;
        $this->rol_id = $responsables->rol_id;
        $this->responsable_id = $id;
    }

    public function showDelete($id)
    {
        $responsables = Responsable::find($id);
        $this->nombreresponsable = $responsables->nombreresponsable;
        $this->responsable_id = $id;
    }

    public function destroy($id)
    {
        Responsable::destroy($this->responsable_id);
        $this->reset('nombreresponsable','dniresponsable','telefonoresponsable','emailresponsable','rol_id');
        session()->flash('mensaje', 'Se eliminó el Responsable.');
    }

    public function store()
    {
        $this->validate([
            'nombreresponsable' => 'required|max:255',
            'dniresponsable' => 'required',
            'telefonoresponsable' => 'required',
            'emailresponsable' => 'required',
            'rol_id' => 'required',
        ]);
        Responsable::updateOrCreate(['id' => $this->responsable_id], [
            'nombreresponsable' => $this->nombreresponsable,
            'dniresponsable' => $this->dniresponsable,
            'telefonoresponsable' => $this->telefonoresponsable,
            'emailresponsable' => $this->emailresponsable,
            'rol_id' => $this->rol_id,
        ]);
        $this->responsable_id = null;
        session()->flash('mensaje', 'Se guardó el Responsable.');
    }
}
