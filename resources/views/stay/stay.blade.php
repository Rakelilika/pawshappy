<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Estancias') }}
        </h2>
    </x-slot>
    <header class="section-title">
        <h3 class="card-header">
            {{ __('Estancias') }}
        </h3>
        <p>
            {{ __('Aquí encontrarás la información de tus estancias') }}
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
    <div>
        <div class="d-flex justify-content-center">
            <div class="card3">
                @include('stay.partials.request')
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card3">
                @include('stay.partials.programate')
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card3">
                @include('stay.partials.curse')
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card3">
                @include('stay.partials.past')
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card3">
                @include('stay.partials.reject')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/funciones.js') }}"></script>
</x-app-layout>
