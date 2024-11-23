<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
    public function comercio() {
        return $this->belongsTo(Comercio::class);
    }

    public function reportes()
    {
        return $this->morphMany(Reporte::class, 'reportable');
    }
}
