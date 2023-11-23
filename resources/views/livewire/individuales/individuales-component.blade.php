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
                                                <h4>Listado de Convenios Individuales</h4>
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
                                                <td>Nro Conv. <br>Marco</td>
                                                <td>Estudiante</td>
                                                <td>Periodo <br>Desde</td>
                                                <td>Periodo <br>Hasta</td>
                                                <td>Dia de <br>la semana</td>
                                                <td>Horarios <br>desde-hasta</td>
                                                <td>Responsable</td>
                                                <td>Convenio <br>Firmado</td>
                                            </tr>
                                            @if($individuales)
                                                @foreach ($individuales as $individuales)
                                                <tr>
                                                    <td>{{ $individuales->marco_id }}</td>
                                                    <td>{{ $individuales->estudiante->nombreestudiante }}</td>
                                                    <td>{{ $individuales->periododesde }}</td>
                                                    <td>{{ $individuales->periodohasta }}</td>
                                                    <td>{{ $individuales->diasdelasemana }}</td>
                                                    <td>{{ $individuales->horariosdesdehasta }}</td>
                                                    <td>{{ $individuales->responsable->nombreresponsable }}</td>
                                                    <td>{{ $individuales->firmaconvenio }}</td>
                                                    <td>
                                                        <button type="button" wire:click="showEdit({{$individuales->id}})" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit">
                                                            Editar
                                                        </button>
                                                        <button type="button" wire:click="showDelete({{$individuales->id}})" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete">
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

            <!-- Modal Alta/Modificación Convenio Individual -->
            <!-- ================================== -->
            <div wire:ignore.self class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Alta/Modificación Convenio Individual</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="px-3 py-2">
                            <label for="">Nro Convenio Marco</label>
                            <select wire:model="marco_id" class="form-control">
                                <option value="" selected>-</option>
                                @foreach($marcos as $marco)
                                    <option value="{{ $marco->id }}" selected>{{ $marco->nroconvenio}}</option>
                                @endforeach
                            </select>
                            @error('marco_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Estudiante</label>
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
                        <div class="px-3 py-2">
                            <label for="">Periodo Desde</label>
                            <input type="date" class="form-control" value="{{ old('periododesde') }}" wire:model="periododesde">
                            @error('periododesde')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Periodo Hasta</label>
                            <input type="date" class="form-control" value="{{ old('periodohasta') }}" wire:model="periodohasta">
                            @error('periodohasta')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Dias de la Semana</label>
                            <input type="text" class="form-control" value="{{ old('diasdelasemana') }}" wire:model="diasdelasemana">
                            @error('diasdelasemana')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
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
                        <div class="px-3 py-2">
                            <label for="">Horarios desde-hasta</label>
                            <input type="date" class="form-control" value="{{ old('horariosdesdehasta') }}" wire:model="horariosdesdehasta">
                            @error('horariosdesdehasta')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="px-3 py-2">
                            <label for="">Fecha firma convenio</label>
                            <input type="date" class="form-control" value="{{ old('firmaconvenio') }}" wire:model="firmaconvenio">
                            @error('firmaconvenio')
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

            <!-- Modal Eliminar Convenio Individual -->
            <!-- ====================== -->
            <div wire:ignore.self class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Convenio Individual</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                Está seguro de que quiere eliminar el convenio para el estudiante: <b>{{ $nombreestudiante }}</b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="destroy({{ $individual_id }})">
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
