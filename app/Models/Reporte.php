<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'reason',
        'reportable_id',
        'reportable_type'
    ];

    public function reportable()
    {
        return $this->morphTo();
    }
}
