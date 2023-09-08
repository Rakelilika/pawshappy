<x-guest-layout>
    <div class="banner-overlay-login">
        <div class="container mt-50" id="container-forgot">
            <div class="d-flex justify-content-center h-50">
                <div class="card">
                    <div>
                        <h3 class="card-header">{{ __('Forgot your password?') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="input-group form-group">
                            {{ __('No hay problema. Escribe tu email y te enviaremos un enlace para poder reestablecer tu contraseña.') }}
                        </div>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <!-- Email Address -->
                            <div class="">
                                <x-input-label for="email" :value="__('Email:')" class="pt-5"/> &nbsp; 
                                <x-text-input id="email" type="email" name="email" class="pad5" style="width:260px;"
                                    :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 error_yellow" />
                            </div>
                            <div class="card-footer mt-30 pt-30">
                                <div class="form-group">
                                    <x-primary-button class="login_btn pointer">
                                        {{ __('Reestablecer contraseña') }}
                                    </x-primary-button>
                                </div>
                                <div>
                                    <a href="{{ route('welcome') }}">
                                        {{ __('Volver') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
