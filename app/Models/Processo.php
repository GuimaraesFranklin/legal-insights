<?php

namespace App\Models;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Processo extends Model
{
    protected $fillable = ['numero_unico_processo', 'data_distribuicao', 'reu_principal', 'valor_causa', 'vara', 'comarca', 'uf'];

    protected $casts = [
        'data_distribuicao'  => 'date:d-m-Y',
    ];

    public function Pedido()
    {
        return $this->HasMany(Pedido::class);
    }
}