<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Repartidor;
use App\Models\Zona;

class Envio extends Model
{
    protected $table = 'envios';

    protected $primaryKey = 'id_envio';

    protected $fillable = [
        'id_repartidor',
        'id_zona',
        'peso_kg',
        'fecha_envio'
    ];

    public function repartidor()
    {
        return $this->belongsTo(
            Repartidor::class,
            'id_repartidor',
            'id_repartidor'
        );
    }

    public function zona()
    {
        return $this->belongsTo(
            Zona::class,
            'id_zona',
            'id_zona'
        );
    }
}