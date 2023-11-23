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
                                                <h4>Listado de Responsables</h4>
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
                                                <td>Responsable</td>
                                                <td>DNI</td>
                                                <td>Teléfono</td>
                                                <td>Correo Electrónico</td>
                                                <td>Rol</td>
                                                <td>Opciones</td>
                                            </tr>
                                            @if($responsables)
                                                @foreach ($responsables as $responsable)
                                                <tr>
                                                    <td>{{ $responsable->nombreresponsable }}</td>
                                                    <td>{{ $responsable->dniresponsable }}</td>
                                                    <td>{{ $responsable->telefonoresponsable }}</td>
                                                    <td>{{ $responsable->emailresponsable }}</td>
                                                    <td>{{ $responsable->rol->descripcionrol }}</td>
                                                    <td>
                                                        <button type="button" wire:click="showEdit({{$responsable->id}})" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit">
                                                            Editar
                                                        </button>
                                                        <button type="button" wire:click="showDelete({{$responsable->id}})" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete">
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

            <!-- Modal Alta/Modificación Responsable -->
            <!-- ================================== -->
            <div wire:ignore.self class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Alta/Modificación Responsables</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                <label for="">Nombre del Responsable</label>
                                <input type="text" class="form-control" value="{{ old('nombreresponsable') }}" wire:model="nombreresponsable">
                                @error('nombreresponsable')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">DNI</label>
                                <input type="text" class="form-control" value="{{ old('dniresponsable') }}" wire:model="dniresponsable">
                                @error('dniresponsable')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Teléfono</label>
                                <input type="text" class="form-control" value="{{ old('telefonoresponsable') }}" wire:model="telefonoresponsable">
                                @error('telefonoresponsable')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Correo electrónico</label>
                                <input type="text" class="form-control" value="{{ old('emailresponsable') }}" wire:model="emailresponsable">
                                @error('emailresponsable')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Rol</label>
                                <select wire:model="rol_id" class="form-control">
                                    <option value="" selected>-</option>
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}" selected>{{ $rol->descripcionrol}}</option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" class="form-control" value="{{ old('nombreresponsable') }}" wire:model="nombreresponsable"> -->
                                @error('rol_id')
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

            <!-- Modal Eliminar Responsable -->
            <!-- ====================== -->
            <div wire:ignore.self class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Responsable</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                Está seguro de que quiere eliminar el responsable: <b>{{ $nombreresponsable }}</b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy({{ $responsable_id }})">
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