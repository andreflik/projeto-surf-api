<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'nota';

    protected $fillable = [
        'onda',
        'nota1',
        'nota2',
        'nota3',
        'total',
    ];

    public function onda()
    {
        return $this->belongsTo(Onda::class, 'onda', 'id');
    }
}

