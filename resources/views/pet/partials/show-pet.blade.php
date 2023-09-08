<section>
    @foreach ($mascotas as $mascota)
        <div>
            <div class="card-header">
                <h2>{{ $mascota->nombre }}</h2>
            </div>
            <div class="card-body mb-20">
                <p class="card-text">Soy un/a
                    @if ($mascota->tipo == 'otros')
                        {{ $mascota->otro }}
                    @else
                        {{ $mascota->tipo }}
                    @endif
                    @if ($mascota->sexo == 0)
                        , un macho
                    @elseif($mascota->sexo == 1)
                        , una hembra
                    @else
                        y no tengo sexo
                    @endif
                    de tamaño
                    @if ($mascota->tamanio == 0)
                        pequeño
                    @elseif($mascota->tamanio == 1)
                        mediano
                    @else
                        grande
                    @endif
                    y mi raza es {{ $mascota->raza }}
                </p>
                <p class="card-text">Mi fecha de nacimiento es: {{ $mascota->edad }}</p>
                <a href="{{ route('pet.edit', $mascota) }}" class="btn login_btn">Editar</a>
                <a href="{{ route('pet.delete', $mascota) }}" class="btn btn-danger" id="btn-delete-mascota"
                    onclick="return confirm('{{ __('¿Estás seguro de querer eliminar tu msacota?') }}')">Borrar</a>
            </div>
        </div>
    @endforeach
</section>
