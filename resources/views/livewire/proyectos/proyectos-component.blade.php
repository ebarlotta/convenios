<div>
    <div class="grey-bg container-fluid">
        <section id="stats-subtitle">
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
                                            <div class="flex d-flex col-9">
                                                <h4>Listado de Proyectos</h4>
                                                <button type="button" class="ml-3 mb-1 btn btn-info" wire:click="showNew()" data-toggle="modal" data-target="#ModalEdit">
                                                    Nuevo
                                                </button>
                                            </div>
                                            <div class="col-3">
                                                <input wire:model="buscar" type="text" class="form-control rounded-md" placeholder="Buscar">
                                            </div>
                                        </div>
                                        <table class="table table-hover text-nowrap table-rounded">
                                            <tr>
                                                <td>Año</td>
                                                <td>Descripcion de la propuesta</td>
                                                <td>Intencionalidad pedagógica</td>
                                                <td>Relacion con las lineas de accion del PEI</td>
                                                <td>Determinación de estudiantes/docentes</td>
                                                <td>Localización física y cobertura</td>
                                                <td>Tareas a realizar</td>
                                            </tr>
                                            <tr>
                                                <td>Cronograma de actividades</td>
                                                <td>Detallede fondos</td>
                                                <td>Responsable</td>
                                                <td>Documentación de transporte </td>
                                                <td>Poliza seguro DGE</td>
                                                <td>Opciones</td>
                                            </tr>
                                            @if($proyectos)
                                            @foreach ($proyectos as $proyecto)
                                            <tr>
                                                <td>{{ $proyecto->anio }}</td>
                                                <td>{{ $proyecto->descripciondelapropuesta }}</td>
                                                <td>{{ $proyecto->intencionalidadpedagógica }}</td>
                                                <td>{{ $proyecto->relacionconlaslineasdeacciondelpei }}</td>
                                                <td>{{ $proyecto->determinaciondeestudiantesdocentes }}</td>
                                                <td>{{ $proyecto->localizacionfisicaycobertura }}</td>
                                                <td>{{ $proyecto->tareasarealizar }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $proyecto->cronogramaseactividades }}</td>
                                                <td>{{ $proyecto->detalledefondos }}</td>
                                                <td>{{ $proyecto->responsable_id }}</td>
                                                <td>{{ $proyecto->documentaciondetransporte  }}</td>
                                                <td>{{ $proyecto->polizasegurodge }}</td>
                                                <td>
                                                    <button type="button" wire:click="showEdit({{$proyecto->id}})" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit">
                                                        Editar
                                                    </button>
                                                    <button type="button" wire:click="showDelete({{$proyecto->id}})" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Alta/Modificación Convenio -->
            <!-- ================================== -->
            <div wire:ignore.self class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Alta/Modificación Proyecto</h5>
                            <button type="button" class="close" data-dismiss="modal"  wire:click="borrarProyecto_id()" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <ul class="nav nav-tabs nav-justified" style="justify-content: space-between;">
                                <li class="active"><a data-toggle="tab" href="#home">Paso 1/4</a></li>
                                <li><a data-toggle="tab" href="#menu1">Paso 2/4</a></li>
                                @if($proyecto_id)
                                <li><a data-toggle="tab" href="#menu2">Paso 3/4</a></li>
                                @endif
                                <li><a data-toggle="tab" href="#menu3">Paso 3/4</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane active">
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

                                        <textarea wire:model="descripciondelapropuesta" rows="10" style="width: 100%;">{{ old('descripciondelapropuesta') }}</textarea>
                                        <!-- <input type="text" class="form-control" value="{{ old('descripciondelapropuesta') }}" wire:model="descripciondelapropuesta"> -->
                                        @error('descripciondelapropuesta')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="">Intencionalidad Pedagógica</label>
                                        <textarea wire:model="intencionalidadpedagógica" rows="10" style="width: 100%;">{{ old('intencionalidadpedagógica') }}</textarea>
                                        <!-- <input type="text" class="form-control" value="{{ old('intencionalidadpedagógica') }}" wire:model="intencionalidadpedagógica"> -->
                                        @error('intencionalidadpedagógica')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div>
                                        <label for="">Relación con las lineas de accion del PEI</label>
                                        <textarea wire:model="relacionconlaslineasdeacciondelpei" rows="10" style="width: 100%;">{{ old('relacionconlaslineasdeacciondelpei') }}</textarea>
                                        <!-- <input type="text" class="form-control" value="{{ old('relacionconlaslineasdeacciondelpei') }}" wire:model="relacionconlaslineasdeacciondelpei"> -->
                                        @error('relacionconlaslineasdeacciondelpei')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="">Tareas a realizar</label>
                                        <textarea wire:model="tareasarealizar" rows="10" style="width: 100%;">{{ old('tareasarealizar') }}</textarea>
                                        <!-- <input type="text" class="form-control" value="{{ old('tareasarealizar') }}" wire:model="tareasarealizar"> -->
                                        @error('tareasarealizar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @if($proyecto_id)
                                <div id="menu2" class="tab-pane fade">

                                    <div class="px-3 py-3">
                                        <div class="flex d-flex">
                                            <div class="px-3 py-3">
                                                <label for="">Carrera</label>
                                                <select wire:model="carrera_id" class="form-control" wire:change="selectCarrera()">
                                                    <option value="" selected>-</option>
                                                    @foreach($carreras as $carrera)
                                                    <option value="{{ $carrera->id }}" selected>{{ $carrera->nombrecarrera}}</option>
                                                    @endforeach
                                                </select>
                                                @error('carrera_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="px-3 py-3">
                                                <label for="">Estudiantes</label>
                                                <select wire:model="estudiante_id" class="form-control">
                                                    <option value="" selected>-</option>
                                                    @foreach($estudiantes as $estudiante)
                                                    <option value="{{ $estudiante->id }}" selected>{{ $estudiante->nombreestudiante}}</option>
                                                    @endforeach
                                                </select>
                                                @error('estudiante_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for=""></label>
                                                <button type="button" class="btn btn-info" wire:click="agregaralumnonomina()">
                                                    <i class="fa-solid fa-pen-to-square"></i>Agregar
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <table class="table table-bordered table-striped tablaredondeada">
                                                <tr style="border-style: double;">
                                                    <td>Nomina Estudiantes</td>
                                                </tr>
                                                @if($estudiantesnominas)
                                                @foreach($estudiantesnominas as $estudiantenomina)
                                                <tr style="border-style: double;">
                                                    <td>{{ $estudiantenomina->nombreestudiante }}</td>
                                                    <td>{{ $estudiantenomina->dniestudiante }}</td>
                                                    <td><button class="btn btn-danger" wire:click="eliminaralumnonomina({{$estudiantenomina->id}})">Eliminar</button></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </table>
                                        </div>
                                        <div class="px-3 py-3">
                                            <label for="">Docentes</label>
                                            <div class="flex d-flex">
                                                <select wire:model="docente_id" class="form-control">
                                                    <option value="" selected>-</option>
                                                    @foreach($docentes as $docente)
                                                    <option value="{{ $docente->id }}" selected>{{ $docente->nombreresponsable}}</option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="btn btn-info" wire:click="agregardocentenomina()">
                                                    <i class="fa-solid fa-pen-to-square"></i>Agregar Docente
                                                </button>
                                                @error('docente_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <table class="table table-bordered table-striped tablaredondeada">
                                                <tr style="border-style: double;">
                                                    <td>Nómina Docentes</td>
                                                </tr>
                                                @if($docentesnomina)
                                                @foreach($docentesnomina as $docentenomina)
                                                <tr style="border-style: double;">
                                                    <td>{{ $docentenomina->nombreresponsable }}</td>
                                                    <td>{{ $docentenomina->dniresponsable }}</td>
                                                    <td><button class="btn btn-danger" wire:click="eliminardocentenomina({{$docentenomina->id}})">Eliminar</button></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div>
                                        <label for="">Determinación de estudiantes/docentes</label>
                                        <button type="button" class="btn btn-info" data-dismiss="modal" data-toggle="modal" data-target="#ModalEstudientes">
                                            <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                        </button>
                                        <input type="text" class="form-control">
                                        @error('determinaciondeestudiantesdocentes')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="">Localizacion física y cobertura</label>
                                        <input type="text" class="form-control" value="{{ old('localizacionfisicaycobertura') }}" wire:model="localizacionfisicaycobertura">
                                        @error('localizacionfisicaycobertura')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> -->
                                </div>
                                @endif
                                <div id="menu3" class="tab-pane fade">
                                    <div>
                                        <label for="">Cronograma de actividades</label>
                                        <input type="text" class="form-control" value="{{ old('cronogramaseactividades') }}" wire:model="cronogramaseactividades">
                                        @error('cronogramaseactividades')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="">Detalle de fondos</label>
                                        <input type="text" class="form-control" value="{{ old('detalledefondos') }}" wire:model="detalledefondos">
                                        @error('detalledefondos')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="">Documentacion de transporte</label>
                                        <input type="text" class="form-control" value="{{ old('documentaciondetransporte') }}" wire:model="documentaciondetransporte">
                                        @error('documentaciondetransporte')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="">Responsable</label>
                                        <select wire:model="responsable_id" class="form-control">
                                            <option value="" selected>-</option>
                                            @foreach($responsables as $responsable)
                                            <option value="{{ $responsable->id }}" selected>{{ $responsable->nombreresponsable}}</option>
                                            @endforeach
                                        </select>
                                        @error('responsable_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="">Póliza seguro DGE</label>
                                        <input type="text" class="form-control" value="{{ old('polizasegurodge') }}" wire:model="polizasegurodge">
                                        @error('polizasegurodge')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="pt-3">
                                        <button type="button" class="btn btn-success" wire:click="store()">
                                            <i class="fa-solid fa-pen-to-square"></i>Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close" wire:click="borrarProyecto_id()">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Eliminar Convenio -->
            <!-- ====================== -->
            <div wire:ignore.self class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Convenio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div>Está seguro de que quiere eliminar el convenio?</div>
                        <div class="pt-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy({{ $proyecto_id }})">
                                <i class="fa-solid fa-pen-to-square"></i>Eliminar
                            </button>
                            <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-pen-to-square"></i>Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Modal Estudiantes -->
    <!-- ====================== -->
    <div wire:ignore.self class="modal fade" id="ModalEstudientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content" style="width: inherit">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Convenio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="px-3 py-3">
                    <div class="flex d-flex">
                        <div class="px-3 py-3">
                            <label for="">Carrera</label>
                            <select wire:model="carrera_id" class="form-control" wire:change="selectCarrera()">
                                <option value="" selected>-</option>
                                @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id }}" selected>{{ $carrera->nombrecarrera}}</option>
                                @endforeach
                            </select>
                            @error('carrera_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-3">
                            <label for="">Estudiantes</label>
                            <select wire:model="estudiante_id" class="form-control">
                                <option value="" selected>-</option>
                                @foreach($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" selected>{{ $estudiante->nombreestudiante}}</option>
                                @endforeach
                            </select>
                            @error('estudiante_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for=""></label>
                            <button type="button" class="btn btn-info" wire:click="agregaralumnonomina()">
                                <i class="fa-solid fa-pen-to-square"></i>Agregar
                            </button>
                        </div>
                    </div>
                    <div>
                        <table class="w-100 table" style="border: black;border-color: aquamarine;border-style: groove;">
                            <tr style="border-style: double;">
                                <td>Nombre Estudiante</td>
                            </tr>
                            @if($estudiantesnominas)
                            @foreach($estudiantesnominas as $estudiantenomina)
                            <tr>
                                <td>{{ $estudiantenomina->nombreestudiante}}</td>
                                <td><button class="btn btn-danger" wire:click="eliminaralumnonomina({{$estudiantenomina->id}})">Eliminar</button></td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                    <div class="px-3 py-3">
                        <label for="">Docentes</label>
                        <select wire:model="docente_id" class="form-control">
                            <option value="" selected>-</option>
                            @foreach($docentes as $docente)
                            <option value="{{ $docente->id }}" selected>{{ $docente->nombreresponsable}}</option>
                            @endforeach
                        </select>
                        @error('docente_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="pt-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy({{ $proyecto_id }})">
                            <i class="fa-solid fa-pen-to-square"></i>Eliminar
                        </button>
                        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-pen-to-square"></i>Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
</div>
</div>