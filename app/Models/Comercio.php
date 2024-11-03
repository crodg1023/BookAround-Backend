<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    use HasFactory;

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function citas() {
        return $this->hasMany(Cita::class);
    }

    public function categorias() {
        return $this->belongsToMany(Categoria::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }
}
