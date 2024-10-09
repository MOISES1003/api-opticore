<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TipoLuna;
use Illuminate\Http\Request;

class TipoLunaController extends Controller
{
    public function ShowAllTipoLuna()
    {
        try {
            $TipoLuna =  TipoLuna::all();

            return $TipoLuna;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener los datos.',
                'error' => $e->getMessage() // Puedes personalizar qué información del error mostrar
            ], 500);
        }
    }

}
