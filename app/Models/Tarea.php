<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable=['name', 'descripcion', 'fecha'];
    //Relacion uno a muchos
    public function tareas(){
        return $this->hasMany(Propiedad::class);
    }
}
