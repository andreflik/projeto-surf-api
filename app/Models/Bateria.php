<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bateria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bateria';

    protected $fillable = [
        'surfista',
    ];

    public function surfista()
    {
        return $this->belongsTo(Surfista::class, 'surfista', 'numero');
    }

}
