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
                                                <h4>Listado de Estudiantes</h4>
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
                                                <td>Nombre Estudiante</td>
                                                <td>DNI</td>
                                                <td>Domicilio</td>
                                                <td>Provincia</td>
                                                <td>Correo Electrónico</td>
                                                <td>Teléfono</td>
                                                <td>Tareas Asignadas</td>
                                                <td>Carrera</td>
                                            </tr>
                                            <tr style="background-color: lightgray;">
                                                <td>Cuil</td>
                                                <td>Fecha de Nacimiento</td>
                                                <td>Legajo</td>
                                                <td>Póliza Nro</td>
                                                <td>Vigencia Desde</td>
                                                <td>Vigencia Hasta</td>
                                                <td></td>
                                                <td align="center">Opciones</td>
                                            </tr>
                                            @if($estudiantes)
                                                @foreach ($estudiantes as $estudiante)
                                                <tr class="pt-2">
                                                <!-- <tr class="pt-2" style="background-color: rgb(255, 160, <?php //$a=rand(5, 254); echo $a; ?>);"> -->
                                                    <td><b>{{ $estudiante->nombreestudiante }}</b></td>
                                                    <td>{{ $estudiante->dniestudiante }}</td>
                                                    <td>{{ $estudiante->domicilioestudiante }}</td>
                                                    <td>{{ $estudiante->provincia->nombreprovincia }}</td>
                                                    <td>{{ $estudiante->emailestudiante }}</td>
                                                    <td>{{ $estudiante->telefonoestudiante }}</td>
                                                    <td rowspan="2">{{ $estudiante->tareasasignadas }}</td>
                                                    <td>{{ $estudiante->carrera->nombrecarrera }}</td>
                                                </tr>
                                                <tr style="border-bottom-style: double;">
                                                <!-- <tr style="background-color: rgb(255, 160, <?php //echo $a; ?>);"> -->
                                                    <td>{{ $estudiante->cuil }}</td>
                                                    <td>{{ date('d-m-Y',strtotime($estudiante->fechanacimiento)) }}</td>
                                                    <td>{{ $estudiante->legajo }}</td>
                                                    <td>{{ $estudiante->polizanro }}</td>
                                                    <td>{{ date('d-m-Y',strtotime($estudiante->vigenciadesde)) }}</td>
                                                    <td>{{ date('d-m-Y',strtotime($estudiante->vigenciahasta)) }}</td>
                                                    <td>
                                                        <button type="button" wire:click="showEdit({{$estudiante->id}})" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit">
                                                            Editar
                                                        </button>
                                                        <button type="button" wire:click="showDelete({{$estudiante->id}})" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete">
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

            <!-- Modal Alta/Modificación Estudiante -->
            <!-- ================================== -->
            <div wire:ignore.self class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Alta/Modificación Estudiantes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                <label for="">Nombre del Estudiante</label>
                                <input type="text" class="form-control" value="{{ old('nombreestudiante') }}" wire:model="nombreestudiante">
                                @error('nombreestudiante')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">DNI</label>
                                <input type="text" class="form-control" value="{{ old('dniestudiante') }}" wire:model="dniestudiante">
                                @error('dniestudiante')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Domicilio</label>
                                <input type="text" class="form-control" value="{{ old('domicilioestudiante') }}" wire:model="domicilioestudiante">
                                @error('domicilioestudiante')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Provincia</label>
                                <select wire:model="provincia_id" class="form-control">
                                    <option value="" selected>-</option>
                                    @foreach($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" selected>{{ $provincia->nombreprovincia}}</option>
                                    @endforeach
                                </select>
                                @error('provincia_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Correo Electrónico</label>
                                <input type="text" class="form-control" value="{{ old('emailestudiante') }}" wire:model="emailestudiante">
                                @error('emailestudiante')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Teléfono</label>
                                <input type="text" class="form-control" value="{{ old('telefonoestudiante') }}" wire:model="telefonoestudiante">
                                @error('telefonoestudiante')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Carrera</label>
                                <select wire:model="carrera_id" class="form-control">
                                    <option value="" selected>-</option>
                                    @foreach($carreras as $carrera)
                                        <option value="{{ $carrera->id }}" selected>{{ $carrera->nombrecarrera}}</option>
                                    @endforeach
                                </select>
                                @error('carrera_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Tareas Asignadas</label>
                                <textarea name="" id="" cols="30" rows="10" wire:model="tareasasignadas"></textarea>
                                <!-- <input type="text" class="form-control" value="{{ old('tareasasignadas') }}" > -->
                                @error('tareasasignadas')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Cuil</label>
                                <input type="text" class="form-control" value="{{ old('cuil') }}" wire:model="cuil">
                                @error('cuil')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Fecha Nacimiento</label>
                                <input type="date" class="form-control" value="{{ old('fechanacimiento') }}" wire:model="fechanacimiento">
                                @error('fechanacimiento')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Legajo</label>
                                <input type="text" class="form-control" value="{{ old('legajo') }}" wire:model="legajo">
                                @error('legajo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="">Poliza Nro</label>
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
                            <div class="pt-3">
                                <button type="button" class="btn btn-success" wire:click="store()">
                                    <i class="fa-solid fa-pen-to-square"></i>Guardar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                            @if(session("mensaje"))
                                <br>
                                <div class="bg-green round-md alert alert-success">
                                    {{ session('mensaje') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Eliminar Estudiante -->
            <!-- ====================== -->
            <div wire:ignore.self class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content" style="width: inherit">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Estudiante</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="px-3 py-3">
                            <div>
                                Está seguro de que quiere eliminar el estudiante: <b>{{ $nombreestudiante }}</b>?
                            </div>
                            <div class="pt-3">
                                <button type="button" class="btn btn-danger" wire:click="destroy({{ $estudiante_id }})">
                                    <i class="fa-solid fa-pen-to-square"></i>Eliminar
                                </button>
                                <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                    <i class="fa-solid fa-pen-to-square"></i>Cerrar
                                </button>
                            </div>
                            @if(session("mensaje"))
                                <br>
                                <div class="bg-green round-md alert alert-success">
                                    {{ session('mensaje') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>