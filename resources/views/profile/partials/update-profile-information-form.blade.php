<section>
    <header>
        <h3 class="card-header">
            {{ __('Profile Information') }}
        </h3>
        <p>
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <div>
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')
            <input type='hidden' name='form-name' value='contact-form' />

            <div class="input-group form-group">
                <x-text-input id="nombre" name="nombre" type="text" class="form-control" :value="old('nombre', $user->nombre)"
                    required autofocus autocomplete="nombre" placeholder="nombre" title="Introduce el nombre"/>
                <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('nombre')" />
            </div>
            <div id="error_nombre" class="input-group form-group" hidden>
                <label class="error_yellow">Necesitas mínimo dos letras</label>
            </div>

            <div class="input-group form-group">
                <x-text-input id="apellidos" name="apellidos" type="text" class="form-control" :value="old('apellidos', $user->apellidos)"
                    required autofocus autocomplete="apellidos" placeholder="apellidos" title="Introduce los apellidos"/>
                <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('apellidos')" />
            </div>
            <div id="error_apellidos" class="input-group form-group" hidden>
                <label class="error_yellow">Necesitas mínimo dos letras</label>
            </div>

            <div class="input-group form-group">
                <x-text-input id="direccion" name="direccion" type="text" class="form-control" :value="old('direccion', $user->direccion)"
                    required autofocus autocomplete="direccion" placeholder="direccion" title="Introduce la dirección"/>
                <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('direccion')" />
            </div>
            <div id="error_direccion" class="input-group form-group" hidden>
                <label class="error_yellow">Necesitas mínimo dos letras</label>
            </div>

            <div class="input-group form-group">
                <x-text-input id="cp" name="cp" type="text" class="form-control" :value="old('cp', $user->cp)"
                    required autofocus autocomplete="cp" placeholder="cp" title="Introduce el código postal"/>
                <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('cp')" />
            </div>
            <div id="error_cp" class="input-group form-group" hidden>
                <label class="error_yellow">Tiene que tener 5 digitos</label>
            </div>

            <div class="input-group form-group">
                <x-text-input id="ciudad" name="ciudad" type="text" class="form-control" :value="old('ciudad', $user->ciudad)"
                    required autofocus autocomplete="ciudad" placeholder="ciudad" title="Introduce la ciudad"/>
                <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('ciudad')" />
            </div>
            <div id="error_ciudad" class="input-group form-group" hidden>
                <label class="error_yellow">Necesitas mínimo dos letras</label>
            </div>

            <div class="input-group form-group">
                <select name="provincia" id="provincia" class="form-control" title="Selecciona la provincia">
                    @foreach ($provincias as $provincia)
                        <option value="{{ $provincia }}"
                            {{ old('provincia', $user->provincia) == $provincia ? 'selected' : '' }}>
                            {{ $provincia }}
                        </option>
                    @endforeach
                </select>
                <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('provincia')" />
            </div>
            <div id="error_provincia" class="input-group form-group" hidden>
                <label class="error_yellow">Tienes que seleccionar una provincia</label>
            </div>

            <div class="input-group form-group">
                <x-text-input id="telefono" name="telefono" type="text" class="form-control" :value="old('telefono', $user->telefono)"
                    required autofocus autocomplete="telefono" title="Introduce el teléfono"/>
                <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('telefono')" />
            </div>
            <div id="error_telefono" class="input-group form-group" hidden>
                <label class="error_yellow">El formato del teléfono no es correcto</label>
            </div>

            <div class="input-group form-group">
                <span class="form-control">{{ __('Fecha de nacimiento') }}</span>
                <x-text-input id="fecha_nacimiento" class="form-control" type="date" name="fecha_nacimiento"
                    :value="old('fecha_nacimiento', $user->fecha_nacimiento)" required autofocus autocomplete="fecha_nacimiento" title="Introduce una fecha"/>
                <x-input-error :messages="$errors->get('fecha_nacimiento')" class="input-group form-group error_yellow" />
            </div>
            <div id="error_fecha1" class="input-group form-group" hidden>
                <label class="error_yellow">La fecha no tiene el formato correcto</label>
            </div>
            <div id="error_fecha2" class="input-group form-group" hidden>
                <label class="error_yellow">Tienes que ser mayor de 18 años</label>
            </div>

            <span class="small2">Si quieres ser cuidador marca la casilla y rellena el perfil, así saldrás en las
                búsquedas</span>
            <div class="input-group form-group">
                <div class="row">
                    <div class="col">
                        <div class="custom-control custom-checkbox">
                            <input id="es_cuidador" name="es_cuidador" type="checkbox" class="custom-control-input"
                                {{ old('es_cuidador', $user->es_cuidador) ? 'checked' : '' }}
                                onclick="mostrar_cuidador()" title="Introduce el nombre" title="Selecciona esta casilla si quieres ser cuidador"/>
                            <label for="es_cuidador" class="custom-control-label">{{ __('¿Quieres ser cuidador?') }}</label>
                            <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('es_cuidador')" />
                        </div>
                    </div>
                    <div class="col ml-15" id="enlace_cuidador">
                        <button class="px-4 py-2 border border-transparent rounded-md font-semibold text-white login_btn pointer">
                            <a href="{{ route('profile.cuidador', [$user]) }}">Perfil de cuidador</a>
                        </button>
                    </div>
                </div>
            </div>

            <div class="input-group form-group">
                <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)"
                    required autocomplete="username" placeholder="email" title="Introduce el email"/>
                <x-input-error class="input-group form-group error_yellow" :messages="$errors->get('email')" />
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p>
                            {{ __('Your email address is unverified.') }}
                            <x-primary-button form="send-verification" class="login_btn pointer mt-30">
                                {{ __('Reenviar verificación') }}
                            </x-primary-button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p>
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
            <div id="error_email" class="input-group form-group error_yellow" hidden>
                <label class="error_yellow">
                    Tiene que tener minimo 3 caracteres antes, 2 despues del @ y 2 despues del punto
                </label>
            </div>

            <div class="form-group mt-20">
                <x-primary-button class="login_btn pointer" onclick="event.preventDefault();validar_perfil(this.form);">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/funciones.js') }}"></script>
    <script>
        mostrar_cuidador();
    </script>
</section>
