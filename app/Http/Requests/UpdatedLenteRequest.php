<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedLenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id_empresa"=>"required",
            "id_tipoLuna"=>"required",
            "caracteristicas_Principal"=>"required",
            "poder_dioptria"=>"required",
            "stock"=>"required",
            "nivel_antirreflejo"=>"required",
            "polarizacion"=>"required",
            "proteccion_uv"=>"required",
            "indice_refraccion"=>"required",
            "fotocromatica"=>"required",
            "color_luna"=>"required",
            "material"=>"required",
            "descripcion"=>"required",
            "precio"=>"required",
            "id_proveedor"=>"required",
        ];
    }
}
