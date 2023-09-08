<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Buscador') }}
        </h2>
    </x-slot>
    <header class="section-title">
        <h3 class="card-header">
            {{ __('Buscador') }}
        </h3>
        <p>
            {{ __('Rellena el formulario para encontrar un cuidador') }}
        </p>
    </header>
    <div class="d-flex justify-content-center">
        <div class="card3">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="card-body">
                <section>
                    <div class="card-header">
                        <h3>Filtros de Búsqueda</h3>
                    </div>
                    <form method="post" action="{{ route('search.show') }}" class="mt-6 space-y-6">
                        @csrf
                        <input type='hidden' name='form-name' value='contact-form' />
                        <p>Selecciona tu/s mascota/s:</p>
                        <div id="mascotas" class="input-group justify-content-center">
                            @foreach ($mascotas as $mascota)
                                <div class="input-group form-group" style="width:100% !important; margin-left:195px;">
                                    <input id="{{ $mascota->id }}" name="mascotas[]" type="checkbox"
                                        value="{{ $mascota->id }}" class="custom-control-input"/>
                                    <label for="{{ $mascota->id }}" class="custom-control-label">
                                        {{ $mascota->nombre }}  &nbsp; -> 
                                        <span style="text-transform:capitalize;">
                                            @if ($mascota->tipo == 'otros')
                                                {{ $mascota->otro }}
                                            @else
                                                {{ $mascota->tipo }}
                                            @endif
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div id="error_mascota" class="input-group form-group" hidden>
                            <label class="error_yellow">Tienes que seleccionar al menos una mascota</label>
                        </div>

                        <div class="input-group form-group justify-content-center">
                            <p>Escoge las fechas de la estancia: </p>
                            <div class="row ">
                                <div class="col">
                                    <x-input-label for="finicio" :value="__('Fecha inicio')" />
                                    <input id="finicio" name="finicio" type="date" class="form-control pointer"
                                        value="{{ old('finicio') }}" title="Selecciona una fecha"/>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('finicio')" />
                                </div>
                                <div class="col">
                                    <x-input-label for="ffin" :value="__('Fecha fin')" />
                                    <input id="ffin" name="ffin" type="date" class="form-control pointer"
                                        value="{{ old('ffin') }}" title="Selecciona una fecha"/>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('ffin')" />
                                </div>
                            </div>
                        </div>
                        <div id="error_fecha1" class="input-group form-group" hidden>
                            <label class="error_yellow">Formato de fecha de inicio incorrecto</label>
                        </div>
                        <div id="error_fecha2" class="input-group form-group" hidden>
                            <label class="error_yellow">Formato de fecha de fin incorrecto</label>
                        </div>
                        <div id="error_fecha3" class="input-group form-group" hidden>
                            <label class="error_yellow">La fecha fin no puede ser inferior a la fecha de inicio</label>
                        </div>
                        <div id="error_fecha4" class="input-group form-group" hidden>
                            <label class="error_yellow">No puedes seleccionar una fecha pasada</label>
                        </div>

                        <span>Escoge una provincia: </span>
                        <div class="input-group form-group" style="width:100% !important;">
                            <div class="input-group form-group">
                                <select name="provincia" id="provincia" class="form-control pointer" title="Selecciona una provincia">
                                    @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia }}" {{ old('provincia') }}>
                                            {{ $provincia }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('provincia')" class="error_yellow" />
                        </div>
                        <div id="error_provincia" class="input-group form-group" hidden>
                            <label class="error_yellow">Tienes que seleccionar una provincia</label>
                        </div>
                        <!--<div class="input-group form-group">
                        <p>Elige precio maximo: </p>
                        <div class="input-group form-group">
                            <x-input-label for="precio" :value="__('Precio')" />
                            <x-text-input id="precio" class="form-control" name="precio" type="text" :value="old('precio')" />
                        </div>
                        </div>-->
                        <div class="form-group">
                            <x-primary-button class="login_btn pointer" name="guardar"
                                onclick="event.preventDefault();validar_buscador(this.form);">
                                {{ __('Buscar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/funciones.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputFecha = document.getElementById('finicio');
            const fechaActual = new Date().toISOString().slice(0, 10);
            inputFecha.value = fechaActual;
        });
        document.addEventListener("DOMContentLoaded", function() {
            const inputFecha = document.getElementById('ffin');
            const fechaActual = new Date().toISOString().slice(0, 10);
            inputFecha.value = fechaActual;
        });
        $('#finicio').attr('min', new Date().toISOString().slice(0, 10));
        $('#ffin').attr('min', new Date().toISOString().slice(0, 10));
    </script>

</x-app-layout>
