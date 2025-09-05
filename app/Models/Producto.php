<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo';
    public $incrementing = false; // porque codigo no es auto_increment
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'cantidad',
        'precio',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'producto_id', 'codigo');
    }
}
