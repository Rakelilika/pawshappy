<section>
    <header>
        <h3 class="card-header">
            {{ __('Update Password') }}
        </h3>
        <p>
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>
    <div>
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <input type='hidden' name='form-name' value='contact-form' />
            <div class="input-group form-group">
                <x-input-label for="current_password" class="input-update" :value="__('Current Password')" />
                <x-text-input id="current_password" name="current_password" type="password" class="form-control"
                    autocomplete="current-password" title="Introduce la contraseña"/>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 error_yellow" />
            </div>
            <div id="error_contrasena" class="input-group form-group" hidden>
                <label class="error_yellow">El formato es incorrecto</label>
            </div>

            <div class="input-group form-group">
                <x-input-label for="password" class="input-update" :value="__('New Password')" />
                <x-text-input id="password" name="password" type="password" class="form-control"
                    autocomplete="new-password" title="Introduce una contraseña"/>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 error_yellow" />
            </div>
            <div id="error_contrasena1" class="input-group form-group" hidden>
                <label class="error_yellow">El formato es incorrecto</label>
            </div>

            <div class="input-group form-group">
                <x-input-label for="password_confirmation" class="input-update" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                    class="form-control" autocomplete="new-password" title="Repite la contraseña"/>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 error_yellow" />
            </div>
            <div id="error_contrasena2" class="input-group form-group" hidden>
                <label class="error_yellow">Las contraseñas no coinciden</label>
            </div>

            <div class="form-group mt-50">
                <x-primary-button class="login_btn pointer" onclick="event.preventDefault();actualizar_contrasena(this.form);">
                    {{ __('Save') }}
                </x-primary-button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</section>
