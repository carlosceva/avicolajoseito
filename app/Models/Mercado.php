<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mercado extends Model
{
    protected $table = 'mercados';

    protected $primaryKey = 'idmercado';
    public $timestamps = true;

    protected $fillable = [
        'nombremercado',
        'direccion',
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'idmercado');
    }
}
