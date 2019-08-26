<?php

namespace App\Models;

use App\Models\Processo;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    public function ListPedido()
    { }

    public function Processo()
    {
        return $this->belongsTo(Processo::class);
    }
}