<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatedLenteRequest;
use App\Http\Requests\UpdatedLenteRequest;
use App\Models\Lente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

use function Laravel\Prompts\error;

class LentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowAllLente($per_page)
    {
        try {
            $lents =  Lente::with('Tipoluna')->paginate($per_page);
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
    public function CreateLente(CreatedLenteRequest $request)
    {
        // Crear el lente
        $lente = Lente::create($request->all());

        // Obtener el lente recién creado y cargar la relación con Tipoluna
        $lenteConTipoluna = Lente::with('Tipoluna')->find($lente->id_lentes);

        // Devolver la respuesta con el lente y su tipo de luna
        return response()->json([
            "success" => true,
            "message" => "Lente registrado",
            "data" => $lenteConTipoluna
        ]);
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
    public function updateLente(UpdatedLenteRequest $request, Lente $id_lentes)
    {
        // Actualiza el lente con los nuevos datos
        $id_lentes->update($request->all());
    
        // Recarga el modelo para obtener los valores actualizados
        $lenteActualizado = $id_lentes->fresh();
    
        // Devuelve los datos del lente actualizado
        return response()->json([
            "success" => true,
            "data" => $lenteActualizado,
            "message" => "Lente actualizado correctamente",
        ]);
    }
    
    // public function update(ActualizarProductoCotizacion $request, ProductCotizacion $id_productos_cotizacion)
    // {
    //     $id_productos_cotizacion->update($request->all());

    //     return response()->json([
    //         "success" => true,
    //         "message" => "producto cotizacion actualizado",
    //     ]);
    // }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
