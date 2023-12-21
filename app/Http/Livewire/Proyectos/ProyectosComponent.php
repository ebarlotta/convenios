<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Carreras;
use App\Models\Docentenomina;
use App\Models\Estudiantenomina;
use App\Models\Estudiantes;
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
    public $carreras;
    public $docentes;
    public $estudiantes;
    public $estudiantesnominas;
    public $docentesnomina;

    public $buscar;

    public $proyecto_id;
    public $carrera_id;
    public $carreraactual;
    public $docente_id;
    public $estudiante_id;
    public $estudiantenomina_id;
    public $docentenomina_id;

    public function render()
    {
        $this->responsables = Responsables::all();
        $this->carreras = Carreras::all();
        $this->docentes = Responsables::all();
        if(!$this->carrera_id) { $this->estudiantes = Estudiantes::all(); }
        if($this->buscar) { 
            $this->proyectos = Proyectos::where('anio', 'LIKE', "%".$this->buscar."%")
            ->get();
        }
        else { $this->proyectos = Proyectos::all(); }
        return view('livewire.proyectos.proyectos-component')->extends('layouts.admin');
    }

    public function renderedicion($numero)
    {
        // dd($numero);
        $this->responsables = Responsables::all();
        $this->carreras = Carreras::all();
        $this->docentes = Responsables::all();
        $this->estudiantes = Estudiantes::where('carrera_id','=',$this->carrera_id)->get();

        $this->showEdit($numero);
        
        return view('livewire.proyectos.proyectoseditar-component')->extends('layouts.admin')
            ->with(['responsables'=>$this->responsables])
            ->with(['docentes'=>$this->docentes])
            ->with(['carreras'=>$this->carreras])
            ->with(['estudiantes'=>$this->estudiantes]);
        // return redirect('proyectos-edicion');
    }

    public function showNew() {
        $this->renderedicion(1);
        //$this->reset('anio', 'descripciondelapropuesta', 'intencionalidadpedagógica', 'relacionconlaslineasdeacciondelpei', 'determinaciondeestudiantesdocentes', 'localizacionfisicaycobertura', 'tareasarealizar', 'cronogramaseactividades', 'detalledefondos', 'responsable_id', 'documentaciondetransporte', 'polizasegurodge' );
    }

    public function showEdit($id) {
        if(is_null($this->proyecto_id)) {
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
            $this->carrera_id = $proyectos->carrera_id;
            $this->carreraactual = $proyectos->carrera_id;
            $this->proyecto_id = $id;

            // Carga los datos de los estudiantes que ya están relacionados al proyecto
            $this->estudiantesnominas = Estudiantenomina::where('proyecto_id','=',$this->proyecto_id)
                ->join('estudiantes','estudiante_id','estudiantes.id')
                ->get();
            $this->docentesnomina = Docentenomina::where('proyecto_id','=',$this->proyecto_id)
                ->join('responsables','responsable_id','responsables.id')
                ->get();
        } else 
        { 
            $this->proyecto_id = null;
        }
    }

    public function borrarProyecto_id() { $this->proyecto_id=null;}
    
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

    public function crearProyecto() {

        $this->validate([
            'descripciondelapropuesta' => 'required',
        ]);
        $proyecto = new Proyectos;
        
        $proyecto->anio = 0;
        $proyecto->intencionalidadpedagógica = '';
        $proyecto->relacionconlaslineasdeacciondelpei = '';
        $proyecto->determinaciondeestudiantesdocentes = '';
        $proyecto->localizacionfisicaycobertura = '';
        $proyecto->tareasarealizar = '';
        $proyecto->cronogramaseactividades = '';
        $proyecto->detalledefondos = '';
        $proyecto->responsable_id = 1;
        $proyecto->documentaciondetransporte = '';
        $proyecto->polizasegurodge = '';
        $proyecto->carrera_id = 1;

        $proyecto->descripciondelapropuesta = $this->descripciondelapropuesta;
        $proyecto->save();
        session()->flash('mensaje', 'Se guardó el proyecto.');
    }

    public function store() {

        $this->validate([
            'anio' => 'required',
            'descripciondelapropuesta' => 'required',
            'intencionalidadpedagógica' => 'required',
            'relacionconlaslineasdeacciondelpei' => 'required',
            // 'determinaciondeestudiantesdocentes' => 'required',
            // 'localizacionfisicaycobertura' => 'required',
            'tareasarealizar' => 'required',
            'cronogramaseactividades' => 'required',
            'detalledefondos' => 'required',
            'responsable_id' => 'required',
            'documentaciondetransporte' => 'required',
            'polizasegurodge' => 'required',
        ]);
        //  dd($this->documentaciondetransporte);
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
            'responsable_id' => $this->responsable_id,
            'documentaciondetransporte' => $this->documentaciondetransporte,
            'polizasegurodge' => $this->polizasegurodge,
        ]);
        $this->proyecto_id = null;
        session()->flash('mensaje', 'Se guardó el proyecto.');
    }

    public function selectCarrera() {
        $this->estudiantes = Estudiantes::where('carrera_id','=',$this->carrera_id)->get();
    }

    public function CargarTablasParticipantes() {
        $this->estudiantesnominas = Estudiantenomina::where('proyecto_id','=',$this->proyecto_id)
        ->join('estudiantes','estudiante_id','estudiantes.id')
        ->get();
        $this->docentesnomina = Docentenomina::where('proyecto_id','=',$this->proyecto_id)
        ->join('responsables','responsable_id','responsables.id')
        ->get();
    }

    public function agregaralumnonomina() {
        $this->validate([
            'carrera_id' => 'required',
            'estudiante_id' => 'required',
            'proyecto_id' => 'required',
        ]);
        Estudiantenomina::updateOrCreate(['id'=>$this->estudiantenomina_id],[
            'estudiante_id' => $this->estudiante_id,
            'proyecto_id' => $this->proyecto_id,
        ]);
        $this->estudiantenomina_id = null;  //limpia la variable
        $this->CargarTablasParticipantes();
    }

    public function eliminaralumnonomina($id) {
        $variable = Estudiantenomina::where('estudiante_id',$id)->where('proyecto_id','=',$this->proyecto_id)->get();
        //dd($variable[0]['id']);
        Estudiantenomina::destroy($variable[0]['id']);
        $this->CargarTablasParticipantes();
    }
    
    public function agregardocentenomina() {
        $this->validate([
            'responsable_id' => 'required',
            'proyecto_id' => 'required',
        ]);
        // Cambia el valor de docente por responsable
        Docentenomina::updateOrCreate(['id'=>$this->docentenomina_id],[
            'responsable_id' => $this->docente_id,
            'proyecto_id' => $this->proyecto_id,
        ]);
        $this->docentenomina_id = null;  //limpia la variable
        $this->CargarTablasParticipantes();
    }
    public function eliminardocentenomina($id){
        $variable = Docentenomina::where('responsable_id',$id)->where('proyecto_id','=',$this->proyecto_id)->get();
        //dd($variable[0]['id']);
        Docentenomina::destroy($variable[0]['id']);
        $this->CargarTablasParticipantes();
    }

    public function Imprimir() {
        dd($this->buscar);
    }
}
