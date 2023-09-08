<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Mascota;
use App\Models\User;

class AppLayout extends Component
{
	/**
	 * Get the view / contents that represents the component.
	 */
	public function render(): View
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
		return view('layouts.app', compact('tiene_mascota', 'soy_cuidador'));
	}
}
