<?php

namespace App\Http\Livewire\Estudiantes;

use App\Models\Carreras;
use Livewire\Component;
use App\Models\Estudiantes;
use App\Models\Provincias;

class EstudianesComponent extends Component
{
        public $nombreestudiante;
        public $dniestudiante;
        public $domicilioestudiante;
        public $provincia_id;
        public $emailestudiante;
        public $telefonoestudiante;
        public $carrera_id;
        public $tareasasignadas;
        public $cuil;
        public $fechanacimiento;
        public $legajo;
        public $polizanro;
        public $vigenciadesde;
        public $vigenciahasta;

        public $estudiantes;
        public $provincias;
        public $carreras;
        public $estudiante_id;

        public $buscar;

    public function render()
    {       
        $this->provincias = Provincias::all();
        $this->carreras = Carreras::all();
    if ($this->buscar) {
        $this->estudiantes = Estudiantes::where('nombreestudiante', 'LIKE', "%" . $this->buscar . "%")
        ->orWhere('dniestudiante', 'LIKE', "%".$this->buscar."%")
        ->get();
    } else {
        $this->estudiantes = Estudiantes::all();
    }
        return view('livewire.estudiantes.estudianes-component')->extends('layouts.admin');
    }

    public function showNew()
    {
        $this->reset('nombreestudiante', 'dniestudiante', 'domicilioestudiante', 'provincia_id', 'emailestudiante', 'telefonoestudiante', 'carrera_id', 'tareasasignadas', 'cuil', 'fechanacimiento', 'legajo', 'polizanro', 'vigenciadesde', 'vigenciahasta');
    }

    public function showEdit($id)
    {
        $estudiante = Estudiantes::find($id);
        $this->nombreestudiante = $estudiante->nombreestudiante;
        $this->dniestudiante = $estudiante->dniestudiante;
        $this->domicilioestudiante = $estudiante->domicilioestudiante;
        $this->provincia_id = $estudiante->provincia_id;
        $this->emailestudiante = $estudiante->emailestudiante;
        $this->telefonoestudiante = $estudiante->telefonoestudiante;
        $this->carrera_id = $estudiante->carrera_id;
        $this->tareasasignadas = $estudiante->tareasasignadas;
        $this->cuil = $estudiante->cuil;
        $this->fechanacimiento = $estudiante->fechanacimiento;
        $this->legajo = $estudiante->legajo;
        $this->polizanro = $estudiante->polizanro;
        $this->vigenciadesde = $estudiante->vigenciadesde;
        $this->vigenciahasta = $estudiante->vigenciahasta;

        $this->estudiante_id = $id;
    }

    public function showDelete($id)
    {
        $estudiante = Estudiantes::find($id);
        $this->nombreestudiante = $estudiante->nombreestudiante;
        $this->estudiante_id = $id;
    }

    public function destroy($id)
    {
        Estudiantes::destroy($this->estudiante_id);
        $this->reset('nombreestudiante', 'dniestudiante', 'domicilioestudiante', 'provincia_id', 'emailestudiante', 'telefonoestudiante', 'carrera_id', 'tareasasignadas', 'cuil', 'fechanacimiento', 'legajo', 'polizanro', 'vigenciadesde', 'vigenciahasta');
        $this->estudiante_id = null;
        session()->flash('mensaje', 'Se eliminó el estudiante.');
    }

    public function store()
    {
        $this->validate([
            'nombreestudiante' => 'required|max:255',
            'dniestudiante' => 'required',
            'domicilioestudiante' => 'required',
            'provincia_id' => 'required',
            'emailestudiante' => 'required',
            'telefonoestudiante' => 'required',
            'carrera_id' => 'required',
            'tareasasignadas' => 'required',
            'cuil' => 'required',
            'fechanacimiento' => 'required',
            'legajo' => 'required',
            'polizanro' => 'required',
            'vigenciadesde' => 'required',
            'vigenciahasta' => 'required',
        ]);
        Estudiantes::updateOrCreate(['id' => $this->estudiante_id], [
            'nombreestudiante' => $this->nombreestudiante,
            'dniestudiante' => $this->dniestudiante,
            'domicilioestudiante' => $this->domicilioestudiante,
            'provincia_id' => $this->provincia_id,
            'emailestudiante' => $this->emailestudiante,
            'telefonoestudiante' => $this->telefonoestudiante,
            'carrera_id' => $this->carrera_id,
            'tareasasignadas' => $this->tareasasignadas,
            'cuil' => $this->cuil,
            'fechanacimiento' => $this->fechanacimiento,
            'legajo' => $this->legajo,
            'polizanro' => $this->polizanro,
            'vigenciadesde' => $this->vigenciadesde,
            'vigenciahasta' => $this->vigenciahasta,
        ]);
        $this->estudiante_id = null;
        session()->flash('mensaje', 'Se guardó el estudiante.');
    }
}
