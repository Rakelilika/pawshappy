<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuidador;
use App\Models\Precio;

class CarerController extends Controller
{
	public function cuidador(Request $request, $user)
	{
		$id_user = Auth::user()->id;
		if ($user != $id_user) {
			return redirect()->route('profile.edit')->with('error', 'No te pases de listo, evaristo');
		}
		//TODO modo vacaciones
		$cuidador = Cuidador::where('id_usuario', $id_user)->first();
		$precio = Precio::where('id_cuidador', $cuidador->id)->first();
		return view('cuidador/cuidador', [
			'user' => $request->user(), 'cuidador' => $cuidador, 'precio' => $precio
		]);
	}

	public function peticion($id, $mascotas)
	{
		$cuidador = Cuidador::where('id', $id)->get();
		//$mascota = explode(",", $mascotas);
		return view('', compact('cuidador', 'mascotas'));
	}
}
