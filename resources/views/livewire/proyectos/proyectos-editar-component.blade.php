<div>
    <div class="grey-bg container-fluid">
        <section id="content">
            @extends('layouts.admin')
            @if(session("mensaje"))
            <div class="bg-green round-md alert alert-success">
                {{ session('mensaje') }}
            </div>
            @endif
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-3">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="media-body">
                                        <div class="flex d-flex justify-content-beetwen">
                                            <div class="flex d-flex col-11">
                                                <h4>Listado de Proyectos</h4>
                                                <div class="px-3 py-3 col-12">
                                                    <div>
                                                        <label for="">Año</label>
                                                        <select wire:model="anio" class="form-control">
                                                            <option value="" selected>-</option>
                                                            <option value="2022" selected>2022</option>
                                                            <option value="2023" selected>2023</option>
                                                            <option value="2024" selected>2024</option>
                                                        </select>
                                                        <!-- <input type="text" class="form-control" value="{{ old('anio') }}" wire:model="anio"> -->
                                                        @error('nroproyecto')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="">Descripcion de la propuesta</label>
                                                        <textarea id="mytextarea">Hello, World!</textarea>
                                                        <textarea wire:model="descripciondelapropuesta" rows="5" style="width: 100%;">{{ old('descripciondelapropuesta') }}</textarea>
                                                        <!-- <input type="text" class="form-control" value="{{ old('descripciondelapropuesta') }}" wire:model="descripciondelapropuesta"> -->
                                                        @error('descripciondelapropuesta')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="">Intencionalidad Pedagógica</label>
                                                        <textarea wire:model="intencionalidadpedagógica" rows="5" style="width: 100%;">{{ old('intencionalidadpedagógica') }}</textarea>
                                                        <!-- <input type="text" class="form-control" value="{{ old('intencionalidadpedagógica') }}" wire:model="intencionalidadpedagógica"> -->
                                                        @error('intencionalidadpedagógica')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="">Relación con las lineas de accion del PEI</label>
                                                        <textarea wire:model="relacionconlaslineasdeacciondelpei" rows="5" style="width: 100%;">{{ old('relacionconlaslineasdeacciondelpei') }}</textarea>
                                                        <!-- <input type="text" class="form-control" value="{{ old('relacionconlaslineasdeacciondelpei') }}" wire:model="relacionconlaslineasdeacciondelpei"> -->
                                                        @error('relacionconlaslineasdeacciondelpei')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="">Tareas a realizar</label>
                                                        <textarea wire:model="tareasarealizar" rows="5" style="width: 100%;">{{ old('tareasarealizar') }}</textarea>
                                                        <!-- <input type="text" class="form-control" value="{{ old('tareasarealizar') }}" wire:model="tareasarealizar"> -->
                                                        @error('tareasarealizar')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="">Cronograma de actividades</label>
                                                        <textarea wire:model="cronogramaseactividades" rows="5" style="width: 100%;">{{ old('cronogramaseactividades') }}</textarea>
                                                        @error('cronogramaseactividades')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="">Detalle de fondos</label>
                                                        <textarea wire:model="detalledefondos" rows="5" style="width: 100%;">{{ old('detalledefondos') }}</textarea>
                                                        @error('detalledefondos')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="">Documentacion de transporte</label>
                                                        <textarea wire:model="documentaciondetransporte" rows="5" style="width: 100%;">{{ old('documentaciondetransporte') }}</textarea>
                                                        @error('documentaciondetransporte')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="flex d-flex mt-2">
                                                        <div class="col-3">
                                                            <label for="">Responsable</label>
                                                            <select wire:model="responsable_id" class="form-control">
                                                                <option value="" selected>-</option>
                                                                @foreach($responsables as $responsable)
                                                                <option value="{{ $responsable->id }}" selected>{{ $responsable->nombreresponsable }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('responsable_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="">Póliza seguro DGE</label>
                                                            <input type="text" class="form-control" value="{{ old('polizasegurodge') }}" wire:model="polizasegurodge">
                                                            @error('polizasegurodge')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!-- <div class="pt-3">
                                                            <button type="button" class="btn btn-success" wire:click="store()">
                                                                <i class="fa-solid fa-pen-to-square"></i>Guardar
                                                            </button>
                                                        </div> -->
                                                        <div class="col-3">
                                                            <label for="">Carrera</label>
                                                            <select wire:model="carrera_id" class="form-control" wire:change="selectCarrera()">
                                                                <option value="" selected>-</option>
                                                                @foreach($carreras as $carrera)
                                                                <option value="{{ $carrera->id }}" selected>{{ $carrera->nombrecarrera }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('carrera_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-3">
                                                            <label for="">Estudiantes</label>
                                                            <select wire:model="estudiante_id" class="form-control">
                                                                <option value="" selected>-</option>
                                                                @foreach($estudiantes as $estudiante)
                                                                <option value="{{ $estudiante->id }}" selected>{{ $estudiante->nombreestudiante }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('estudiante_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- <div>
                                                        <label for=""></label>
                                                        <button type="button" class="btn btn-info" wire:click="agregaralumnonomina()">
                                                            <i class="fa-solid fa-pen-to-square"></i>Agregar
                                                        </button>
                                                    </div> -->
                                                    <div>
                                                        <label for="">Docentes</label>
                                                        <select wire:model="docente_id" class="form-control">
                                                            <option value="" selected>-</option>
                                                            @foreach($docentes as $docente)
                                                            <option value="{{ $docente->id }}" selected>{{ $docente->nombreresponsable }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('docente_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                            <!-- <div class="pt-3">
                                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close" wire:click="borrarProyecto_id()">
                                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                                </button>
                                            </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>