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
                            <h5 class="modal-title">Alta/Modificación Convenio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                <label for="">Año</label>
                                <input type="text" class="form-control" value="{{ old('anio') }}" wire:model="anio">
                                @error('nroproyecto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Descripcion de la propuesta</label>
                                <input type="text" class="form-control" value="{{ old('descripciondelapropuesta') }}" wire:model="descripciondelapropuesta">
                                @error('descripciondelapropuesta')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Intencionalidad Pedagógica</label>
                                <input type="text" class="form-control" value="{{ old('intencionalidadpedagógica') }}" wire:model="intencionalidadpedagógica">
                                @error('intencionalidadpedagógica')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Relación con las lineas de accion del PEI</label>
                                <input type="text" class="form-control" value="{{ old('relacionconlaslineasdeacciondelpei') }}" wire:model="relacionconlaslineasdeacciondelpei">
                                @error('relacionconlaslineasdeacciondelpei')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Determinación de estudiantes/docentes</label>
                                <input type="text" class="form-control" value="{{ old('determinaciondeestudiantesdocentes') }}" wire:model="determinaciondeestudiantesdocentes">
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
                            </div>
                            <div>
                                <label for="">Tareas a realizar</label>
                                <input type="text" class="form-control" value="{{ old('tareasarealizar') }}" wire:model="tareasarealizar">
                                @error('tareasarealizar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
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
                                <button type="button" class="btn btn-success"  data-dismiss="modal" wire:click="store()">
                                    <i class="fa-solid fa-pen-to-square"></i>Guardar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
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
                        <div class="px-3 py-3">
                            <div>
                                Está seguro de que quiere eliminar el proyecto: <b>{{ $descripciondelapropuesta }}</b>?
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