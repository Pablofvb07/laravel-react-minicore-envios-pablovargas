<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $primaryKey = 'id_zona';

    protected $fillable = [
        'nombre_zona',
        'tarifa_por_kg'
    ];

    public function envios()
    {
        return $this->hasMany(
            Envio::class,
            'id_zona',
            'id_zona'
        );
    }
}
