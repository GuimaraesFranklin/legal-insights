<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Pedido;
use App\Models\Processo;
use App\Models\TipoPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $process = Processo::all();
        return view('processo.index', compact('process'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::all()->pluck('uf');
        $tped = TipoPedido::all()->pluck('pedido');
        return view('processo.create', compact('estado', 'tped'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $process = new Processo();
        $process->numero_unico_processo = $request->input('nuProcess');
        $process->data_distribuicao = $request->input('dataDist');
        $process->reu_principal = $request->input('reuPrin');
        $process->valor_causa = $request->input('valCausa');
        $process->vara = $request->input('vara');
        $process->comarca = $request->input('comarca');
        $process->uf = $request->input('uf');
        $process->save();
        $process_id = $process->id;

        $pedido = new Pedido();
        $pedido->pedido = $request->get('tipoPed');
        $pedido->valor_risco_provavel = $request->input('vlrPro');
        $pedido->status = $request->input('statusPed');
        $pedido->processo_id = $process_id;
        $pedido->save();

        return redirect('/processos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $process = Processo::find($id);
        $estado = Estado::all()->pluck('uf');
        $pedidos = DB::select('SELECT * FROM
                                processos a
                                LEFT JOIN pedidos b on b.processo_id = a.id
                                WHERE b.processo_id = ' . $process->id);
        //$pedidos = Pedido::all()->pluck('id');
        return view('processo.list', compact('process', 'estado', 'pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $process = Processo::find($id);
        $estado = Estado::all()->pluck('uf');
        if (isset($process)) {
            return view('processo.edit', compact('process', 'estado'));
        }
        return redirect('/processos');
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
        $process = Processo::find($id);
        if (isset($process)) {
            $process->numero_unico_processo = $request->input('nuProcess');
            $process->data_distribuicao = $request->input('dataDist');
            $process->reu_principal = $request->input('reuPrin');
            $process->valor_causa = $request->input('valCausa');
            $process->vara = $request->input('vara');
            $process->comarca = $request->input('comarca');
            $process->uf = $request->input('uf');
            $process->save();
        }
        return redirect('/processos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $process = Processo::find($id);
        if (isset($process)) {
            $process->delete();
        }
        return redirect('/processos');
    }
}