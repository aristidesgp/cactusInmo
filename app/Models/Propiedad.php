<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;
    protected $fillable=['id','name', 'purposeStatus'];

    //Relacion uno a muchos inversa
    public function tarea(){
        return $this->belongsTo(Tarea::class);
    }
}
