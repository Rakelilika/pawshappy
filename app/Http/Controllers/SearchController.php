<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Mascota;
use App\Models\Cuidador;
use Illuminate\Validation\Rule;

class SearchController extends Controller
{
	public function index()
	{
		$id_user = Auth::user()->id;
		$mascotas = Mascota::where([
			'id_usuario' => $id_user,
			'eliminada' => 0
		])->get();
		$today = date('Y-m-d');
		$provincias = config('app.provincias');
		array_unshift($provincias, 'Seleccione su provincia');
		if (!count($mascotas)) {
			return view('pet/pet', compact('mascotas'));
		}
		return view('search/search', compact('mascotas', 'provincias', 'today'));
	}

	public function show(Request $request)
	{
		$request->validate(
			[
				'provincia' => ['required', Rule::in(config('app.provincias'))],
				'finicio' => ['required', 'date', 'after:yesterday'],
				'ffin' => ['required', 'date', 'after_or_equal:finicio']
			],
			[
				'provincia' => 'Tienes que seleccionar una provincia',
				'finicio' => 'La fecha inicio debe ser una fecha a partir de hoy',
				'ffin' => 'La fecha fin tiene que ser un fecha posterior a la feha de inicio',
			]
		);
		$mensaje = "Tienes que seleccionar alguna mascota";
		$id_user = Auth::user()->id;
		if (!is_null($request->mascotas)) {
			$cond[] = ['users.provincia', '=', $request->provincia];
			$cond[] = ['users.es_cuidador', '=', 1];
			$cond[] = ['cuidador.id_usuario', '!=', $id_user];
			$selec = [];
			$id_mascotas = "";
			$fecha_inicio = $request->finicio;
			$fecha_fin = $request->ffin;
			$tipos_mascotas = [];
			foreach ($request->mascotas as $id_mascota) {
				$mascota = Mascota::find($id_mascota);
				$cond[] = ['cuidador.' . $mascota->tipo, '=', 1];
				$selec[] = 'precio.' . $mascota->tipo;
				$tipos_mascotas[] = $mascota->tipo;
				$id_mascotas .= $id_mascota . ",";
			}
			$id_mascotas = substr_replace($id_mascotas, "", -1);
			$data = Cuidador::select(
				'cuidador.id as id_cuidador',
				'users.id as user_id',
				'cuidador.descripcion',
				'users.provincia',
				'users.nombre',
				'users.ciudad'
			);
			foreach ($selec as $s) {
				$data->addSelect($s);
			}
			$data = $data->join('users', 'users.id', '=', 'cuidador.id_usuario')
				->join('precio', 'precio.id_cuidador', '=', 'cuidador.id')
				->where($cond)
				->get();

			// Calculamos dias de estancia para obtener precio final
			$inicio = new DateTime($fecha_inicio);
			$diff = $inicio->diff(new DateTime($fecha_fin));
			$dias = $diff->days + 1;	//Sumamos 1 para tener en cuenta el mismo dia de la peticion

			$precio_total = 0;
			foreach ($data as $d) {
				foreach ($tipos_mascotas as $tipo) {
					$precio_total += $d->$tipo * $dias;
				}
			}

			if (count($data)) {
				return view('search/show', compact('data', 'id_mascotas', 'id_user', 'fecha_inicio', 'fecha_fin', 'precio_total'));
			} else {
				$mensaje = "No se han encontrado cuidadores con estos filtros";
			}
		}
		return redirect()->route('search.index', ['provincias', 'mascotas'])->with('error', $mensaje);
	}
}
