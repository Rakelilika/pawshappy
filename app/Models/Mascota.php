<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
	use HasFactory;

	protected $table = "mascota";
	
	public function estancias()
	{
		return $this->belongsToMany(Estancia::class, 'estancia_mascota', 'id_mascota', 'id_estancia');
	}
}
