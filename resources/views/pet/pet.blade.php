<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Pet') }}
        </h2>
    </x-slot>
    <header class="section-title">
        <h3 class="card-header">
            {{ __('Mascotas') }}
        </h3>
        <p>
            {{ __("Añade o edita los datos de tus mascotas") }}
        </p>
    </header>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <x-primary-button class="login_btn" id="btn-mascota" name="guardar"><a href="{{ route('pet.add') }}">Añadir mascota</a></x-primary-button>

    @if (count($mascotas))
        <div class="d-flex justify-content-center">
            <div class="card3">
                @include('pet.partials.show-pet', $mascotas)
            </div>
        </div>
    @else
        <div style="margin-top:285px;"></div>
    @endif

</x-app-layout>
