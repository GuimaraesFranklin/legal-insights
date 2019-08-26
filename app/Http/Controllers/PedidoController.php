<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Processo;
use App\Models\TipoPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->pedido = $request->get('tipoPed');
        $pedido->valor_risco_provavel = $request->input('vlrPro');
        $pedido->status = $request->input('statusPed');
        $pedido->processo_id = DB::select('SELECT * FROM
                                processos a
                                LEFT JOIN pedidos b on b.processo_id = a.id
                                WHERE b.processo_id = ' . $pedido->processo_id);
        $pedido->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);
        $process = Processo::find($id);
        $peid = $pedido->id;
        $tped = TipoPedido::all()->pluck('pedido');
        if (isset($pedido)) {
            return view('pedido.edit', compact('pedido', 'tped', 'process', 'peid'));
        }
        return redirect('/processos/listar/' . $peid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido =  Pedido::find($id);
        //$process = dd(Processo::find($id));
        $prid = $pedido->processo_id;

        if (isset($pedido)) {
            $pedido = new Pedido();
            $pedido->pedido = $request->get('tipoPed');
            $pedido->valor_risco_provavel = $request->input('vlrPro');
            $pedido->status = $request->input('statusPed');
            $pedido->processo_id = $prid;
            $pedido->save();
        }
        return redirect('/processos/listar/' . $prid);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        if (isset($process)) {
            $pedido->delete();
        }
        return redirect('/processos');
    }
}