<x-guest-layout>
    <div class="banner-overlay-login2">
        <div class="container">
            <div class="d-flex justify-content-center h-50">
                <div class="card">
                    <div>
                        <h3 class="card-header">{{ __('¡Gracias por registrarte!') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="input-group form-group">
                            {{ __('Antes de comenzar, ¿podrías verificar tu email pinchando en el enlace que te hemos enviado a tu correo? Si no lo has recibido, podemos reenviarte otro.') }}
                        </div>
                        @if (session('status') == 'verification-link-sent')
                            <div class="input-group form-group">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                        <div class="card-footer">
                            <div class="form-group">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-primary-button class="login_btn pointer">
                                        {{ __('Reenviar Verificación') }}
                                    </x-primary-button>
                                </form>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-primary-button class="login_btn pointer mt-10">
                                        {{ __('Salir') }}
                                    </x-primary-button>
                                </form>
                                <div class="mt-15">
                                    <a href="{{ route('welcome') }}">
                                        {{ __('Volver') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
