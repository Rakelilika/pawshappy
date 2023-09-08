<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pet Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your pet's profile information.") }}
        </p>
    </x-slot>
    <header>
        <h2 class="card-header">
            {{ __('Edita el perfil de tu mascota') }}
        </h2>
        <p>
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <div class="d-flex justify-content-center">
        <div class="card3">
            <div class="card-body">
                <form method="post" action="{{ route('pet.update', $mascota) }}">
                    @csrf
                    @method('put')
                    <input type='hidden' name='form-name' value='contact-form' />
                    <div class="input-group form-group">
                        <x-text-input id="nombre" name="nombre" type="text" class="form-control"
                            placeholder="Nombre" :value="old('nombre', $mascota->nombre)" required autofocus autocomplete="nombre" title="Introduce el nombre"/>
                        <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('nombre')" />
                    </div>
                    <div id="error_nombre" class="input-group form-group" hidden>
                        <label class="error_yellow">El nombre debe tener mínimo dos letras</label>
                    </div>

                    <div id="sexo" class="input-group form-group row">
                        <span class="col-sm-2 col-form-label">Sexo:</span>
                        <div class="input-group">
                            <input id="macho" name="sexo" type="radio" value="0"
                                {{ old('sexo', $mascota->sexo) == 0 ? 'checked' : '' }} /> &nbsp;
                            <label for="macho"><i class="fas fa-mars sexo pointer" style="font-size:34px;"
                                    title="Macho"></i></label>
                        </div>
                        <div class="input-group ml-30"> &nbsp; &nbsp;
                            <input id="hembra" name="sexo" type="radio" value="1"
                                {{ old('sexo', $mascota->sexo) == 1 ? 'checked' : '' }} /> &nbsp;
                            <label for="hembra"><i class="fas fa-venus sexo pointer" style="font-size:34px;"
                                    title="Hembra"></i></label>
                        </div>
                        <div class="input-group ml-30"> &nbsp; &nbsp;
                            <input id="otros" name="sexo" type="radio" value="2"
                                {{ old('sexo', $mascota->sexo) == 2 ? 'checked' : '' }} />
                            <label for="otros"><i class="fas fa-question sexo pointer" style="font-size:30px;"
                                    title="Otros"></i></label>
                        </div>

                        <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('sexo')" />
                    </div>
                    <div id="error_sexo" class="input-group form-group" hidden>
                        <label class="error_yellow">Formato incorrecto</label>
                    </div>

                    <div class="input-group form-group">
                        <select name="tipo" id="tipo" onchange="mostrar_otros()" class="form-control" title="Selecciona el tipo">
                            @foreach ($tipos as $tipo => $valor)
                                <option value="{{ $valor }}"
                                    {{ old('tipo', $mascota->tipo) == $valor ? 'selected' : '' }}>
                                    {{ $tipo }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('tipo')" />
                    </div>
                    <div id="error_tipo" class="input-group form-group" hidden>
                        <label class="error_yellow">Tienes que seleccionar un tipo</label>
                    </div>

                    <div id="mostrar_otros">
                        <span>¿Qué tipo es?</span>
                        <div class="input-group form-group">
                            <x-text-input id="otro" name="otro" type="text" class="form-control"
                                placeholder="otro" :value="old('otro', $mascota->otro)" title="Introduce el tipo de mascota"/>
                            <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('otro')" />
                        </div>
                    </div>
                    <div id="error_otros" class="input-group form-group" hidden>
                        <label class="error_yellow">El tipo debe tener mínimo dos letras</label>
                    </div>

                    <div class="input-group form-group">
                        <x-text-input id="raza" name="raza" type="text" class="form-control"
                            placeholder="Raza" :value="old('raza', $mascota->raza)" required autofocus autocomplete="raza" title="Introduce la raza"/>
                        <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('raza')" />
                    </div>
                    <div id="error_raza" class="input-group form-group" hidden>
                        <label class="error_yellow">La raza debe tener mínimo dos letras</label>
                    </div>

                    <div class="input-group form-group">
                        <span class="form-control">{{ __('Fecha de nacimiento') }}</span>
                        <x-text-input id="edad" name="edad" type="date" class="form-control"
                            :value="old('edad', $mascota->edad)" required autofocus autocomplete="edad" title="Introduce la fecha"/>
                        <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('edad')" />
                    </div>
                    <div id="error_fecha" class="input-group form-group" hidden>
                        <label class="error_yellow">La edad no tiene el formato correcto</label>
                    </div>

                    <div class="input-group form-group">
                        <select name="tamanio" id="tamanio" class="form-control" title="Selecciona el tamaño">
                            @foreach ($tamanios as $tamanio => $valor)
                                <option value="{{ $valor }}"
                                    {{ old('tamanio', $mascota->tamanio) == $valor ? 'selected' : '' }}>
                                    {{ $tamanio }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('tamanio')" />
                    </div>
                    <div id="error_tamanio" class="input-group form-group" hidden>
                        <label class="error_yellow">Tienes que seleccionar el tamaño de tu mascota</label>
                    </div>

                    <div class="input-group form-group">
                        <input id="esterilizado" name="esterilizado" type="checkbox"
                            {{ old('esterilizado', $mascota->esterilizado) ? 'checked' : '' }} title="Selecciona esta casilla si está esterilizado"/>
                        <x-input-label class="ml-3" for="esterilizado" :value="__('Esta esterilizado?')" />
                        <x-input-error class="mt-2 error_yellow" :messages="$errors->get('esterilizado')" />
                    </div>

                    <span>Describe a tu mascota</span>
                    <div class="input-group form-group">
                        <textarea id="descripcion" name="descripcion" rows="4" style="width:100%" required autofocus class="pad5"
                            autocomplete="descripcion" title="Introduce una descripción">{{ old('descripcion', $mascota->descripcion) }}</textarea>
                        <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('descripcion')" />
                    </div>
                    <div id="error_descripcion" class="input-group form-group" hidden>
                        <label class="error_yellow">La descripción no tiene el formato correcto</label>
                    </div>

                    <div class="input-group form-group">
                        <input id="puede_estar_solo" name="puede_estar_solo" type="checkbox"
                            {{ old('puede_estar_solo', $mascota->puede_estar_solo) ? 'checked' : '' }} title="Selecciona esta casilla si puede estar solo"/>
                        <x-input-label class="ml-3" for="puede_estar_solo" :value="__('¿Puede estar solo?')" />
                        <x-input-error class="mt-2 error_yellow" :messages="$errors->get('puede_estar_solo')" />
                    </div>
                    <div class="form-group mt-30">
                        <x-primary-button class="login_btn"
                            onclick="event.preventDefault();validar_anadir_mascota(this.form);">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                    <div>
                        <a href="{{ route('pet.list') }}">
                            {{ __('Volver') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/funciones.js') }}"></script>
    <script>
        mostrar_otros();
        $('#edad').attr('max', new Date().toISOString().slice(0, 10));
    </script>
</x-app-layout>
