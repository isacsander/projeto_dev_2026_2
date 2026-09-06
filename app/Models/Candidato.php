<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = [
        'nome', 'email', 'cpf', 'telefone', 'cargo_id', 'data_teste_aptidao', 'status'
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
