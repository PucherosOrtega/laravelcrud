<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Producto extends Model
{
    protected $primarykey = "idProducto";
    public function venta():HasOne{
        return $this->hasOne(Venta::class);
    }
    use HasFactory;
}
