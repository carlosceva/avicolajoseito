<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $primaryKey = 'idcliente';
    public $timestamps = true;

    protected $fillable = [
        'codcliente',
        'nombrecliente',
        'latitud',
        'longitud',
        'celular',
        'puesto',
        'observaciones',
        'estado',
        'idpromotor',
        'idmercado'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'idcliente');
    }

    public function mercado()
    {
        return $this->belongsTo(Mercado::class, 'idmercado');
    }
}
