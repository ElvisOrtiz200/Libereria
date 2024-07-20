<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desecho_Recurso extends Model
{
    use HasFactory;

    protected $table = 'desecho_recurso';
    protected $primaryKey = 'idRecuDesecho';
    public $timestamps = false;
    protected $fillable = [
        'idRecurso',
        'descripcion',
        'fecha',
        'estado'
    ];
}
