<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onda extends Model
{
    use HasFactory;

    protected $table = 'onda';

    protected $fillable = [
        'surfista',
        'bateria',
    ];

    public function surfista()
    {
        return $this->belongsTo(Surfista::class, 'surfista', 'numero');
    }

    public function bateria()
    {
        return $this->belongsTo(Bateria::class, 'bateria', 'id');
    }
}

