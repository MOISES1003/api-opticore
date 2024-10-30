<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Monturas;
use Illuminate\Http\Request;

class MonturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowAllMonturas($per_page , $id_empresa)
    {
        try {
            $lents =  Monturas::where("id_empresa",$id_empresa)->paginate($per_page);
            // $lents['success'] = true; // esto de aqui sirve para gregar una nueva variable pero dentro de la data 
            //    return $lents->toArray() + ['success' => true]; // y esto lo agregara dentro de la respuesta del array 
            return $lents;
        } catch (\Exception $e) {
            // el log sirver para registrar elerror en los archivos log
            // Log::error('error al mostrar los lentes: '.$e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener los datos.',
                'error' => $e->getMessage() // Puedes personalizar qué información del error mostrar
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
