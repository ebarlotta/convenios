<?php

namespace App\Http\Livewire\Marcos;

use App\Models\Carreras;
use Livewire\Component;
use App\Models\Marcos;


class MarcosComponent extends Component
{
    public $nroconvenio;
    public $anio;
    public $firmaconvenio;
    public $aprobadoporresolucion;
    public $polizanro;
    public $vigenciadesde;
    public $vigenciahasta;
    public $carrera_id;

    public $convenios;
    public $carreras;

    public $buscar;

    public $convenio_id;

    public function render()
    {
        if($this->buscar) { 
            $this->convenios = Marcos::where('anio', 'LIKE', "%".$this->buscar."%")
            ->orWhere('polizanro', 'LIKE', "%".$this->buscar."%")
            ->orWhere('nroconvenio', 'LIKE', "%".$this->buscar."%")
            ->get();
        }
        else { $this->convenios = Marcos::all(); }
        $this->carreras = Carreras::orderby('nombrecarrera')->get();
        return view('livewire.marcos.marcos-component')->extends('layouts.admin');
    }

    public function showNew() {
        $this->reset('nroconvenio','anio','firmaconvenio','aprobadoporresolucion','polizanro','vigenciadesde','vigenciahasta','carrera_id');
    }

    public function showEdit($id) {
        $convenios = Marcos::find($id);
        $this->nroconvenio = $convenios->nroconvenio;
        $this->anio = $convenios->anio;
        $this->firmaconvenio = $convenios->firmaconvenio;
        $this->aprobadoporresolucion = $convenios->aprobadoporresolucion;
        $this->polizanro = $convenios->polizanro;
        $this->vigenciadesde = $convenios->vigenciadesde;
        $this->vigenciahasta = $convenios->vigenciahasta;
        $this->convenio_id = $id;
        $this->carrera_id = $convenios->carrera_id;
    }

    public function showDelete($id) {
        $convenios = Marcos::find($id);
        $this->nroconvenio = $convenios->nroconvenio;
        $this->convenio_id = $id;
    }

    public function destroy($id) {
        Marcos::destroy($this->convenio_id);
        $this->reset('nroconvenio','anio','firmaconvenio','aprobadoporresolucion','polizanro','vigenciadesde','vigenciahasta','carrera_id');
        session()->flash('mensaje', 'Se eliminó el convenio.');
    }

    public function store() {
        $this->validate([
            'anio' => 'required|integer',
            'firmaconvenio' => 'required|date',
            'aprobadoporresolucion' => 'required',
            'polizanro' => 'required',
            'vigenciadesde' => 'required|date',
            'vigenciahasta' => 'required|date',
            'carrera_id' => 'required',
        ]);

        if(is_null($this->nroconvenio)) {
            $NroConvenio = $this->BuscarSiguienteNroConvenio();
        } else {
            $NroConvenio = $this->nroconvenio;
        }

        Marcos::updateOrCreate(['id'=>$this->convenio_id],[
            'nroconvenio' => $NroConvenio,
            'anio' => $this->anio,
            'firmaconvenio' => $this->firmaconvenio,
            'aprobadoporresolucion' => $this->aprobadoporresolucion,
            'polizanro' => $this->polizanro,
            'vigenciadesde' => $this->vigenciadesde,
            'vigenciahasta' => $this->vigenciahasta,
            'carrera_id' => $this->carrera_id,
        ]);
        $this->convenio_id = null;
        session()->flash('mensaje', 'Se guardó el convenio.');
    }

    public function BuscarSiguienteNroConvenio() {
        $totalconvenios=Marcos::where('carrera_id','=',$this->carrera_id)->count();
        $totalconvenios++;

        //Extrae la primera letra de una frase
        $carrera = Carreras::find($this->carrera_id);
        $frase = $carrera->nombrecarrera;  //$str = 'CORPORACIÓN GR AN FORMATO SAC';

        // Dividir la frase en palabras
        $palabras = explode(" ", $frase);

        // Iterar sobre las palabras y obtener la primera letra de cada una
        $primerasLetras = "";
        foreach ($palabras as $palabra) {
            $primerasLetras .= substr($palabra, 0, 1);
        }
        
        $siguienteNroConvenio = str_pad($totalconvenios,3,"0", STR_PAD_LEFT);
        return strtoupper($primerasLetras.'-'.$siguienteNroConvenio.'-'.$this->anio);
    }
}
