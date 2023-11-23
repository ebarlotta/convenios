<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use App\Models\Roles;

class RolesComponent extends Component
{
    public $descripcionrol;
    public $roles;

    public $buscar;

    public $rol_id;

    public function render()
    {
        if ($this->buscar) {
            $this->roles = Roles::where('descripcionrol', 'LIKE', "%" . $this->buscar . "%")
                ->get();
        } else {
            $this->roles = Roles::all();
        }
        return view('livewire.roles.roles-component')->extends('layouts.admin');
    }

    public function showNew()
    {
        $this->reset('descripcionrol');
    }

    public function showEdit($id)
    {
        $roles = Roles::find($id);
        $this->descripcionrol = $roles->descripcionrol;
        $this->rol_id = $id;
    }

    public function showDelete($id)
    {
        $roles = Roles::find($id);
        $this->descripcionrol = $roles->descripcionrol;
        $this->rol_id = $id;
    }

    public function destroy($id)
    {
        Roles::destroy($this->rol_id);
        $this->reset('descripcionrol');
        session()->flash('mensaje', 'Se eliminó el rol.');
    }

    public function store()
    {
        $this->validate([
            'descripcionrol' => 'required|unique:roles|max:255',
        ]);
        Roles::updateOrCreate(['id' => $this->rol_id], [
            'descripcionrol' => $this->descripcionrol,
        ]);
        $this->rol_id = null;
        session()->flash('mensaje', 'Se guardó el rol.');
    }
}
