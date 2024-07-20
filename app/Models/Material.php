<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table="material";
    protected $primaryKey="idMaterial";
    public $timestamps=false;
    protected $fillable=["Nombre","Cantidad","estado"];
}
