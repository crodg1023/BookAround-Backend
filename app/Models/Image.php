<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function cliente() {
        return $this->belongsTo(Client::class);
    }

    public function comercio() {
        return $this->belongsTo(Comercio::class);
    }
}
