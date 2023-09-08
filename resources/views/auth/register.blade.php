<x-guest-layout>
    <div class="banner-overlay-register">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card2 ">
                    <div>
                        <h3 class="card-header">Registro</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="formulario_registro" action="{{ route('register') }}">
                            @csrf
                            <input type='hidden' name='form-name' value='contact-form' />
                            <!-- Nombre -->
                            <div class="input-group form-group">
                                <!--  <x-input-label for="nombre" :value="'Name'" />-->
                                <x-text-input id="nombre" class="form-control" type="text" name="nombre"
                                    :value="old('nombre')" required autofocus autocomplete="nombre" placeholder="Nombre"
                                    min="3" title="Introduce el nombre"/>
                                <x-input-error :messages="$errors->get('nombre')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_nombre" class="input-group form-group" hidden>
                                <label class="error_yellow">Necesitas mínimo dos letras</label>
                            </div>
                            <!-- Apellidos -->
                            <div class="input-group form-group">
                                <x-text-input id="apellidos" class="form-control" type="text" name="apellidos"
                                    :value="old('apellidos')" required autofocus autocomplete="apellidos"
                                    placeholder="Apellidos" title="Introduce los apellidos"/>
                                <x-input-error :messages="$errors->get('apellidos')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_apellidos" class="input-group form-group" hidden>
                                <label class="error_yellow">Necesitas mínimo dos letras</label>
                            </div>
                            <!-- Dirección -->
                            <div class="input-group form-group">
                                <x-text-input id="direccion" class="form-control" type="text" name="direccion"
                                    :value="old('direccion')" required autofocus autocomplete="direccion"
                                    placeholder="Direccion" title="Introduce la dirección"/>
                                <x-input-error :messages="$errors->get('direccion')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_direccion" class="input-group form-group" hidden>
                                <label class="error_yellow">Necesitas mínimo dos letras</label>
                            </div>
                            <!-- CP -->
                            <div class="input-group form-group">
                                <x-text-input id="cp" class="form-control" type="number" name="cp"
                                    :value="old('cp')" required autofocus autocomplete="cp"
                                    placeholder="Codigo postal" title="Introduce el código postal"/>
                                <x-input-error :messages="$errors->get('cp')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_cp" class="input-group form-group" hidden>
                                <label class="error_yellow">Tiene que tener 5 digitos</label>
                            </div>
                            <!-- Ciudad -->
                            <div class="input-group form-group">
                                <x-text-input id="ciudad" class="form-control" type="text" name="ciudad"
                                    :value="old('ciudad')" required autofocus autocomplete="ciudad" placeholder="Ciudad" title="Introduce la ciudad"/>
                                <x-input-error :messages="$errors->get('ciudad')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_ciudad" class="input-group form-group" hidden>
                                <label class="error_yellow">Necesitas mínimo dos letras</label>
                            </div>
                            <!-- Provincia -->
                            <div class="input-group form-group">
                                <select name="provincia" id="provincia" class="form-control" title="Selecciona una provincia">
                                    @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia }}" {{ old('provincia') }}>{{ $provincia }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('provincia')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_provincia" class="input-group form-group" hidden>
                                <label class="error_yellow">Tienes que seleccionar una provincia</label>
                            </div>
                            <!-- Teléfono -->
                            <div class="input-group form-group">
                                <x-text-input id="telefono" class="form-control" type="text" name="telefono"
                                    :value="old('telefono')" required autofocus autocomplete="telefono"
                                    placeholder="Télefono" title="Introduce un teléfono"/>
                                <x-input-error :messages="$errors->get('telefono')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_telefono" class="input-group form-group" hidden>
                                <label class="error_yellow">El formato del teléfono no es correcto</label>
                            </div>
                            <!-- Fecha Nacimiento -->
                            <div class="input-group form-group">
                                <span class="form-control">{{ __('Fecha de nacimiento') }}</span>
                                <x-text-input id="fecha_nacimiento" class="form-control" type="date"
                                    name="fecha_nacimiento" :value="old('fecha_nacimiento')" autofocus
                                    autocomplete="fecha_nacimiento" title="Introduce una fecha"/>
                                <x-input-error :messages="$errors->get('fecha_nacimiento')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_fecha1" class="input-group form-group" hidden>
                                <label class="error_yellow">La fecha no tiene el formato correcto</label>
                            </div>
                            <div id="error_fecha2" class="input-group form-group" hidden>
                                <label class="error_yellow">Tienes que ser mayor de 18 años</label>
                            </div>
                            <!-- Cuidador -->
                            <span class="small2">Si quieres ser cuidador marca la casilla y rellena el perfil, así
                                saldrás en las búsquedas:</span>
                            <div class="input-group form-group">
                                <x-text-input id="es_cuidador" class="form-control" type="checkbox"
                                    name="es_cuidador" :value="old('es_cuidador')" required autofocus
                                    autocomplete="es_cuidador" title="Selecciona esta casilla si quieres ser cuidador"/>
                                <span class="form-control">{{ __('¿Quieres ser cuidador?') }}</span>
                                <x-input-error :messages="$errors->get('es_cuidador')" class="input-group form-group error_yellow" />
                            </div>
                            <!-- Email -->
                            <div class="input-group form-group">
                                <x-text-input id="email" class="form-control" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" placeholder="Email" title="Introduce un email"/>
                                <x-input-error :messages="$errors->get('email')" class="input-group form-group error_yellow error_yellow" />
                            </div>
                            <div id="error_email" class="input-group form-group" hidden>
                                <label class="error_yellow">Tiene que tener minimo 3 caracteres antes, 2 despues del @
                                    y 2 despues del punto </label>
                            </div>
                            <!-- Password -->
                            <div class="input-group form-group">
                                <x-text-input id="password" class="form-control" type="password" name="password"
                                    autocomplete="new-password" required placeholder="Contraseña" title="Introduce una contraseña"/>
                                <x-input-error :messages="$errors->get('password')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_contrasena" class="input-group form-group" hidden>
                                <label class="error_yellow">Mínimo ocho caracteres, al menos una letra y un
                                    número:</label>
                            </div>
                            <!-- Confirmar Password -->
                            <div class="input-group form-group ">
                                <x-text-input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirma contraseña" title="Repite l a contraseña "/>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="input-group form-group error_yellow" />
                            </div>
                            <div id="error_contrasena2" class="input-group form-group" hidden>
                                <label class="error_yellow">Las contraseñas no coinciden</label>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <div>
                                        <a href="{{ route('login') }}">
                                            {{ '¿Ya estás registrado?' }}
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="reset"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 login_btn pointer"
                                        value="{{ __('Limpiar') }}" /> &nbsp; 
                                    <x-primary-button class="login_btn pointer"
                                        onclick="event.preventDefault();validar_usuario();">
                                        {{ __('Dar de alta') }}
                                    </x-primary-button>
                                </div>
                                <div>
                                    <a href="{{ route('welcome') }}">
                                        {{ __('Atrás') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/funciones.js') }}"></script>
    <script>
        $('#fecha_nacimiento').attr('max', new Date().toISOString().slice(0, 10));
    </script>
</x-guest-layout>
