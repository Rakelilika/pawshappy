<x-guest-layout>
    <div class="banner-overlay-login">
        <div class="container" id="container-forgot">
            <div class="d-flex justify-content-center h-50">
                <div class="card">
                    <div>
                        <h3 class="card-header">{{ __('Registro') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <input type='hidden' name='form-name' value='contact-form' />
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <!-- Email Address -->
                            <div class="input-group form-group">
                                <x-input-label for="email" :value="__('Email')" class="pt-5"/> &nbsp; 
                                <x-text-input id="email" type="email" name="email" class="form-control"
                                    :value="old('email', $request->email)" required autofocus autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 error_yellow" />
                            </div>
                            <!-- Password -->
                            <div class="input-group form-group">
                                <x-input-label for="password" :value="__('Password')" class="pt-5"/> &nbsp; 
                                <x-text-input id="password" class="form-control" type="password" name="password"
                                    required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2 error_yellow" />
                            </div>
                            <!-- Confirm Password -->
                            <div class="input-group form-group">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="pt-5"/> &nbsp; 
                                <x-text-input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 error_yellow" />
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <x-primary-button class="login_btn pointer mt-15">
                                        {{ __('Reset Password') }}
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
    <script>
        $("link[id='styles']").attr('href', '../' + $("link[id='styles']").attr('href'));
    </script>
</x-guest-layout>
