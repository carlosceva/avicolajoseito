<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $primaryKey = 'idpedido';
    public $timestamps = true;

    protected $fillable = [
        'idcliente',
        'iduser',
        'estado',
        'observacion',
    ];

    public function detalles()
    {
        return $this->hasMany(Detalle::class, 'idpedido');
    }
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

}
