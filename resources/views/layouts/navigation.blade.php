<nav x-data="{ open: false }" class="navbar navbar-expand-lg">
    <!-- Primary Navigation Menu -->
    <!-- Logo -->
    <div class="container">
        <a class="navbar-brand navbar-logo" href="{{ route('dashboard') }}"> 
            <img src="images/logo-blanco.png" alt="logo" class="logo-1">
            <!--<i class="fas fa-paw" style="color:white;font-size:26px;"></i> -->
        </a>
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span
                class="fas fa-bars"></span> </button>
        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <x-nav-link class="nav-link" :href="route('dashboard')"
                        class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        {{ __('Principal') }}
                    </x-nav-link></li>
                <li class="nav-item"><x-nav-link class="nav-link" :href="route('pet.list')"
                        class="{{ request()->is('pet*') ? 'active' : '' }}">
                        {{ __('Mascotas') }}
                    </x-nav-link></li>
                @if ($tiene_mascota)
                    <li class="nav-item"><x-nav-link class="nav-link" :href="route('search.index')"
                            class="{{ request()->is('search*') ? 'active' : '' }}">
                            {{ __('Buscador') }}
                        </x-nav-link></li>
                @endif
                @if ($tiene_mascota || $soy_cuidador)
                    <li class="nav-item"><x-nav-link class="nav-link" :href="route('stay.index')"
                            class="{{ request()->is('stay*') ? 'active' : '' }}">
                            {{ __('Estancias') }}
                        </x-nav-link></li>
                @endif
            </ul>
        </div>
        <span class="name-nav pt-1" id="textoBienvenida">Bienvenid@ <strong>{{ Auth::user()->nombre }} </strong> &nbsp; </span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger border" onclick="event.preventDefault();this.closest('form').submit();">
                <i class="fas fa-sign-out-alt"></i>
            </button>
        </form>
    </div>

    <script>
        $(window).on("scroll", function() {
            var bodyScroll = $(window).scrollTop(), navbar = $(".navbar");
            if (bodyScroll > 130) {
                navbar.addClass("nav-scroll");
                //$('.navbar-logo i').css('color', 'black');
                $('.navbar-logo img').attr('src', 'images/logo-black.png');
                $('#textoBienvenida').css('color', '#888888');
            } else {
                navbar.removeClass("nav-scroll");
                //$('.navbar-logo i').css('color', 'white');
                $('.navbar-logo img').attr('src', 'images/logo-blanco.png');
                $('#textoBienvenida').css('color', 'white');
            }
        });
    </script>
</nav>
