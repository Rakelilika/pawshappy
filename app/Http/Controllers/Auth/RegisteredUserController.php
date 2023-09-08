<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Obtenemos provincias de variable de config y agregamos al principio la opcion de seleccionar
        $provincias = config('app.provincias');
        array_unshift($provincias, 'Seleccione su provincia');
        return view('auth.register', compact('provincias'));
    }

    /**
     * Handle an incoming registration request.
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'nombre' => ['required', 'string', 'max:255', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/', 'min:2'],
                'email' => ['required', 'string', 'email', 'max:255', 'regex:/^[\w\-\.]{3,}@([\w-]{2,}\.)[\w-]{2,}$/', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'apellidos' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/'],
                'direccion' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9 ]+$/'],
                'cp' => ['required', 'string', 'max:5', 'min:5'],
                'ciudad' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/'],
                'provincia' => ['required', Rule::in(config('app.provincias'))],
                'telefono' => ['required', 'min:9'],
                'fecha_nacimiento' => ['required', 'date', 'before:-18 year']
            ],
            [
                'email' => 'El email no tiene el formato correcto o ya está registrado',
                'provincia' => 'Tienes que seleccionar una provincia',
                'fecha_nacimiento' => 'Tienes que ser mayor de 18 años',
                'cp' => 'Tiene que tener 5 numeros',
                'telefono' => 'Tiene que tener minimo 9 numeros'
            ]
            // sometimes solo si ese campo está presente
        );
        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'direccion' => $request->direccion,
            'cp' => $request->cp,
            'ciudad' => $request->ciudad,
            'provincia' => $request->provincia,
            'telefono' => $request->telefono,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'es_cuidador' => (isset($request->es_cuidador)) ? true : false,
            'usuario_activo' => true,
            'usuario_bloqueado' => false,
            'usuario_eliminado' => false,
            'usuario_admin' => false,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
