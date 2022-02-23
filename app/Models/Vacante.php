<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'imagen', 'descripcion', 'skills', 'categoria_id', 'experiencia_id', 'ubicacion_id', 'salario_id'
    ];

    //una vacante tiene una categoria 1:1
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //una vacante tiene un salario
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    //unsa vacante tiene una ubacion
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }

    //una vacante tiene una experiencia
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    //relacion 1:1 reclutador y vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relacion 1:n una vacantiene tiene muchos candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }

}
