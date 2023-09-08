<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estancia_mascota extends Model
{
	use HasFactory;

	protected $table = "estancias_mascota";

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'id_mascota',
		'id_estancia'
	];
	
}