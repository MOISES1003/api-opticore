<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lente extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_lentes",
        "id_empresa",
        "id_tipoLuna",
        "caracteristicas_Principal",
        "poder_dioptria",
        "stock",
        "nivel_antirreflejo",
        "polarizacion",
        "proteccion_uv",
        "indice_refraccion",
        "fotocromatica",
        "color_luna",
        "material",
        "descripcion",
        "precio",
        "id_proveedor",
        "created_at",
        "updated_at"
    ];

    //CON ESTO INDICAMOS EL NOMBRE DE LA TABLA DE LA BASE DE DATOS QUE TENEMOS CREADA
    protected $table = 'lentes';

    //al trabajar con token ponemos esto para decir que así se llama el campo id de nuestra tabla
    //lo mismo hacemos cuando usamos request
    protected $primaryKey = 'id_lentes';


    //insertar dentro de la lista los campos a ocultar
    protected $hidden = [
        // "contrasena",
    ];


    //decimos que no estamos utilizando fechas en nuestra tabla, ponemos en false para que al momeento de actualizar no
    //sea necesario esos campos
    // public $timestamps = false;
    public function Tipoluna()
    {
        return $this->hasOne(TipoLuna::class, 'id_tipoLuna', 'id_tipoLuna');
    }
}
