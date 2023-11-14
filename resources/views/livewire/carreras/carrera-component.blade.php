<div>
    @section('content')
    <div>
        <label for="">Nombre de la Carrera</label>
        <input type="text" value="{{ $nombrecarrera }}" wire:model="nombrecarrera">
    </div>
    <div>
        <label for="">Sede</label>
        <input type="text" value="{{ $sede }}" wire:model="sede">
    </div>
    Listado de carreras {{ $carreras }}.
    @endsection
</div>
