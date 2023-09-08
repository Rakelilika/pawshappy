<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
	use HasFactory;

	protected $table = "valoracion";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'id_usuario',
		'id_mascota',
		'id_cuidador',
		'id_estancia',
		'tipo',
		'valoracion',
		'ya_valorado',
		//TODO eliminar campo ya_valorado
	];
	
}