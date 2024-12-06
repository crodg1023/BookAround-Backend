<?php

namespace App\Models;

use App\Events\CitaCreada;
use App\Events\CitaAplazada;
use App\Events\CitaCancelada;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => CitaCreada::class,
        'updated' => CitaAplazada::class,
        'deleted' => CitaCancelada::class
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
    public function comercio() {
        return $this->belongsTo(Comercio::class);
    }
}
