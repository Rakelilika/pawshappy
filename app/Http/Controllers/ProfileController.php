<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\Cuidador;
use App\Models\Mascota;
use App\Models\Precio;

class ProfileController extends Controller
{
	public function edit(Request $request): View
	{
		$id_user = Auth::user()->id;
		$cuidador = Cuidador::where('id_usuario', $id_user)->first();
		if (!$cuidador) {
			$cuidador = Cuidador::create([
				'id_usuario' => $id_user,
				'descripcion' => "",
			]);
			$precio = Precio::create([
				'id_cuidador' => $cuidador->id
			]);
		} else {
			$precio = Precio::where('id_cuidador', $cuidador->id)->first();
		}

		// Obtenemos provincias de variable de config y agregamos al principio la opcion de seleccionar
		$provincias = config('app.provincias');
		array_unshift($provincias, 'Seleccione su provincia');
		return view('profile.edit', [
			'user' => $request->user(),
			'cuidador' => $cuidador,
			'precio' => $precio,
			'provincias' => $provincias
		]);
	}

	/**
	 * Update the user's profile information.
	 */
	public function update(ProfileUpdateRequest $request): RedirectResponse
	{
		$request->user()->fill($request->validated());
		if ($request->user()->isDirty('email')) {
			$request->user()->email_verified_at = null;
		}
		$request->validate(
			[
				'nombre' => ['required', 'string', 'max:255', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/', 'min:2'],
				'apellidos' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/'],
				'direccion' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ0-9 ]+$/'],
				'cp' => ['required', 'string', 'max:5', 'min:5'],
				'ciudad' => ['required', 'string', 'max:255', 'min:2', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/'],
				'provincia' => ['required', Rule::in(config('app.provincias'))],
				'telefono' => ['required', 'min:9'],
				'fecha_nacimiento' => ['required', 'date', 'before:-18 year']
			],
			[
				'cp' => 'Tiene que tener 5 numeros',
				'telefono' => 'Tiene que tener minimo 9 numeros',
				'provincia' => 'Tienes que seleccionar una provincia',
				'fecha_nacimiento' => 'Tienes que ser mayor de 18 años',
			]
			
			// sometimes solo si ese campo está presente
		);
		$request->user()->es_cuidador = (isset($request->es_cuidador)) ? true : false;
		$request->user()->save();
		return Redirect::route('profile.edit')->with('status', 'profile-updated');
	}

	public function store(Request $request, $user, Cuidador $cuidador, Precio $precio)
	{
		//TODO controlar que el usuario actual es recibido como parametro
	   /* $request->validate(
			[
				'perro' => ['required', 'numeric', 'gte:0'],
				'gato' => ['required', 'numeric', ' gte:0'],
				'hamster' => ['required', 'numeric', ' gte:0'],
				'cobaya' => ['required', 'numeric', ' gte:0'],
				'conejo' => ['required', 'numeric', ' gte:0'],
				'huron' => ['required', 'numeric', ' gte:0'],
				'ave' => ['required', 'numeric', ' gte:0'],
				'pez' => ['required', 'numeric', ' gte:0'],
				'reptil' => ['required', 'numeric', ' gte:0'],
				'tortuga' => ['required', 'numeric', ' gte:0'],
				'otros' => ['required', 'numeric', ' gte:0'],
				'descripcion' => ['required']
			],
			[
				'perro' => 'Tienes que introducir un precio mayor que 0',
				'gato' => 'Tienes que introducir un precio mayor que 0',
				'hamster' => 'Tienes que introducir un precio mayor que 0',
				'cobaya' => 'Tienes que introducir un precio mayor que 0',
				'conejo' => 'Tienes que introducir un precio mayor que 0',
				'huron' => 'Tienes que introducir un precio mayor que 0',
				'ave' => 'Tienes que introducir un precio mayor que 0',
				'pez' => 'Tienes que introducir un precio mayor que 0',
				'reptil' => 'Tienes que introducir un precio mayor que 0',
				'tortuga' => 'Tienes que introducir un precio mayor que 0',
				'otros' => 'Tienes que introducir un precio mayor que 0',
				'descripcion' => '¡Describete para que te conozcan los buscadores!'
			]
		);*/
		$cuidador->descripcion = $request->descripcion;
		$cuidador->perro = (isset($request->ch_perro)) ? true : false;
		$cuidador->gato = (isset($request->ch_gato)) ? true : false;
		$cuidador->hamster = (isset($request->ch_hamster)) ? true : false;
		$cuidador->cobaya = (isset($request->ch_cobaya)) ? true : false;
		$cuidador->conejo = (isset($request->ch_conejo)) ? true : false;
		$cuidador->huron = (isset($request->ch_huron)) ? true : false;
		$cuidador->ave = (isset($request->ch_ave)) ? true : false;
		$cuidador->pez = (isset($request->ch_pez)) ? true : false;
		$cuidador->reptil = (isset($request->ch_reptil)) ? true : false;
		$cuidador->tortuga = (isset($request->ch_tortuga)) ? true : false;
		$cuidador->otros = (isset($request->ch_otros)) ? true : false;
		$cuidador->save();

		$precio = Precio::where('id_cuidador', $cuidador->id)->first();
		$precio->perro = (isset($request->ch_perro)) ? $request->perro : $precio->perro;
		$precio->gato = (isset($request->ch_gato)) ? $request->gato : $precio->gato;
		$precio->hamster = (isset($request->ch_hamster)) ? $request->hamster : $precio->hamster;
		$precio->cobaya = (isset($request->ch_cobaya)) ? $request->cobaya : $precio->cobaya;
		$precio->conejo = (isset($request->ch_conejo)) ? $request->conejo : $precio->conejo;
		$precio->huron = (isset($request->ch_huron)) ? $request->huron : $precio->huron;
		$precio->ave = (isset($request->ch_ave)) ? $request->ave : $precio->ave;
		$precio->pez = (isset($request->ch_pez)) ? $request->pez : $precio->pez;
		$precio->reptil =  (isset($request->ch_reptil)) ? $request->reptil : $precio->reptil;
		$precio->tortuga = (isset($request->ch_tortuga)) ? $request->tortuga : $precio->tortuga;
		$precio->otros = (isset($request->ch_otros)) ? $request->otros : $precio->otros;
		$precio->save();
		// return redirect()->route('profile.cuidador', ['cuidador' => $cuidador,'user' => $user, 'precio' => $precio])->with('success','Cuidador modificado correctamente');
		
		// Lo asignamos como cuidador para que al volver el check esté marcado
		$user = Auth::user();
		$user->es_cuidador = true;
		$user->save();

		return redirect()->route('profile.edit')->with('success', 'Perfil de cuidador guardado');
	}

	/**
	 * Delete the user's account.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		$request->validateWithBag('userDeletion', [
			'password' => ['required', 'current_password'],
		]);
		$user = $request->user();
		$mascotas = Mascota::where([
			'id_usuario' => $user->id,
			'eliminada' => 0
		])->get();
		if (count($mascotas)) {
		   return redirect()->route('profile.edit')->with('error', 'Debes eliminar primero tus mascotas');
		} else {
			Auth::logout();
			$user->nombre = "Fantasma";
			$user->apellidos = "Ghost";
			$user->direccion = "Calle del Olvido";
			$user->telefono = "000000000";
			$user->email = "@";
			$user->fecha_baja = now();
			$user->usuario_activo = false;
			$user->usuario_eliminado = true;
			$user->save();
			//$user->delete();
			$request->session()->invalidate();
			$request->session()->regenerateToken();
			return Redirect::to('/');
		}
	}
}
