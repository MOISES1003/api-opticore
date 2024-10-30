<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monturas extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_montura",
        "id_empresa",  
        "serie",
        "codigo",
        "stock"
    ];

    //CON ESTO INDICAMOS EL NOMBRE DE LA TABLA DE LA BASE DE DATOS QUE TENEMOS CREADA
    protected $table = 'monturas';

    //al trabajar con token ponemos esto para decir que así se llama el campo id de nuestra tabla
    //lo mismo hacemos cuando usamos request
    protected $primaryKey = 'id_montura';

    public $timestamps = false;
    //insertar dentro de la lista los campos a ocultar
    protected $hidden = [
        // "contrasena",
    ];

}
