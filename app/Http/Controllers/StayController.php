<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Mascota;
use App\Models\Cuidador;
use App\Models\Estancia_mascota;
use App\Models\Estancias;
use App\Models\Valoracion;
use App\Models\User;

//['PENDIENTE'] => 0
//['ACEPTADO'] => 1
//['EN_CURSO'] => 2
//['FINALIZADA'] => 3
//['RECHAZADA'] => 4

class StayController extends Controller
{
	public function obtenerEstancias($estado_estancia, $filtro_usuario, $id_usuario, $tipo_valoracion = false)
	{
		$filtroUser = ($filtro_usuario == "usuario") ? "estancia.id_usuario" : "estancia.id_cuidador";
		$whereConds[] = [
			[$filtroUser, '=', $id_usuario],
			['estancia.estado', '=', $estado_estancia],
			['mascota.eliminada', '=', 0]
		];
		if ($tipo_valoracion) {
			$whereConds[] = ['valoracion.tipo', '=', $tipo_valoracion];
		}
		$estanciasORM =
			Estancias::select(
				'estancia.*',
				'mascota.nombre as mascota_nombre',
				'mascota.tipo as mascota_tipo',
				'mascota.otro as mascota_otro',
				'mascota.id as mascota_id',
				'mascota.tamanio as mascota_tamanio',
				'mascota.raza as mascota_raza',
				'mascota.sexo as mascota_sexo',
				'mascota.esterilizado as mascota_esterilizado',
				'mascota.edad as mascota_edad',
				'mascota.descripcion as mascota_descripcion',
				'usuario_dueno.nombre as nombre_dueno',
				'usuario_dueno.telefono as telefono_dueno',
				'usuario_cuidador.nombre as nombre_cuidador',
				'usuario_cuidador.telefono as telefono_cuidador',
				'usuario_cuidador.provincia as provincia_cuidador',
				'valoracion.ya_valorado',
				'valoracion.valoracion'
			)
			->join('estancias_mascota', 'estancias_mascota.id_estancia', '=', 'estancia.id')
			->join('mascota', 'mascota.id', '=', 'estancias_mascota.id_mascota')
			->join('users as usuario_dueno', 'usuario_dueno.id', '=', 'estancia.id_usuario')
			->join('cuidador', 'cuidador.id', '=', 'estancia.id_cuidador')
			->join('users as usuario_cuidador', 'usuario_cuidador.id', '=', 'cuidador.id_usuario')
			->leftJoin('valoracion', function ($join) {
				$join->on('valoracion.id_estancia', '=', 'estancia.id')
					->on('valoracion.id_mascota', '=', 'estancias_mascota.id_mascota');
			})
			->where([$whereConds])
			//->groupBy('mascota.id')
			->get();

		$estancias = [];
		foreach ($estanciasORM as $estancia) {
			if (!isset($estancias[$estancia->id])) {
				$estancias[$estancia->id] = [];
			}
			$estancias[$estancia->id]['id'] = $estancia->id;
			//$estancias[$estancia->id]['id_user'] = $estancia->id_usuario;
			$estancias[$estancia->id]['id_cuidador'] = $estancia->id_cuidador;
			$estancias[$estancia->id]['estado'] = $estancia->estado;
			$estancias[$estancia->id]['fecha_inicio'] = $estancia->fecha_inicio;
			$estancias[$estancia->id]['fecha_fin'] = $estancia->fecha_fin;
			$estancias[$estancia->id]['nombre_dueno'] = $estancia->nombre_dueno;
			$estancias[$estancia->id]['telefono_dueno'] = $estancia->telefono_dueno;
			$estancias[$estancia->id]['nombre_cuidador'] = $estancia->nombre_cuidador;
			$estancias[$estancia->id]['telefono_cuidador'] = $estancia->telefono_cuidador;
			$estancias[$estancia->id]['provincia_cuidador'] = $estancia->provincia_cuidador;
			$estancias[$estancia->id]['precio'] = $estancia->precio;
			$estancias[$estancia->id]['observaciones'] = $estancia->observaciones;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id] = [];
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_id'] = $estancia->mascota_id;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_nombre'] = $estancia->mascota_nombre;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_tipo'] = $estancia->mascota_tipo;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_otro'] = $estancia->mascota_otro;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_tamanio'] = $estancia->mascota_tamanio;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_raza'] = $estancia->mascota_raza;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_sexo'] = $estancia->mascota_sexo;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_esterilizado'] = $estancia->mascota_esterilizado;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_descripcion'] = $estancia->mascota_descripcion;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['mascota_tipo'] = $estancia->mascota_tipo;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['ya_valorado'] = $estancia->ya_valorado;
			$estancias[$estancia->id]['mascotas'][$estancia->mascota_id]['valoracion'] = $estancia->valoracion;
		}
		return $estancias;
	}

	public function index(): View
	{
		$id_user = Auth::user()->id;
		$user_cuidador = User::where([
			'es_cuidador' => 1,
			'id' => $id_user
		])->first();
		$mascota = Mascota::where('id_usuario', $id_user)->first();
		$tiene_mascota = false;
		if ($mascota) {
			$tiene_mascota = true;
		}

		if ($user_cuidador) {
			$cuidador = Cuidador::where('id_usuario', $user_cuidador->id)->first();
		} else {
			$cuidador = false;
		}

		$estancias_pendientes_cuidador = null;
		$estancias_programadas_cuidador = null;
		$estancias_curso_cuidador = null;
		$estancias_pasadas_cuidador = null;
		$estancias_rechazadas_cuidador = null;
		$soy_cuidador = false;
		$mostrar_botones = false;
		$estados = config('app.estados_estancia');

		if ($cuidador) {
			$soy_cuidador = true;
			$estancias_pendientes_cuidador = $this->obtenerEstancias($estados['PENDIENTE'], 'cuidador', $cuidador->id);
			$estancias_programadas_cuidador = $this->obtenerEstancias($estados['ACEPTADO'], 'cuidador', $cuidador->id);
			$estancias_curso_cuidador = $this->obtenerEstancias($estados['EN_CURSO'], 'cuidador', $cuidador->id);
			$estancias_rechazadas_cuidador = $this->obtenerEstancias($estados['RECHAZADA'], 'cuidador', $cuidador->id);
			$this->recalcular_estancias($estancias_programadas_cuidador);
			$this->recalcular_estancias($estancias_curso_cuidador);
			//volvemos a obtener las estancias tras recalcular los estados
			$estancias_programadas_cuidador = $this->obtenerEstancias($estados['ACEPTADO'], 'cuidador', $cuidador->id);
			$estancias_curso_cuidador = $this->obtenerEstancias($estados['EN_CURSO'], 'cuidador', $cuidador->id);
			$estancias_pasadas_cuidador = $this->obtenerEstancias($estados['FINALIZADA'], 'cuidador', $cuidador->id, 1);
			if ($cuidador->id_user == $id_user) {
				$mostrar_botones = true;
			}
		}
		$estancias_pendientes = $this->obtenerEstancias($estados['PENDIENTE'], 'usuario', $id_user);
		$estancias_programadas = $this->obtenerEstancias($estados['ACEPTADO'], 'usuario', $id_user);
		$estancias_curso = $this->obtenerEstancias($estados['EN_CURSO'], 'usuario', $id_user);
		$estancias_rechazadas = $this->obtenerEstancias($estados['RECHAZADA'], 'usuario', $id_user);

		$this->recalcular_estancias($estancias_programadas);
		$this->recalcular_estancias($estancias_curso);

		$estancias_programadas = $this->obtenerEstancias($estados['ACEPTADO'], 'usuario', $id_user);
		$estancias_curso = $this->obtenerEstancias($estados['EN_CURSO'], 'usuario', $id_user);
		$estancias_pasadas = $this->obtenerEstancias($estados['FINALIZADA'], 'usuario', $id_user, 0);

		return view('stay/stay', compact(
			'estancias_pendientes',
			'estancias_programadas',
			'estancias_curso',
			'estancias_pasadas',
			'estancias_rechazadas',
			'estancias_pendientes_cuidador',
			'estancias_programadas_cuidador',
			'estancias_curso_cuidador',
			'estancias_pasadas_cuidador',
			'estancias_rechazadas_cuidador',
			'soy_cuidador',
			'tiene_mascota'
		));
	}

	public function recalcular_estancias($estancias)
	{
		foreach ($estancias as $estancia) {
			$fecha_hoy = date("Y-m-d");
			if ($estancia['estado'] == 1 && $fecha_hoy >= $estancia['fecha_inicio']) {
				$estancia = Estancias::find($estancia['id']);
				$estancia->estado = 2;
				$estancia->save();
			} elseif ($estancia['estado'] == 2 && $fecha_hoy > $estancia['fecha_fin']) {
				$estancia = Estancias::find($estancia['id']);
				$estancia->estado = 3;
				$estancia->save();
			}
		}
	}

	public function rate_stay($id_estancia, $id_mascota, $id_cuidador, $tipo_valoracion, $valoracion)
	{
		$id_user = Auth::user()->id;
		$estancia = Estancias::find($id_estancia);
		$cuidador = Cuidador::where('id_usuario', $id_user)->first();
		if ($estancia->id_usuario == $id_user || $estancia->id_cuidador == $cuidador->id) {
			$mensaje = "Mascota valorada correctamente";
			$valorar = Valoracion::create([
				'id_usuario' => $id_user,
				'id_mascota' => $id_mascota,
				'id_cuidador' => $id_cuidador,
				'id_estancia' => $id_estancia,
				'tipo' => $tipo_valoracion,
				'valoracion' => $valoracion,
				'ya_valorado' => true,
			]);
			if ($tipo_valoracion == 0) {
				$mensaje = "Cuidador valorado correctamente";
			}
			//limpiar url 
			return redirect()->route('stay.index')->with('success', $mensaje);
		} else {
			return redirect()->route('stay.index')->with('error', 'No te cueles!');
		}
	}

	public function manage_stay($id_estancia, $number)
	{
		$id_user = Auth::user()->id;
		$estancia = Estancias::find($id_estancia);
		$cuidador = Cuidador::where('id_usuario', $id_user)->first();
		if ($estancia->id_usuario == $id_user || $estancia->id_cuidador == $cuidador->id) {
			$mensaje = "Petición cancelada correctamente";
			$estancia->estado = ($number == 1) ? 1 : 4;
			$estancia->save();
			if ($number == 1) {
				$mensaje = "Petición aceptada correctamente";
			}
			return redirect()->route('stay.index')->with('success', $mensaje);
		} else {
			return redirect()->route('stay.index')->with('error', 'No te pases de listo, evaristo');
		}
	}

	public function create(Request $request)
	{
		$estados = config('app.estados_estancia');
		$mascotas = explode(',', $request->id_mascotas);
		$estancia = Estancias::create([
			'id_usuario' => $request->id_solicitante,
			'id_cuidador' => $request->id_cuidador,
			'precio' => $request->precio_total,
			'fecha_inicio' => $request->fecha_inicio,
			'fecha_fin' => $request->fecha_fin,
			'estado' => $estados['PENDIENTE'],
			'observaciones' => $request->observaciones,
		]);
		foreach ($mascotas as $mascota) {
			$estancia_mascota = Estancia_mascota::create([
				'id_estancia' => $estancia->id,
				'id_mascota' => $mascota,
			]);
		}
		return redirect()->route('stay.index')->with('success', 'Solicitud enviada correctamente');
	}
}
