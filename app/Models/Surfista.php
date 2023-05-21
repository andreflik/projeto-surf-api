<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surfista extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surfista';
    protected $primaryKey = 'numero';

    protected $fillable = [
        'numero',
        'nome',
        'pais'
    ];
    protected $dates = ['deleted_at'];

}
