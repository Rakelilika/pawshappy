<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Cuidador') }}
        </h2>
    </x-slot>
    <header>
        <h2 class="card-header">
            {{ __('Profile Cuidador') }}
        </h2>
        <p>
            {{ __("Actualiza tus preferencias y precios como cuidador.") }}
        </p>
    </header>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <div class="card3">
            <div class="card-body">
                <form method="post" action="{{ route('profile.store', [$user, $cuidador, $precio]) }}">
                    @csrf
                    <input type='hidden' name='form-name' value='contact-form' />
                    <div>
                        <x-input-label for="descripcion" :value="__('Descripcion de cuidador:')" />
                        <textarea id="descripcion" name="descripcion" rows="4" style="width:100%" class="mt-1 block w-full pad5" required>{{ old('descripcion', $cuidador->descripcion) }}</textarea>
                    </div>
                    <p>Selecciona el tipo de animal que quieres cuidar (sólo apareceras en las búsquedas de los animales
                        que tengas seleccionados):</p>
                    <div class="precios">
                        <div class="row hg-40">
                            <input id="ch_perro" name="ch_perro" type="checkbox"
                                {{ old('ch_perro', $cuidador->perro) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_perro', 'mostrar_perro' )" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_perro" :value="__('Perro')" />
                            <div id="mostrar_perro" class="col-sm-3 input-group">
                                <div class="pet">
                                    <x-text-input id="perro" name="perro" type="number" min="0"
                                        :value="old('perro', $precio->perro)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                </div>
                                <x-input-error class="mt-2 error_yellow" :messages="$errors->get('perro')" />
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_gato" name="ch_gato" type="checkbox"
                                {{ old('ch_gato', $cuidador->gato) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_gato','mostrar_gato')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_gato" :value="__('Gato')" />
                            <div id="mostrar_gato" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="gato" name="gato" type="number" min="0"
                                        :value="old('gato', $precio->gato)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('gato')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_hamster" name="ch_hamster" type="checkbox"
                                {{ old('ch_hamster', $cuidador->hamster) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_hamster','mostrar_hamster')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_hamster" :value="__('Hamster')" />
                            <div id="mostrar_hamster" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="hamster" name="hamster" type="number" min="0"
                                        :value="old('hamster', $precio->hamster)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('hamster')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_cobaya" name="ch_cobaya" type="checkbox"
                                {{ old('ch_cobaya', $cuidador->cobaya) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_cobaya','mostrar_cobaya')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_cobaya" :value="__('Cobaya')" />
                            <div id="mostrar_cobaya" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="cobaya" name="cobaya" type="number" min="0"
                                        :value="old('cobaya', $precio->cobaya)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('cobaya')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_huron" name="ch_huron" type="checkbox"
                                {{ old('ch_huron', $cuidador->huron) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_huron' ,'mostrar_huron')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_huron" :value="__('Huron')" />
                            <div id="mostrar_huron" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="huron" name="huron" type="number" min="0"
                                        :value="old('huron', $precio->huron)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('huron')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_conejo" name="ch_conejo" type="checkbox"
                                {{ old('ch_conejo', $cuidador->conejo) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_conejo','mostrar_conejo')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_conejo" :value="__('Conejo')" />
                            <div id="mostrar_conejo" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="conejo" name="conejo" type="number" min="0"
                                        :value="old('conejo', $precio->conejo)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('conejo')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_ave" name="ch_ave" type="checkbox"
                                {{ old('ch_ave', $cuidador->ave) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_ave' ,'mostrar_ave')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_ave" :value="__('Ave')" />
                            <div id="mostrar_ave" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="ave" name="ave" type="number" min="0"
                                        :value="old('ave', $precio->ave)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('ave')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_pez" name="ch_pez" type="checkbox"
                                {{ old('ch_pez', $cuidador->pez) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_pez' ,'mostrar_pez')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_pez" :value="__('Pez')" />
                            <div id="mostrar_pez" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="pez" name="pez" type="number" min="0"
                                        :value="old('pez', $precio->pez)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('pez')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_reptil" name="ch_reptil" type="checkbox"
                                {{ old('ch_reptil', $cuidador->reptil) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_reptil' ,'mostrar_reptil')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_reptil" :value="__('Reptil')" />
                            <div id="mostrar_reptil" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="reptil" name="reptil" type="number" min="0"
                                        :value="old('reptil', $precio->reptil)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('reptil')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_tortuga" name="ch_tortuga" type="checkbox"
                                {{ old('ch_tortuga', $cuidador->tortuga) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_tortuga','mostrar_tortuga')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_tortuga" :value="__('Tortuga')" />
                            <div id="mostrar_tortuga" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="tortuga" name="tortuga" type="number" min="0"
                                        :value="old('tortuga', $precio->tortuga)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('tortuga')" />
                                </div>
                            </div>
                        </div>

                        <div class="row hg-40">
                            <input id="ch_otros" name="ch_otros" type="checkbox"
                                {{ old('ch_otros', $cuidador->otros) ? 'checked' : '' }}
                                onclick="mostrar_animales('ch_otros','mostrar_otros')" />
                            <x-input-label class="col-sm-2 col-form-label" for="ch_otros" :value="__('Otros')" />
                            <div id="mostrar_otros" class="col-sm-3">
                                <div class="pet">
                                    <x-text-input id="otros" name="otros" type="number" min="0"
                                        :value="old('otros', $precio->otros)" class="form-control" style="width:80px"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <x-input-error class="mt-2 error_yellow" :messages="$errors->get('otros')" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group mt-30">
                        <x-primary-button class="login_btn" name="guardar">{{ __('Save') }}</x-primary-button>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('profile.edit') }}">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/funciones.js') }}"></script>
    <script>
        mostrar_div();
    </script>
</x-app-layout>
