<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venta extends Model
{
    use HasFactory;
    protected $primaryKey = "idVenta";
    protected $fillable = [
        'fechaVenta',
        'cantidadVenta',
        'movimientoVenta',
        'cantidadTotalVenta',
        'idVendedorVenta_id',
        'idCategoriaVenta_id',
        'idClienteVenta_id',
        'idProductoVenta_id'
    ];

    public function categoria():BelongsTo{
        return $this->belongsTo(Categoria::class,'idCategoriaVenta_id','idCategoria');
    }
    public function vendedor():BelongsTo{
        return $this->belongsTo(Vendedor::class,'idVendedorVenta_id','idVendedor');
    }
    public function producto():BelongsTo{
        return $this->belongsTo(Producto::class,'idProductoVenta_id','idProducto');
    }

}
