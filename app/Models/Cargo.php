<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['cargo', 'ativo'];

    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
