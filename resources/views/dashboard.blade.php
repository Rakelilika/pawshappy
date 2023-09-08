<x-app-layout>
    <div data-scroll-index='2'>
        <div class="row">
            <div class="col-md-12 section-title text-center mb-20">
                <h3 class="card-header">{{ __('Dashboard') }}</h3>
                <p>Busca cuidador o recibe peticiones de los dueños de mascota, y si necesitas las dos cosas, 
                    ¡puedes tenerlo en un mismo perfil!</p>
                <span class="section-title-line"></span>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                <a href="{{ route('profile.edit') }}">
                    <div class="service-box bg-white text-center">
                        <div class="icon"> <i class="fas fa-user-alt"></i> </div>
                        <div class="icon-text">
                            <h4 class="title-box">Perfil</h4>
                            <p class="black">Accede a tu perfil de usuario y también puedes crearte un perfil de cuidador.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                <a href="{{ route('pet.list') }}">
                    <div class="service-box bg-white text-center">
                        <div class="icon"> <i class="fas fa-paw"></i> </div>
                        <div class="icon-text">
                            <h4 class="title-box">Mascotas</h4>
                            <p class="black">Desde aqui podras añadir y visualizar tus mascotas y es necesario 
                                añadir para poder buscar cuidador.</p>
                        </div>
                    </div>
                </a>
            </div>
            @if ($tiene_mascota)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                    <a href="{{ route('search.index') }}">
                        <div class="service-box bg-white text-center">
                            <div class="icon"> <i class="fas fa-search-location"></i> </div>
                            <div class="icon-text">
                                <h4 class="title-box">Buscador</h4>
                                <p class="black">Desde aquí podras buscar un cuidador para tu mascota.</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @if ($tiene_mascota || $soy_cuidador)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                    <a href="{{ route('stay.index') }}">
                        <div class="service-box bg-white text-center">
                            <div class="icon"> <i class="fas fa-home"></i> </div>
                            <div class="icon-text">
                                <h4 class="title-box">Estancias</h4>
                                <p class="black">Comprueba las estancias que tienes pendiente, en curso o programadas.</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                <div class="service-box bg-white text-center">
                    <div class="icon"> <i class="fab fa-rocketchat"></i> </div>
                    <div class="icon-text">
                        <h4 class="title-box">Mensajes</h4>
                        <p class="black">Revisa tus mensajes.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-30">
                <div class="service-box bg-white text-center">
                    <div class="icon"> <i class="fas fa-bullhorn"></i> </div>
                    <div class="icon-text">
                        <h4 class="title-box">Anuncios</h4>
                        <p class="black">¿Necesitas un veterinario o llevar a tu mascota a la pelu?.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div>
        {{ __("You're logged in!") }}
    </div>

</x-app-layout>
