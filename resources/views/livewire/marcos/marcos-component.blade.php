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
                                                <h4>Listado de Convenios Marco</h4>
                                                <button type="button" class="ml-3 mb-1 btn btn-info" wire:click="showNew()" data-toggle="modal" data-target="#ModalEdit">
                                                    Nuevo
                                                </button>
                                            </div>
                                            <div class="col-3">
                                                <input wire:model="buscar" type="text" class="form-control rounded-md" placeholder="Buscar">
                                            </div>
                                        </div>
                                        <table class="table table-hover text-nowrap table-rounded">
                                            <tr style="background-color: lightgray;">
                                                <td>Número de convenio</td>
                                                <td>Año</td>
                                                <td>Fecha de Firma</td>
                                                <td>Aprob. Res.</td>
                                                <td>Poliza Nro</td>
                                                <td>Vigencia Desde</td>
                                                <td>Vigencia Hasta</td>
                                                <td>Opciones</td>
                                            </tr>
                                            @if($convenios)
                                                @foreach ($convenios as $convenio)
                                                <tr>
                                                    <td>{{ $convenio->nroconvenio }}</td>
                                                    <td>{{ $convenio->anio }}</td>
                                                    <td>{{ $convenio->firmaconvenio }}</td>
                                                    <td>{{ $convenio->aprobadoporresolucion }}</td>
                                                    <td>{{ $convenio->polizanro }}</td>
                                                    <td>{{ $convenio->vigenciadesde }}</td>
                                                    <td>{{ $convenio->vigenciahasta }}</td>
                                                    <td>
                                                        <button type="button" wire:click="showEdit({{$convenio->id}})" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit">
                                                            Editar
                                                        </button>
                                                        <button type="button" wire:click="showDelete({{$convenio->id}})" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete">
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
                                <label for="">Número de Convenio</label>
                                <input type="text" class="form-control" value="{{ old('nroconvenio') }}" wire:model="nroconvenio" disabled>
                                @error('nroconvenio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Año</label>
                                <input type="text" class="form-control" value="{{ old('anio') }}" wire:model="anio">
                                @error('anio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Fecha de la firma del convenio</label>
                                <input type="date" class="form-control" value="{{ old('firmaconvenio') }}" wire:model="firmaconvenio">
                                @error('firmaconvenio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Aprobado por resolución</label>
                                <input type="text" class="form-control" value="{{ old('aprobadoporresolucion') }}" wire:model="aprobadoporresolucion">
                                @error('aprobadoporresolucion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Póliza Nro</label>
                                <input type="text" class="form-control" value="{{ old('polizanro') }}" wire:model="polizanro">
                                @error('polizanro')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Vigencia Desde</label>
                                <input type="date" class="form-control" value="{{ old('vigenciadesde') }}" wire:model="vigenciadesde">
                                @error('vigenciadesde')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Vigencia Hasta</label>
                                <input type="date" class="form-control" value="{{ old('vigenciahasta') }}" wire:model="vigenciahasta">
                                @error('vigenciahasta')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Relacionado con la carrera</label>
                                <select wire:model="carrera_id" class="form-control">
                                    <option value="">-</option>
                                    @foreach($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->nombrecarrera}}</option>
                                    @endforeach
                                </select>
                                @error('vigenciahasta')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-success" wire:click="store()">
                                    <i class="fa-solid fa-pen-to-square"></i>Guardar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                                @if(session("mensaje"))
                                    <br>
                                    <br>
                                    <div class="bg-green round-md alert alert-success mx-3">
                                        {{ session('mensaje') }}
                                    </div>
                                @endif
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
                                Está seguro de que quiere eliminar el convenio: <b>{{ $nroconvenio }}</b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy({{ $convenio_id }})">
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