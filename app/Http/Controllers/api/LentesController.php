<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatedLenteRequest;
use App\Models\Lente;
use Illuminate\Http\Request;

class LentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowAllLente($per_page)
    {
        return Lente::paginate($per_page);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function CreateLente(CreatedLenteRequest $request)
    {
        Lente::create($request->all());
        return response()->json([
            "success" => true,
            "message" => "lente registrado"
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
