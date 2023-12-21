<div>
    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
      </script>
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
                                                <button type="button" class="ml-3 mb-1 btn btn-info" data-toggle="modal" data-target="#ModalEdit">
                                                    Nuevo
                                                </button>
                                            </div>
                                            <div class="col-3">
                                                <input wire:model="buscar" type="text" class="form-control rounded-md" placeholder="Buscar">
                                            </div>
                                        </div>
                                        <table class="table table-hover table-rounded">
                                            <tr style="background-color: lightgray;">
                                                <td>Año</td>
                                                <td>Descripcion de la propuesta</td>
                                                <td colspan="2">Opciones</td>
                                            </tr>
                                            @if($proyectos)
                                            @foreach ($proyectos as $proyecto)
                                            <tr>
                                                <td>{{ $proyecto->anio }}</td>
                                                <td>{{ $proyecto->descripciondelapropuesta }}</td>
                                                <td colspan="2">
                                                    <button type="button" wire:click="showEdit({{$proyecto->id}})" class="btn btn-warning">
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
                <textarea name="buscar" id="buscar" cols="30" rows="10" wire:model="buscar">Prueba</textarea>
                <button wire:click="Imprimir()">Imprimir</button>
            </div>


            @if($proyecto_id)
            <div class="row">
                <div class="col-xl-12 col-md-12 mt-3">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="media-body">
                                        <div class="flex d-flex justify-content-beetwen">
                                            <div class="flex d-flex col-9">
                                                <h4>{{ $descripciondelapropuesta }}</h4>
                                            </div>
                                            <div class="col-3">
                                                <input wire:model="buscar" type="text" class="form-control rounded-md" placeholder="Buscar">
                                            </div>
                                        </div>
                                        <div class="flex d-flex">
                                            <div class="col-6">
                                                <label for="">Año</label>
                                                <select wire:model="anio" class="form-control">
                                                    <option value="" selected>-</option>
                                                    <option value="2022" selected>2022</option>
                                                    <option value="2023" selected>2023</option>
                                                    <option value="2024" selected>2024</option>
                                                </select>
                                                @error('nroproyecto')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
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
                                        </div>
                                        <div class="flex d-flex">
                                            <div class="col-6">
                                                <label for="">Póliza seguro DGE</label>
                                                <input type="text" class="form-control" value="{{ old('polizasegurodge') }}" wire:model="polizasegurodge">
                                                @error('polizasegurodge')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label for="">Carrera</label>
                                                <select wire:model="carrera_id" class="form-control" wire:change="selectCarrera()">
                                                    @foreach($carreras as $carrera)
                                                        @if($carrera_id==$carrera->id)
                                                            <option value="{{ $carrera->id }}" selected>{{ $carrera->nombrecarrera}}</option>
                                                        @else
                                                            <option value="{{ $carrera->id }}">{{ $carrera->nombrecarrera}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('carrera_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>                                            
                                            <div>
                                                <label for="">Descripcion de la propuesta</label>
                                                <textarea id="mytextarea">Hello, World!</textarea>
                                                <textarea wire:model="descripciondelapropuesta" rows="5" style="width: 100%;">{{ old('descripciondelapropuesta') }}</textarea>
                                                @error('descripciondelapropuesta')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="">Intencionalidad Pedagógica</label>
                                                <textarea wire:model="intencionalidadpedagógica" rows="5" style="width: 100%;">{{ old('intencionalidadpedagógica') }}</textarea>
                                                @error('intencionalidadpedagógica')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div wire:ignore>
                                                <label for="">Relación con las lineas de accion del PEI</label>
                                                <textarea wire:model="relacionconlaslineasdeacciondelpei" rows="5" style="width: 100%;">{{ old('relacionconlaslineasdeacciondelpei') }}</textarea>
                                                @error('relacionconlaslineasdeacciondelpei')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="">Tareas a realizar</label>
                                                <textarea wire:model="tareasarealizar" rows="5" style="width: 100%;">{{ old('tareasarealizar') }}</textarea>
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

                                            {{-- LISTADOS DE DOCENTES Y ESTUDIANTES --}}
                                            <fieldset class="form-group border p-3 mt-5">
                                                <legend class="w-auto px-2">Listados de Personas participantes</legend>
                                            
                                                <div class="col-12">
                                                    <label for="">Docentes</label>
                                                    <div class="flex d-flex col-10">
                                                        <select wire:model="docente_id" class="form-control mr-2">
                                                            <option value="" selected>-</option>
                                                            @foreach($docentes as $docente)
                                                                <option value="{{ $docente->id }}" selected>{{ $docente->nombreresponsable}}</option>
                                                            @endforeach
                                                        </select>
                                                        <button type="button" class="btn btn-info col-2" wire:click="agregardocentenomina()">
                                                            <i class="fa-solid fa-pen-to-square"></i>Agregar Docente
                                                        </button>
                                                        @error('docente_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <table class="table table-bordered table-striped tablaredondeada col-12 mt-2">
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
                                                <div class="col-12">
                                                    <label for="">Estudiantes</label>
                                                    <div class="flex d-flex col-10">
                                                        <select wire:model="estudiante_id" class="form-control mr-2">
                                                            <option value="" selected>-</option>
                                                            @foreach($estudiantes as $estudiante)
                                                                <option value="{{ $estudiante->id }}" selected>{{ $estudiante->nombreestudiante}}</option>
                                                            @endforeach
                                                        </select>
                                                        <button type="button" class="btn btn-info col-2" wire:click="agregaralumnonomina()">
                                                            <i class="fa-solid fa-pen-to-square"></i>Agregar Estudiante
                                                        </button>
                                                        @error('estudiante_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <table class="table table-bordered table-striped tablaredondeada col-12 mt-2">
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
                                            </fieldset>
                                            <div class="pt-3">
                                                <button type="button" class="btn btn-success" wire:click="store()">
                                                    <i class="fa-solid fa-pen-to-square"></i>Guardar
                                                </button>
                                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close" wire:click="borrarProyecto_id()">
                                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- Modal Alta/Modificación Convenio -->
            <!-- ================================== -->
            <div wire:ignore.self class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 80%;">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Alta/Modificación Proyecto</h5>
                            <button type="button" class="close" data-dismiss="modal"  wire:click="borrarProyecto_id()" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                <label for="">Descripcion de la propuesta</label>
                                <textarea wire:model="descripciondelapropuesta" rows="5" style="width: 100%;">{{ old('descripciondelapropuesta') }}</textarea>
                                @error('descripciondelapropuesta')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="pt-3 mb-3">
                                <button type="button" class="btn btn-success" wire:click="crearProyecto()">
                                    <i class="fa-solid fa-pen-to-square"></i>Guardar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                            @if(session("mensaje"))
                            <div class="bg-green round-md alert alert-success">
                                {{ session('mensaje') }}
                            </div>
                            @endif
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
                        <div class="p-3">Está seguro de que quiere eliminar el convenio?</div>
                        <div class="p-3">
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
    {{-- <div wire:ignore.self class="modal fade" id="ModalEstudientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div> --}}

    </section>
</div>
</div>

@push('scripts')


    <script>
        tinymce.init({
            selector: '#message',
            forced_root_block: false,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    @this.set('message', editor.getContent());
                });
            }
        });
    </script>



@endpush