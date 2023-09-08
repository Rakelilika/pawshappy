<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />
    <div class="banner-overlay-login">
        <div class="container mt-50">
            <div class="d-flex justify-content-center">
                <div class="card">
                    <div>
                        <h2 class="card-header">Login</h2>
                    </div>

                    <div class="card-body">
                        <form method='post' action="{{ route('login') }}">
                            @csrf
                            <input type='hidden' name='form-name' value='contact-form' />

                            <!-- Email Address -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <!--<x-input-label for="email" :value="__('Email')" />-->
                                <x-text-input id="email" class="form-control" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" placeholder="Email" title="Introduce el email"/>
                                <x-input-error :messages="$errors->get('email')" class="error_yellow" />
                            </div>

                            <!-- Password -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <!--<x-input-label for="password" :value="__('Password')" />-->
                                <x-text-input id="password" class="form-control" placeholder="Password" type="password"
                                    name="password" required autocomplete="current-password" title="Introduce la contraseña"/>
                                <x-input-error :messages="$errors->get('password')" class="error_yellow" />
                            </div>

                            <!-- Remember Me -->
                            <div class="row align-items-center remember">
                                <label for="remember_me">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 pointer" />
                                    <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="card-footer">
                                <div class="form-group">
                                    @if (Route::has('password.request'))
                                        <div>
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <x-primary-button class="login_btn pointer">
                                        {{ __('Log in') }}
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
