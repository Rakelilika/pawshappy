<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Mascota;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	/**
	 * Get the view / contents that represents the component.
	 */
	public function index(): View
	{
		$id_user = Auth::user()->id;
		$tiene_mascota = false;
		if (Mascota::where(['id_usuario' => $id_user, 'eliminada' => 0])->first()) {
			$tiene_mascota = true;
		}
		$soy_cuidador = false;
		if (User::where(['es_cuidador' => 1, 'id' => $id_user])->first()) {
			 $soy_cuidador = true;
		}
		return view('dashboard', compact('tiene_mascota', 'soy_cuidador'));
	}
}
