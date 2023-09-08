<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Mascota;
use App\Models\Estancia_mascota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class PetController extends Controller
{
    public function list(): View
    {
        $id_user = Auth::user()->id;
        $mascotas = Mascota::where([
            'id_usuario' => $id_user,
            'eliminada' => 0
        ])->get();
        return view('pet/pet', compact('mascotas'));    //ruta de la vista a la que vamos
    }

    public function show()
    {
        return view('pet/partials/show-pet');
    }

    public function add()
    {
        // Obtenemos tamaños y tipos de variable de config y agregamos al principio la opcion de seleccionar
        $tamanios = array('Selecciona el tamaño' => -1) + config('app.tamanios_mascotas_format');
        $tipos = array('Selecciona el tipo de mascota' => -1) + config('app.tipos_mascotas_format');
        //TODO Hacer lo mismo para el sexo tanto en controlador como en vista y JS
        
        return view('pet/partials/add-pet', compact('tamanios', 'tipos'));
    }

    public function edit(Mascota $mascota)
    {
        $id_user = Auth::user()->id;
        if ($mascota->id_usuario != $id_user) {
            return redirect()->route('pet.list')->with('error', 'No te pases de listo, evaristo');
        }
        // Obtenemos tamaños y tipos de variable de config y agregamos al principio la opcion de seleccionar
        $tamanios = array('Selecciona el tamaño' => -1) + config('app.tamanios_mascotas_format');
        $tipos = array('Selecciona el tipo de mascota' => -1) + config('app.tipos_mascotas_format');

        return view('pet/partials/edit-pet', compact('mascota', 'tamanios', 'tipos'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $request->validate(
            [
                'nombre' => ['required', 'string', 'max:255', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/', 'min:2'],
                'sexo' => ['required', Rule::in(config('app.tamanios_mascotas'))],	//reutilizamos variable tamanios ya que tiene el mismo formato
                'tipo' => ['required', Rule::in(config('app.tipos_mascotas'))],
                'otros' => ['sometimes', 'required', 'string', 'max:255', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/', 'min:2'],
                'raza' => ['required', 'string', 'max:255', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/', 'min:2'],
                'edad' => ['required', 'date', 'before:yesterday'],
                'tamanio' => ['required', Rule::in(config('app.tamanios_mascotas'))],
                'descripcion' => ['required']
            ],
            [
                'sexo' => 'Tienes que seleccionar un sexo',
                'tipo' => 'Tienes que seleccionar un tipo',
                'edad' => 'Tienes que sleccionar una fecha',
                'tamanio' => 'Tienes que seleccionar un tamaño',
                'descripcion' => '¡Describe a tu mascota!'
            ]
        );
        $mascota->nombre = $request->nombre;
        $mascota->sexo = $request->sexo;
        $mascota->tipo = $request->tipo;
        $mascota->otro = $request->otro;
        $mascota->raza = $request->raza;
        $mascota->edad = $request->edad;
        $mascota->tamanio = $request->tamanio;
        $mascota->esterilizado = (isset($request->esterilizado)) ? true : false;
        $mascota->descripcion = $request->descripcion;
        $mascota->puede_estar_solo = (isset($request->puede_estar_solo)) ? true : false;
        $mascota->save();
        $id_user = Auth::user()->id;
        $mascotas = Mascota::where([
            'id_usuario' => $id_user,
            'eliminada' => 0
        ])->get();

        return redirect()->route('pet.list', ['mascotas' => $mascotas])->with('success', 'Mascota modificada correctamente');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => ['required', 'string', 'max:255', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/', 'min:2'],
                'sexo' => ['required', Rule::in(config('app.tamanios_mascotas'))],	//reutilizamos variable tamanios ya que tiene el mismo formato
                'tipo' => ['required', Rule::in(config('app.tipos_mascotas'))],
                'otros' => ['sometimes', 'required', 'string', 'max:255', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/', 'min:2'],
                'raza' => ['required', 'string', 'max:255', 'regex:/^[A-ZÀÂÉÈÊËÎÏÔÛÙÜŸÑa-zàâçéèêëîïôûùüÿñ ]+$/', 'min:2'],
                'edad' => ['required', 'date', 'before:yesterday'],
                'tamanio' => ['required', Rule::in(config('app.tamanios_mascotas'))],
                'descripcion' => ['required']
            ],
            [
                'sexo' => 'Tienes que seleccionar un sexo',
                'tipo' => 'Tienes que seleccionar un tipo',
                'edad' => 'Tienes que sleccionar una fecha',
                'tamanio' => 'Tienes que seleccionar un tamaño',
                'descripcion' => '¡Describe a tu mascota!'
            ]
        );

        $id_user = Auth::user()->id;
        $mascota = new Mascota();
        $mascota->id_usuario = $id_user;
        $mascota->nombre = $request->nombre;
        $mascota->sexo = $request->sexo;
        $mascota->tipo = $request->tipo;
        $mascota->otro = $request->otro;
        $mascota->raza = $request->raza;
        $mascota->edad = $request->edad;
        $mascota->tamanio = $request->tamanio;
        $mascota->esterilizado = (isset($request->esterilizado)) ? true : false;
        $mascota->descripcion = $request->descripcion;
        $mascota->puede_estar_solo = (isset($request->puede_estar_solo)) ? true : false;
        $mascota->eliminada = false;
        $mascota->save();
        $mascotas = Mascota::where([
            'id_usuario' => $id_user,
            'eliminada' => 0
        ])->get();

        return redirect()->route('pet.list', ['mascotas' => $mascotas])->with('success', 'Mascota creada correctamente');
    }

    public function delete(Mascota $mascota)
    {
        //estados 0->pendiente
        //estados 1->aceptado
        //estados 2->en curso
        //estados 3->realizado
        //estados 4->rechazado
        $id_user = Auth::user()->id;
        $estado = "success";
        $mensaje = "Mascota eliminada correctamente";
        $em = Estancia_mascota::join('estancia', 'estancias_mascota.id_estancia', '=', 'estancia.id')
            ->where('estancias_mascota.id_mascota', '=', $mascota->id)
            ->whereIn('estancia.estado', [0, 1, 2])
            ->first();
        if ($em == NULL) {
            $mascota->eliminada = 1;
            $mascota->nombre = "Fantasma";
            $mascota->save();
        } else {
            $estado = "error";
            $mensaje = "La Mascota tiene estancias asociadas pendientes de gestionar/finalizar";
        }
        $mascotas = Mascota::where([
            'id_usuario' => $id_user,
            'eliminada' => 0
        ])->get();
        
        return redirect()->route('pet.list', ['mascotas' => $mascotas])->with($estado, $mensaje);
    }
}
