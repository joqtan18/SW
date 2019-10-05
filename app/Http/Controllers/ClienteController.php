<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportPdf()
    {
        $cliente = cliente::get();
        $pdf     =  PDF::loadview('pdf.cliente',compact('cliente'));

        return $pdf->download('cliente-list.pdf');
    }

    public function index()
    {
        $data = DB::table('clientes')->get();
        return view('cliente.index',['clientes'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'cli_dni' => 'required|unique:clientes,cli_dni|numeric|digits:8|between:00000001,99999999',
          'cli_apellidos' => 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
          'cli_nombres' => 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
          'cli_email' => 'nullable|max:50|min:3',
          'cli_direccion' => 'nullable|min:3|max:50'
        ]);
        $data = $request->all();
        $cliente = Cliente::create($data);
        return redirect()->route('cliente.index')->with('status', 'Cliente agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('cliente.edit',['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $this->validate($request,[
                'cli_dni' => 'required|unique:clientes,cli_dni,'.$id.',cli_id|numeric|digits:8',
                'cli_apellidos' => 'required|max:50|min:3|alpha',
                'cli_nombres' => 'required|max:50|min:3|alpha',
                'cli_direccion' => 'nullable',
                'cli_email' => 'nullable'
        ]);

        $cliente->update($request->all());
        return redirect()->route('cliente.index')->with('status','Cliente modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $cliente = Cliente::destroy($id);


        return redirect()->route('cliente.index')->with('status', 'Cliente eliminado correctamente!');
    }
}
