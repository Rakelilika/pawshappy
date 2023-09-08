<x-app-layout>
    <x-slot name="header">
        <h3>
            {{ __('Profile') }}
        </h3>
    </x-slot>
    @if (session('status') === 'profile-updated')
        <p class="alert alert-success" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
            {{ __('Perfil actualizado correctamente.') }}</p>
    @elseif(session('status') === 'password-updated')
        <p class="alert alert-success" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600">
            {{ __('Contraseña actualizada correctamente') }}</p>
    @elseif(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <div class="card3">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card3">
            @include('profile.partials.update-password-form')
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card3">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
