<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportPdf()
    {
        $producto = producto::get();
        $pdf  =  PDF::loadview('pdf.producto',compact('producto'));
        return $pdf->download('producto-list.pdf');
    }


    public function index()
    {
        $data = DB::table('productos')
                    ->join ('categorias','categorias.cat_id','productos.cat_id')
                    ->get();
        return view('producto.index',['productos'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('categorias')->get();
        return view('producto.create',['categorias'=>$categorias]);
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
        'prod_nombre' => 'required|min:3|max:50',
        'prod_slug' => 'required|min:3|max:50' ,
        'prod_descripcion' => 'required|min:3|max:50' ,
        'prod_extract' => 'required|min:3|max:50' ,
        'prod_precio' => 'required|numeric',
        'prod_stock' => 'required|numeric'
      ]);
      $data = $request->all();
      $prod = Producto::create($data);
      return redirect()->route('producto.index')->with('status', 'Producto agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = DB::table('categorias')
                    ->get();
        return view('producto.edit',['producto'=>$producto,'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Producto::find($id);
        $this->validate($request,[
            'prod_nombre' => 'required',
            'prod_slug' => 'required|max:50' ,
            'prod_descripcion' => 'required|max:50' ,
            'prod_extract' => 'required|max:50' ,
            'prod_precio' => 'required|numeric',
            'prod_stock' => 'required|numeric'
        ]);
        $request->all();
        $prod->update($request->all());
        return redirect()->route('producto.index')->with('status', 'Producto editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $request, $id)
    {
        $producto = Producto::destroy($id);
        return redirect()->route('producto.index')->with('status', 'Producto eliminado correctamente!');
    }

    public function visibilidad($id)
    {
        $producto = Producto::find($id);
        if($producto->prod_visible == 0){
            $producto->prod_visible = 1;
            $producto->save();
        } else{
            $producto->prod_visible = 0;
            $producto->save();
        }
        return redirect()->route('producto.index')->with('status', 'Producto actualizado correctamente!');
    }

}
