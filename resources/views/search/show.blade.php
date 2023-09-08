<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Result') }}
        </h2>
    </x-slot>
    <header>
        <h2 class="card-header">
            {{ __('Buscador') }}
        </h2>
        <p>
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <div class="d-flex justify-content-center">
        <div class="card3">
            @foreach ($data as $d)
                <div class="card-body">
                    <form method="post" action="{{ route('stay.create') }}">
                        @csrf
                        <input type='hidden' name='form-name' value='contact-form' />
                        <div>
                            <h3 class="card-header">Cuidador: {{ $d->nombre }}</h3>
                        </div>
                        <div class="mt-50">
                            <p>Fecha de inicio: <span class="strong">{{ date_format(date_create($fecha_inicio), 'd/m/Y'); }}</span></p>
                            <p>Fecha de fin: <span class="strong">{{ date_format(date_create($fecha_fin), 'd/m/Y'); }}</span></p>
                            <input type="hidden" value="{{ $fecha_inicio }}" name="fecha_inicio" />
                            <input type="hidden" value="{{ $fecha_fin }}" name="fecha_fin" />
                            <input type="hidden" value="{{ $id_user }}" name="id_solicitante" />
                            <input type="hidden" value="{{ $d->id_cuidador }}" name="id_cuidador" />
                            <input type="hidden" value="{{ $id_mascotas }}" name="id_mascotas" />

                            <p>{{ $d->nombre }} vive en <span class="strong">{{ $d->ciudad }}</span> en la provincia de <span class="strong">{{ $d->provincia }}</span></p>
                            <p>Su descripción como cuidador es: </p>
                                <p style="font-style:italic;">{{ $d->descripcion }}.</p>
                            @if (isset($d->valoracion))
                                <div>
                                    <span>La valoración media que los usuarios le han dado es: {{ $d->valoracion }}</span>
                                </div>
                            @endif
                            @if (isset($d->perro))
                                <div id="mostrar_perro">
                                    <span>Precio para Perro: </span>
                                    <input type="hidden" value="{{ $d->perro }}" name="precios[]"/>
                                    <span class="strong">{{ $d->perro }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->gato))
                                <div id="mostrar_gato">
                                    <span>Precio para Gato: </span>
                                    <input type="hidden" value="{{ $d->gato }}" name="precios[]"/>
                                    <span class="strong">{{ $d->gato }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->hamster))
                                <div id="mostrar_hamster">
                                    <span>Precio para Hamster: </span>
                                    <input type="hidden" value="{{ $d->hamster }}" name="precios[]"/>
                                    <span class="strong">{{ $d->hamster }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->cobaya))
                                <div id="mostrar_cobaya">
                                    <span>Precio para Cobaya: </span>
                                    <input type="hidden" value="{{ $d->cobaya }}" name="precios[]"/>
                                    <span class="strong">{{ $d->cobaya }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->conejo))
                                <div id="mostrar_conejo">
                                    <span>Precio para Conejo: </span>
                                    <input type="hidden" value="{{ $d->conejo }}" name="precios[]"/>
                                    <span class="strong">{{ $d->conejo }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->huron))
                                <div id="mostrar_huron">
                                    <span>Precio para Hurón: </span>
                                    <input type="hidden" value="{{ $d->huron }}" name="precios[]"/>
                                    <span class="strong">{{ $d->huron }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->ave))
                                <div id="mostrar_ave">
                                    <span>Precio para Ave: </span>
                                    <input type="hidden" value="{{ $d->ave }}" name="precios[]"/>
                                    <span class="strong">{{ $d->ave }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->pez))
                                <div id="mostrar_pez">
                                    <span>Precio para Pez: </span>
                                    <input type="hidden" value="{{ $d->pez }}" name="precios[]"/>
                                    <span class="strong">{{ $d->pez }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->reptil))
                                <div id="mostrar_reptil">
                                    <span>Precio para Reptil: </span>
                                    <input type="hidden" value="{{ $d->reptil }}" name="precios[]"/>
                                    <span class="strong">{{ $d->reptil }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->tortuga))
                                <div id="mostrar_tortuga">
                                    <span>Precio para Tortuga: </span>
                                    <input type="hidden" value="{{ $d->tortuga }}" name="precios[]"/>
                                    <span class="strong">{{ $d->tortuga }} €/día</span>
                                </div>
                            @endif
                            @if (isset($d->otros))
                                <div id="mostrar_otros">
                                    <span>Precio para otros animales: </span>
                                    <input type="hidden" value="{{ $d->otros }}" name="precios[]"/>
                                    <span class="strong">{{ $d->otros }} €/día</span>
                                    <span>¡Depende del animal que tengas!</span>
                                </div>
                            @endif
                            @if (isset($precio_total))
                                <div id="">
                                    <span>Precio total: </span>
                                    <input type="hidden" value="{{ $precio_total }}" name="precio_total"/>
                                    <span class="strong">{{ $precio_total }} €</span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group green-border-focus mt-50">
                            <x-input-label for="observaciones" :value="__('Observaciones')" />:
                            <textarea id="observaciones" class="form-control" name="observaciones" rows="3" style="width:100%"></textarea>
                        </div>
                        <div class="form-group mt-50">
                            <x-primary-button class="login_btn pointer"
                                name="guardar">{{ __('Contactar') }}</x-primary-button>
                        </div>
                        <div>
                            <a href="{{ route('search.index') }}">
                                {{ __('Cambiar filtros') }}
                            </a>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
