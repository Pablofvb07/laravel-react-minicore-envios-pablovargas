<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Envio;

class ReporteController extends Controller
{
    public function calcular(Request $request)
    {
        $inicio = $request->fecha_inicio;
        $fin = $request->fecha_fin;

        $envios = Envio::with(['repartidor', 'zona'])
            ->whereBetween('fecha_envio', [$inicio, $fin])
            ->get();

        $resultado = [];

        foreach ($envios as $envio) {

            $id = $envio->id_repartidor;

            if (!isset($resultado[$id])) {

                $resultado[$id] = [
                    'repartidor' => $envio->repartidor->nombre,
                    'envios' => 0,
                    'total_kg' => 0,
                    'costo_total' => 0,
                ];
            }

            $resultado[$id]['envios']++;
            $resultado[$id]['total_kg'] += $envio->peso_kg;

            $resultado[$id]['costo_total'] +=
                $envio->peso_kg * $envio->zona->tarifa_por_kg;
        }

        return response()->json(array_values($resultado));
    }
}