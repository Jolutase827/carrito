<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            'auth:api'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carrito = Carrito::get()->where('usuario_id',$request->usuario_id);
        return response()->json($carrito);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrito = new Carrito();
        $carrito->cantidad = $request->cantidad;
        $carrito->precio =  $request->precio;
        $carrito->producto_id = $request->producto_id;
        $carrito->usuario_id = $request->usuario_id;
        $carrito->save();
        return response()->json(['mensaje' => 'Insertando'], 201);
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
        return response()->json(['mensaje' => 'Actualizando elemento']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->id_usuario){

        }else{

        }
        return response()->json(null,204);

    }
}
