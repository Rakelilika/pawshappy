<section>
    <div class="card-header">
        <h3>Estancias pasadas:</h3>
    </div>
    @if ($tiene_mascota)
        <p class="text-left">Las estancias pasadas de tus mascotas:</p>
        @if ($estancias_pasadas)
            @foreach ($estancias_pasadas as $estancia)
                <div class="card-body" style="border:1px solid white;">
                    <p>De la fecha: {{ date_format(date_create($estancia['fecha_inicio']), 'd/m/Y') }} a la fecha:
                        {{ date_format(date_create($estancia['fecha_fin']), 'd/m/Y') }}</p>
                    <p>Cuidador: {{ $estancia['nombre_cuidador'] }}</p>
                    <p>En la provincia de: {{ $estancia['provincia_cuidador'] }}</p>
                    @foreach ($estancia['mascotas'] as $mascota)
                        <p>Estancia para: <strong class="text-uppercase">{{ $mascota['mascota_nombre'] }}</strong>,
                            @if ($mascota['mascota_tipo'] == 'otros')
                                {{ $mascota['mascota_otro'] }}
                            @else
                                {{ $mascota['mascota_tipo'] }}
                            @endif
                        </p>
                    @endforeach
                    <p>Precio : {{ $estancia['precio'] }} €</p>

                    @if (isset($mascota['ya_valorado']) && $mascota['ya_valorado'] == 1)
                        <div id="mostrar_valoracion">
                            Has valorado al cuidador con un:
                            <select disabled>
                                <option value="5" @if ($mascota['valoracion'] == 5) selected @endif>Muy bien
                                </option>
                                <option value="4" @if ($mascota['valoracion'] == 4) selected @endif>Bien</option>
                                <option value="3" @if ($mascota['valoracion'] == 3) selected @endif>Regular</option>
                                <option value="2" @if ($mascota['valoracion'] == 2) selected @endif>Mal</option>
                                <option value="1" @if ($mascota['valoracion'] == 1) selected @endif>Muy mal
                                </option>
                            </select>
                        </div>
                    @else
                        <x-input-label for="valora" :value="__('Valoración:')" />
                        <select id="valoracion_{{ $estancia['id'] }}">
                            <option value="5">Muy bien</option>
                            <option value="4">Bien</option>
                            <option value="3">Regular</option>
                            <option value="2">Mal</option>
                            <option value="1">Muy mal</option>
                        </select>
                        <div>
                            <a id="enlace_{{ $estancia['id'] }}" class="btn vote_btn mt-40"
                                onclick="mandar_valoracion({{ $estancia['id'] }}); return false;"
                                href="{{ route('stay.rate', [$estancia['id'], $mascota['mascota_id'], $estancia['id_cuidador'], 0, ':valoracion']) }}">Valorar
                                Cuidador</a>
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <p class="font-italic mt-50">No existen estancias pasadas</p>
        @endif
    @endif

    @if ($soy_cuidador)
        <p class="text-left mt-50">Estancias de mascotas que has cuidado:</p>
        @if ($estancias_pasadas_cuidador)
            <p></p>
            @foreach ($estancias_pasadas_cuidador as $estancia)
                <div class="card-body" style="border:1px solid white;">
                    <p>De la fecha: {{ date_format(date_create($estancia['fecha_inicio']), 'd/m/Y') }} a la fecha:
                        {{ date_format(date_create($estancia['fecha_fin']), 'd/m/Y') }}</p>
                    <p>Dueño de la mascota : {{ $estancia['nombre_dueno'] }}</p>
                    @foreach ($estancia['mascotas'] as $mascota)
                        <p><strong class="text-uppercase">{{ $mascota['mascota_nombre'] }}</strong> : Es un
                            {{ $mascota['mascota_tipo'] }}, es
                            @if ($mascota['mascota_tipo'] == 'otros')
                                {{ $mascota['mascota_otro'] }}
                            @else
                                {{ $mascota['mascota_tipo'] }}
                            @endif
                            ,
                            @if ($mascota['mascota_sexo'] == 0)
                                macho
                            @elseif ($mascota['mascota_sexo'] == 1)
                                hembra
                            @else
                                y no esta definido
                            @endif

                            de tamaño
                            @if ($mascota['mascota_tamanio'] == 0)
                                pequeño
                            @elseif ($mascota['mascota_tamanio'] == 1)
                                mediano
                            @else
                                grande
                            @endif

                            de raza {{ $mascota['mascota_raza'] }},
                            @if ($mascota['mascota_esterilizado'] == 0)
                                no esta esterilizado.
                            @else
                                esta esterililzado.
                            @endif
                        </p>
                        <p>Precio : {{ $estancia['precio'] }}€</p>

                        @if (isset($mascota['ya_valorado']) && $mascota['ya_valorado'] == 1)
                            <div id="mostrar_valoracion">
                                Has valorado a la mascota con un:
                                <select disabled>
                                    <option value="5" @if ($mascota['valoracion'] == 5) selected @endif>
                                        <strong>Muy bien</strong>
                                    </option>
                                    <option value="4" @if ($mascota['valoracion'] == 4) selected @endif>Bien
                                    </option>
                                    <option value="3" @if ($mascota['valoracion'] == 3) selected @endif>Regular
                                    </option>
                                    <option value="2" @if ($mascota['valoracion'] == 2) selected @endif>Mal
                                    </option>
                                    <option value="1" @if ($mascota['valoracion'] == 1) selected @endif>Muy mal
                                    </option>
                                </select>
                            </div>
                        @else
                            <x-input-label for="valora" :value="__('Valora')" />
                            <select id="valoracion_{{ $estancia['id'] }}_{{ $mascota['mascota_id'] }}">
                                <option value="5">Muy bien</option>
                                <option value="4">Bien</option>
                                <option value="3">Regular</option>
                                <option value="2">Mal</option>
                                <option value="1">Muy mal</option>
                            </select>
                            <div>
                                <a id="enlace_{{ $estancia['id'] }}_{{ $mascota['mascota_id'] }}"
                                    class="btn vote_btn mt-40"
                                    onclick="mandar_valoracion({{ $estancia['id'] }}, {{ $mascota['mascota_id'] }}); return false;"
                                    href="{{ route('stay.rate', [$estancia['id'], $mascota['mascota_id'], $estancia['id_cuidador'], 1, ':valoracion']) }}">Valorar
                                    Mascota</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        @else
            <p class="font-italic mt-50">No existen estancias pasadas de mascotas</p>
        @endif
    @endif
</section>
