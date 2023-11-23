<?php

namespace App\Http\Livewire\Individuales;

use App\Models\Estudiantes;
use Livewire\Component;
use App\Models\Individual;
use App\Models\Marcos;
use App\Models\Responsables;

class IndividualesComponent extends Component
{

    public $marco_id;
    public $estudiante_id;
    public $periododesde;
    public $periodohasta;
    public $diasdelasemana;
    public $horariosdesdehasta;
    public $responsable_id;
    public $firmaconvenio;
    public $nombreestudiante;

    public $individuales;
    public $marcos;
    public $estudiantes;
    public $responsables;

    public $buscar;

    public $individual_id;

    public function render()
    {
        $this->marcos = Marcos::all();
        $this->estudiantes = Estudiantes::all();
        $this->responsables = Responsables::all();

        if ($this->buscar) {
            $this->individuales = Individual::where('descripcionrol', 'LIKE', "%" . $this->buscar . "%")
                ->get();
        } else {
            $this->individuales = Individual::all();
        }
        return view('livewire.individuales.individuales-component')->extends('layouts.admin');
    }
    public function showNew()
    {
        $this->individual_id = null;
        $this->reset('marco_id','estudiante_id','periododesde','periodohasta','diasdelasemana','horariosdesdehasta','responsable_id','firmaconvenio');
    }

    public function showEdit($id)
    {
        $individuales = Individual::find($id);
        $this->marco_id = $individuales->marco_id;
        $this->estudiante_id = $individuales->estudiante_id;
        $this->periododesde = $individuales->periododesde;
        $this->periodohasta = $individuales->periodohasta;
        $this->diasdelasemana = $individuales->diasdelasemana;
        $this->horariosdesdehasta = $individuales->horariosdesdehasta;
        $this->responsable_id = $individuales->responsable_id;
        $this->firmaconvenio = $individuales->firmaconvenio;
        $this->individual_id = $id;
    }

    public function showDelete($id)
    {
        $individuales = Individual::find($id);
        $estudiante = Estudiantes::find($this->estudiante_id);
        $this->nombreestudiante = $estudiante->nombreestudiante;
        $this->individual_id = $id;
    }

    public function destroy($id)
    {
        Individual::destroy($this->individual_id);
        $this->reset('marco_id','estudiante_id','periododesde','periodohasta','diasdelasemana','horariosdesdehasta','responsable_id','firmaconvenio');
        $this->individual_id = null;
        session()->flash('mensaje', 'Se eliminó el Convenio.');
    }

    public function store()
    {
        $this->validate([
            'marco_id' => 'required',
            'estudiante_id' => 'required',
            'periododesde' => 'required',
            'periodohasta' => 'required',
            'diasdelasemana' => 'required',
            'horariosdesdehasta' => 'required',
            'responsable_id' => 'required',
        ]);
        Individual::updateOrCreate(['id' => $this->individual_id], [
            'marco_id' => $this->marco_id,
            'estudiante_id' => $this->estudiante_id,
            'periododesde' => $this->periododesde,
            'periodohasta' => $this->periodohasta,
            'diasdelasemana' => $this->diasdelasemana,
            'horariosdesdehasta' => $this->horariosdesdehasta,
            'responsable_id' => $this->responsable_id,
            'firmaconvenio' => $this->firmaconvenio,
        ]);
        $this->individual_id = null;
        session()->flash('mensaje', 'Se guardó el Convenio.');
    }
}
