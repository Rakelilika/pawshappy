<section>
    <header>
        <h3 class="card-header">
            {{ __('Delete Account') }}
        </h3>
        <p>
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button onclick="$('#delete').show();" class="btn btn-danger mt-10 mb-10">{{ __('Delete Account') }}</x-danger-button>

    <form method="post" action="{{ route('profile.destroy') }}" id="delete" class="mt-20
        @if (!$errors->userDeletion->get('password')) hide @endif ">
        @csrf
        @method('delete')
        <h3 class="card-header">
            {{ __('Are you sure you want to delete your account?') }}
        </h3>
        <p class="">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </p>
        <div class="container">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
            <x-text-input id="password" name="password" type="password" class="container border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control2"
                placeholder="{{ __('Password') }}" title="Introduce la contraseña" required/>
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 error_yellow" />
        </div>
        <div class="form-group mt-20">
            <x-danger-button class="btn btn-danger">
                {{ __('Confirnar eliminación') }}
            </x-danger-button>
        </div>
    </form>
</section>
