<?php

namespace App\Http\Livewire\Receptoras;

use App\Models\Receptoras;
use App\Models\Responsables;
use Livewire\Component;

class ReceptorasComponent extends Component
{
    public $institucionreceptora;
    public $dependientereceptora;
    public $representadareceptora;
    public $dnirepresentante;
    public $telefonorepresentante;
    public $caracterrepresentante;
    public $acreditadopor;
    public $domicilioreceptora;
    public $ciudadreceptora;
    public $correoreceptora;
    public $enadelantereceptora;
    public $receptora;

    public $receptoras;
    public $responsables;
    public $receptora_id;

    public $buscar;

    public function render()
    {
        $this->responsables = Responsables::all();
        if ($this->buscar) {
            $this->receptoras = Receptoras::where('nombrereceptora', 'LIKE', "%" . $this->buscar . "%")
            ->orWhere('dnireceptora', 'LIKE', "%".$this->buscar."%")
            ->get();
        } else {
            $this->receptoras = Receptoras::all();
        }
        return view('livewire.receptoras.receptoras-component')->extends('layouts.admin');
    }
    public function showNew()
    {
        $this->reset('institucionreceptora', 'dependientereceptora', 'representadareceptora', 'dnirepresentante', 'telefonorepresentante', 'caracterrepresentante', 'acreditadopor', 'domicilioreceptora', 'ciudadreceptora', 'correoreceptora', 'enadelantereceptora', 'receptora');
    }

    public function showEdit($id)
    {
        $receptora = Receptoras::find($id);
        $this->institucionreceptora = $receptora->institucionreceptora;;
        $this->dependientereceptora = $receptora->dependientereceptora;;
        $this->representadareceptora = $receptora->representadareceptora;;
        $this->dnirepresentante = $receptora->dnirepresentante;;
        $this->telefonorepresentante = $receptora->telefonorepresentante;;
        $this->caracterrepresentante = $receptora->caracterrepresentante;;
        $this->acreditadopor = $receptora->acreditadopor;;
        $this->domicilioreceptora = $receptora->domicilioreceptora;;
        $this->ciudadreceptora = $receptora->ciudadreceptora;;
        $this->correoreceptora = $receptora->correoreceptora;;
        $this->enadelantereceptora = $receptora->enadelantereceptora;;
        $this->receptora = $receptora->receptora;;     

        $this->receptora_id = $id;
    }

    public function showDelete($id)
    {
        $receptora = Receptoras::find($id);
        $this->institucionreceptora = $receptora->nombrereceptora;
        $this->receptora_id = $id;
    }
    
    public function destroy($id)
    {
        Receptoras::destroy($this->receptora_id);
        $this->reset('institucionreceptora', 'dependientereceptora', 'representadareceptora', 'dnirepresentante', 'telefonorepresentante', 'caracterrepresentante', 'acreditadopor', 'domicilioreceptora', 'ciudadreceptora', 'correoreceptora', 'enadelantereceptora', 'receptora');        $this->receptora_id = null;
        session()->flash('mensaje', 'Se eliminó la institución receptora.');
    }

    public function store()
    {
        $this->validate([
            'institucionreceptora' => 'required',
            'dependientereceptora' => 'required',
            'representadareceptora' => 'required',
            'dnirepresentante' => 'required',
            'telefonorepresentante' => 'required',
            'caracterrepresentante' => 'required',
            'acreditadopor' => 'required',
            'domicilioreceptora' => 'required',
            'ciudadreceptora' => 'required',
            'correoreceptora' => 'required|email',
            'enadelantereceptora' => 'required',
            'receptora' => 'required',
        ]);
        Receptoras::updateOrCreate(['id' => $this->receptora_id], [
            'institucionreceptora' => $this->institucionreceptora,
            'dependientereceptora' => $this->dependientereceptora,
            'representadareceptora' => $this->representadareceptora,
            'dnirepresentante' => $this->dnirepresentante,
            'telefonorepresentante' => $this->telefonorepresentante,
            'caracterrepresentante' => $this->caracterrepresentante,
            'acreditadopor' => $this->acreditadopor,
            'domicilioreceptora' => $this->domicilioreceptora,
            'ciudadreceptora' => $this->ciudadreceptora,
            'correoreceptora' => $this->correoreceptora,
            'enadelantereceptora' => $this->enadelantereceptora,
            'receptora' => $this->receptora,
        ]);
        $this->receptora_id = null;
        session()->flash('mensaje', 'Se guardó la institución receptora.');
    }

    public function DevolverDNI() {
        $representadareceptora = Responsables::find($this->representadareceptora);
        $this->dnirepresentante = $representadareceptora->dniresponsable;
    }
}
