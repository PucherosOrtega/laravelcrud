<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Venta;

class Vendedor extends Model
{
    protected $primaryKey = "idVendedor";
    protected $table = "vendedores";
    public function venta():HasOne{
        return $this->hasOne(Venta::class);
     }
     
    use HasFactory;
}
