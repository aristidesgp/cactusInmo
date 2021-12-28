<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=['name', 'description', 'date'];
    //Relacion uno a muchos
    public function tasks(){
        return $this->hasMany(Property::class);
    }
}
