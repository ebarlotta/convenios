<?php

namespace App\Http\Livewire\Marcos;

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

    public $convenios;

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
        return view('livewire.marcos.marcos-component')->extends('layouts.admin');
    }

    public function showNew() {
        $this->reset('nroconvenio','anio','firmaconvenio','aprobadoporresolucion','polizanro','vigenciadesde','vigenciahasta');
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
    }

    public function showDelete($id) {
        $convenios = Marcos::find($id);
        $this->nroconvenio = $convenios->nroconvenio;
        $this->convenio_id = $id;
    }

    public function destroy($id) {
        Marcos::destroy($this->convenio_id);
        $this->reset('nroconvenio','anio','firmaconvenio','aprobadoporresolucion','polizanro','vigenciadesde','vigenciahasta');
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
        ]);
        Marcos::updateOrCreate(['id'=>$this->convenio_id],[
            'anio' => $this->anio,
            'firmaconvenio' => $this->firmaconvenio,
            'aprobadoporresolucion' => $this->aprobadoporresolucion,
            'polizanro' => $this->polizanro,
            'vigenciadesde' => $this->vigenciadesde,
            'vigenciahasta' => $this->vigenciahasta,
        ]);
        $this->convenio_id = null;
        session()->flash('mensaje', 'Se guardó el convenio.');
    }
}
