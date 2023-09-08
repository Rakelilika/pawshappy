<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Pet Information') }}
        </h2>
        <p>
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </x-slot>
    <header>
        <h2 class="card-header">
            {{ __('Añadir mascota') }}
        </h2>
        <p>
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <div class="d-flex justify-content-center">
        <div class="card3">
            <div class="card-body">
                <form method="post" action="{{ route('pet.store') }}">
                    @csrf
                    <input type='hidden' name='form-name' value='contact-form' />
                    <div class="input-group form-group">
                        <x-text-input id="nombre" name="nombre" type="text" class="form-control"
                            placeholder="Nombre de la mascota" :value="old('nombre')" required title="Introduce el nombre"/>
                        <x-input-error :messages="$errors->get('nombre')" class="input-group form-group error_yellow" />
                    </div>
                    <div id="error_nombre" class="input-group form-group" hidden>
                        <label class="error_yellow">El nombre debe tener mínimo dos letras</label>
                    </div>

                    <div id="sexo" class="input-group form-group row">
                        <span class="col-sm-2 col-form-label">Sexo:</span>
                        <div class="input-group">
                            <x-text-input id="macho" name="sexo" type="radio" value="0" checked /> &nbsp;
                            <label for="macho"><i class="fas fa-mars sexo pointer" style="font-size:34px;" title="Macho"></i></label>
                        </div>
                        <div class="input-group ml-30"> &nbsp; &nbsp; 
                            <x-text-input id="hembra" name="sexo" type="radio" value="1" /> &nbsp; 
                            <label for="hembra"><i class="fas fa-venus sexo pointer" style="font-size:34px;" title="Hembra"></i></label>
                        </div>
                        <div class="input-group ml-30"> &nbsp; &nbsp; 
                            <x-text-input id="otros" name="sexo" type="radio" value="2" />
                            <label for="otros"><i class="fas fa-question sexo pointer" style="font-size:30px;" title="Otros"></i></label>
                        </div>
                        <x-input-error :messages="$errors->get('sexo')" class="input-group form-group error_yellow" />
                    </div>
                    <div id="error_sexo" class="input-group form-group" hidden>
                        <label class="error_yellow">Elige el sexo</label>
                    </div>

                    <div class="input-group form-group">
                        <select name="tipo" id="tipo" class="form-control" onchange="mostrar_otros()" title="Selecciona el tipo">
                            @foreach ($tipos as $tipo => $valor)
                                <option value="{{ $valor }}">{{ $tipo }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('tipo')" class="input-group form-group error_yellow" />
                    </div>
                    <div id="error_tipo" class="input-group form-group" hidden>
                        <label class="error_yellow">Tienes que seleccionar un tipo</label>
                    </div>

                    <div id="mostrar_otros">
                        <span>¿Qué tipo es?</span>
                        <div class="input-group form-group">
                            <x-text-input id="otro" name="otro" type="text" :value="old('otro')"
                                class="form-control" title="Introduce el tipo de mascota"/>
                            <x-input-error :messages="$errors->get('otro')" class="input-group form-group error_yellow" />
                        </div>
                    </div>
                    <div id="error_otros" class="input-group form-group" hidden>
                        <label class="error_yellow">El tipo debe tener mínimo dos letras</label>
                    </div>

                    <div class="input-group form-group">
                        <x-text-input id="raza" name="raza" type="text" class="form-control"
                            placeholder="Raza" :value="old('raza')" required title="Introduce la raza"/>
                        <x-input-error :messages="$errors->get('raza')" class="input-group form-group error_yellow" />
                    </div>
                    <div id="error_raza" class="input-group form-group" hidden>
                        <label class="error_yellow">La raza debe tener mínimo dos letras</label>
                    </div>

                    <div class="input-group form-group">
                        <span class="form-control">{{ __('Fecha de nacimiento') }}</span>
                        <x-text-input id="edad" class="form-control" type="date" name="edad" autofocus
                            autocomplete="edad" :value="old('edad')" required title="Introduce una fecha"/>
                        <x-input-error :messages="$errors->get('edad')" class="input-group form-group error_yellow" />
                    </div>
                    <div id="error_fecha" class="input-group form-group" hidden>
                        <label class="error_yellow">La fecha no tiene el formato correcto</label>
                    </div>

                    <div class="input-group form-group">
                        <select name="tamanio" id="tamanio" class="form-control" title="Selecciona el tamaño">
                            @foreach ($tamanios as $tamanio => $valor)
                                <option value="{{ $valor }}">{{ $tamanio }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('tamanio')" class="input-group form-group error_yellow" />
                    </div>
                    <div id="error_tamanio" class="input-group form-group" hidden>
                        <label class="error_yellow">Tienes que seleccionar el tamaño de tu mascota</label>
                    </div>

                    <div class="input-group form-group ">
                        <x-text-input  id="esterilizado" name="esterilizado" type="checkbox" :value="old('esterilizado')" title="Selecciona esta casilla si esta esterilizado"/>
                        <x-input-label class="ml-3" for="esterilizado" :value="__('¿Esta esterilizado?')" />
                    </div>

                    <span>Describe a tu mascota:</span>
                    <div class="input-group form-group justify-content-center pad5">
                        <textarea id="descripcion" name="descripcion" rows="4" style="width:100%" title="Introduce una descripción" required>{{ old('descripcion') }} </textarea>
                        <x-input-error :messages="$errors->get('descripcion')" class="input-group form-group error_yellow" />
                    </div>
                    <div id="error_descripcion" class="input-group form-group" hidden>
                        <label class="error_yellow">La descripción no tiene el formato correcto</label>
                    </div>

                    <div class="input-group form-group">
                        <x-text-input id="puede_estar_solo" name="puede_estar_solo" type="checkbox"
                            :value="old('puede_estar_solo')" title="Selecciona esta casilla si puede estar sol@ en casa"/>
                        <x-input-label  class="ml-3" for="puede_estar_solo" :value="__('¿Puede estar solo?')" />
                    </div>

                    <div class="form-group mt-30">
                        <input type="reset"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 login_btn pointer"
                            value="{{ __('Limpiar') }}" /> &nbsp; 
                        <x-primary-button class="login_btn pointer" name="guardar"
                            onclick="event.preventDefault();validar_anadir_mascota(this.form);">
                            {{ __('Save') }}
                        </x-primary-button>
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
