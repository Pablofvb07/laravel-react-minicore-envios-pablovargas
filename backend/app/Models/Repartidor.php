<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Envio; // 🔥 IMPORTANTE

class Repartidor extends Model
{
    protected $table = 'repartidores';

    protected $primaryKey = 'id_repartidor';

    protected $fillable = [
        'nombre',
        'email'
    ];

    public function envios()
    {
        return $this->hasMany(
            Envio::class,
            'id_repartidor',
            'id_repartidor'
        );
    }
}