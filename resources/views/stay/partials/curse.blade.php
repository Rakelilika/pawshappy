<section>
    <div class="card-header">
        <h3>Estancias en curso:</h3>
    </div>
    @if ($tiene_mascota)
        <p class="text-left">Mascota en estancia:</p>
        @if ($estancias_curso)
            @foreach ($estancias_curso as $estancia)
                <div class="card-body" style="border:1px solid white;">
                    <p>De la fecha: {{ date_format(date_create($estancia['fecha_inicio']), 'd/m/Y') }} a la fecha:
                        {{ date_format(date_create($estancia['fecha_fin']), 'd/m/Y') }}</p>
                    <p>Cuidador : {{ $estancia['nombre_cuidador'] }}</p>
                    <p>Teléfono : {{ $estancia['telefono_cuidador'] }}</p>
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
                </div>
            @endforeach
        @else
            <p class="font-italic mt-50">No tienes estancias en curso</p>
        @endif
    @endif

    @if ($soy_cuidador)
        <p class="text-left mt-50">Cuidando a:</p>
        @if ($estancias_curso_cuidador)
            @foreach ($estancias_curso_cuidador as $estancia)
                <div class="card-body" style="border:1px solid white;">
                    <p>De la fecha: {{ date_format(date_create($estancia['fecha_inicio']), 'd/m/Y') }} a la fecha:
                        {{ date_format(date_create($estancia['fecha_fin']), 'd/m/Y') }}</p>
                    <p>Dueño de la mascota : {{ $estancia['nombre_dueno'] }}</p>
                    <p>Teléfono : {{ $estancia['telefono_dueno'] }}</p>
                    @foreach ($estancia['mascotas'] as $mascota)
                        <p><strong class="text-uppercase">{{ $mascota['mascota_nombre'] }} </strong> Es un
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

                            de raza {{ $mascota['mascota_raza'] }}
                        </p>
                    @endforeach
                    <p>Precio : {{ $estancia['precio'] }}€</p>
                </div>
            @endforeach
        @else
            <p class="font-italic mt-50">No existen peticiones de estancias</p>
        @endif
    @endif
</section>
