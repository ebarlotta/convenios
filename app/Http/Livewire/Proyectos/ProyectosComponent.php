<?php

namespace App\Http\Livewire\Proyectos;

use Livewire\Component;
use App\Models\Proyectos;
use App\Models\Responsables;

class ProyectosComponent extends Component
{
    public $anio;
    public $descripciondelapropuesta;
    public $intencionalidadpedagógica;
    public $relacionconlaslineasdeacciondelpei;
    public $determinaciondeestudiantesdocentes;
    public $localizacionfisicaycobertura;
    public $tareasarealizar;
    public $cronogramaseactividades;
    public $detalledefondos;
    public $responsable_id;
    public $documentaciondetransporte;
    public $polizasegurodge;

    public $proyectos;
    public $responsables;

    public $buscar;

    public $proyecto_id;

    public function render()
    {
        $this->responsables = Responsables::all();
        if($this->buscar) { 
            $this->proyectos = Proyectos::where('anio', 'LIKE', "%".$this->buscar."%")
            ->get();
        }
        else { $this->proyectos = Proyectos::all(); }
        return view('livewire.proyectos.proyectos-component')->extends('layouts.admin');
    }
    public function showNew() {
        //$this->reset('anio', 'descripciondelapropuesta', 'intencionalidadpedagógica', 'relacionconlaslineasdeacciondelpei', 'determinaciondeestudiantesdocentes', 'localizacionfisicaycobertura', 'tareasarealizar', 'cronogramaseactividades', 'detalledefondos', 'responsable_id', 'documentaciondetransporte', 'polizasegurodge' );
    }

    public function showEdit($id) {
        $proyectos = Proyectos::find($id);
        $this->anio = $proyectos->anio;
        $this->descripciondelapropuesta = $proyectos->descripciondelapropuesta;
        $this->intencionalidadpedagógica = $proyectos->intencionalidadpedagógica;
        $this->relacionconlaslineasdeacciondelpei = $proyectos->relacionconlaslineasdeacciondelpei;
        $this->determinaciondeestudiantesdocentes = $proyectos->determinaciondeestudiantesdocentes;
        $this->localizacionfisicaycobertura = $proyectos->localizacionfisicaycobertura;
        $this->tareasarealizar = $proyectos->tareasarealizar;
        $this->cronogramaseactividades = $proyectos->cronogramaseactividades;
        $this->detalledefondos = $proyectos->detalledefondos;
        $this->responsable_id = $proyectos->responsable_id;
        $this->documentaciondetransporte = $proyectos->documentaciondetransporte ;
        $this->polizasegurodge = $proyectos->polizasegurodge;

        $this->proyecto_id = $id;
    }

    public function showDelete($id) {
        $proyectos = Proyectos::find($id);
        $this->descripciondelapropuesta = $proyectos->descripciondelapropuesta;
        $this->proyecto_id = $id;
    }

    public function destroy($id) {
        Proyectos::destroy($this->proyecto_id);
        $this->reset('anio', 'descripciondelapropuesta', 'intencionalidadpedagógica', 'relacionconlaslineasdeacciondelpei', 'determinaciondeestudiantesdocentes', 'localizacionfisicaycobertura', 'tareasarealizar', 'cronogramaseactividades', 'detalledefondos', 'responsable_id', 'documentaciondetransporte', 'polizasegurodge' );
        session()->flash('mensaje', 'Se eliminó el proyecto.');
    }

    public function store() {
        $this->validate([
            'anio' => 'required',
            'descripciondelapropuesta' => 'required',
            'intencionalidadpedagógica' => 'required',
            'relacionconlaslineasdeacciondelpei' => 'required',
            'determinaciondeestudiantesdocentes' => 'required',
            'localizacionfisicaycobertura' => 'required',
            'tareasarealizar' => 'required',
            'cronogramaseactividades' => 'required',
            'detalledefondos' => 'required',
            'responsable_id' => 'required',
            'documentaciondetransporte' => 'required',
            'polizasegurodge' => 'required',
        ]);
        Proyectos::updateOrCreate(['id'=>$this->proyecto_id],[

            'anio' => $this->anio,
            'descripciondelapropuesta' => $this->descripciondelapropuesta,
            'intencionalidadpedagógica' => $this->intencionalidadpedagógica,
            'relacionconlaslineasdeacciondelpei' => $this->relacionconlaslineasdeacciondelpei,
            'determinaciondeestudiantesdocentes' => $this->determinaciondeestudiantesdocentes,
            'localizacionfisicaycobertura' => $this->localizacionfisicaycobertura,
            'tareasarealizar' => $this->tareasarealizar,
            'cronogramaseactividades' => $this->cronogramaseactividades,
            'detalledefondos' => $this->detalledefondos,
            'responsable_id' => 1, //$this->responsable_id,
            'documentaciondetransporte' => 'dasdsa', //$this->documentaciondetransporte,
            'polizasegurodge' => $this->polizasegurodge
        ]);
        $this->proyecto_id = null;
        session()->flash('mensaje', 'Se guardó el proyecto.');
    }
}
