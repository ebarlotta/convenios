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
                                                <h4>Listado de Instituciones Receptoras</h4>
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
                                                <td>Nombre Institución</td>
                                                <td>Dependiente de</td>
                                                <td>Representada por</td>
                                                <td>dnirepresentante</td>
                                                <td>Teléfono</td>
                                                <td>Carácter Representante</td>
                                            </tr>
                                            <tr>
                                                <td>Acreditado por</td>
                                                <td>Domicilio</td>
                                                <td>Ciudad</td>
                                                <td>Correo Electrónico</td>
                                                <td>Llamade en adelante</td>
                                                <td>Receptora</td>
                                            </tr>
                                            @if($receptoras)
                                                @foreach ($receptoras as $receptora)
                                                <tr>
                                                    <td>{{ $receptora->institucionreceptora }}</td>
                                                    <td>{{ $receptora->dependientereceptora }}</td>
                                                    <td>{{ $receptora->representante->nombreresponsable }}</td>
                                                    <td>{{ $receptora->representante->dniresponsable }}</td>
                                                    <td>{{ $receptora->telefonorepresentante }}</td>
                                                    <td>{{ $receptora->caracterrepresentante }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $receptora->acreditadopor }}</td>
                                                    <td>{{ $receptora->domicilioreceptora }}</td>
                                                    <td>{{ $receptora->ciudadreceptora }}</td>
                                                    <td>{{ $receptora->correoreceptora }}</td>
                                                    <td>{{ $receptora->enadelantereceptora }}</td>
                                                    <td>{{ $receptora->receptora ? 'Si' : 'No' }}</td>
                                                    <td>
                                                        <button type="button" wire:click="showEdit({{$receptora->id}})" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit">
                                                            Editar
                                                        </button>
                                                        <button type="button" wire:click="showDelete({{$receptora->id}})" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete">
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

            <!-- Modal Alta/Modificación Institución Receptora -->
            <!-- ================================== -->
            <div wire:ignore.self class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Alta/Modificación Institución Receptora</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                        
                        <div class="px-3 py-2">
                            <label for="">Institución Receptora</label>
                            <input type="text" class="form-control" value="{{ old('institucionreceptora') }}" wire:model="institucionreceptora">
                            @error('institucionreceptora')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Dependiente de</label>
                            <input type="text" class="form-control" value="{{ old('dependientereceptora') }}" wire:model="dependientereceptora">
                            @error('dependientereceptora')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Representadar por</label>
                            <div class="flex d-flex">
                                <select wire:model="representadareceptora" class="form-control col-6" wire:change="DevolverDNI()">
                                    <option value="" selected>-</option>
                                    @foreach($responsables as $responsable)
                                        <option value="{{ $responsable->id }}" selected>{{ $responsable->nombreresponsable}}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control col-5 ml-2" wire:model="dnirepresentante" value="{{ $dnirepresentante }}" disabled>
                            </div>
                            @error('responsable_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Telefono</label>
                            <input type="text" class="form-control" value="{{ old('telefonorepresentante') }}" wire:model="telefonorepresentante">
                            @error('telefonorepresentante')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Carácter</label>
                            <input type="text" class="form-control" value="{{ old('caracterrepresentante') }}" wire:model="caracterrepresentante">
                            @error('caracterrepresentante')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Acreditado por</label>
                            <input type="text" class="form-control" value="{{ old('acreditadopor') }}" wire:model="acreditadopor">
                            @error('acreditadopor')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Domicilio</label>
                            <input type="text" class="form-control" value="{{ old('domicilioreceptora') }}" wire:model="domicilioreceptora">
                            @error('domicilioreceptora')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Ciudad</label>
                            <input type="text" class="form-control" value="{{ old('ciudadreceptora') }}" wire:model="ciudadreceptora">
                            @error('ciudadreceptora')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Correo Electrónico</label>
                            <input type="text" class="form-control" value="{{ old('correoreceptora') }}" wire:model="correoreceptora">
                            @error('correoreceptora')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">En adelante</label>
                            <input type="text" class="form-control" value="{{ old('enadelantereceptora') }}" wire:model="enadelantereceptora">
                            @error('enadelantereceptora')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Receptora <input type="checkbox" class="form-control" value="{{ old('receptora') }}" wire:model="receptora"></label>
                            @error('receptora')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="pb-3 ml-3">
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

            <!-- Modal Eliminar Institución Receptora -->
            <!-- ====================== -->
            <div wire:ignore.self class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Institución Receptora</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                Está seguro de que quiere eliminar el la institución receptora: <b>{{ $institucionreceptora }}</b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy({{ $receptora_id }})">
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
