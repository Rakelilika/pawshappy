<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estancias extends Model
{
	use HasFactory;

	protected $table = "estancia";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'id_mascota',
		'id_usuario',
		'id_cuidador',
		'precio',
		'fecha_inicio',
		'fecha_fin',
		'estado',
		'observaciones'
	];
	public function mascotas()
	{
		return $this->belongsToMany(Mascota::class, 'estancia_mascota', 'id_estancia', 'id_mascota');
	}
}