<?php

namespace App\Http\Controllers;

use App\Sucursales;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursales::all();
        return view('modulos/sucursales')->with('sucursales', $sucursales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.crear-sucursales');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->validate([
            'nombre'        => ['required', 'string', 'max:255'],
            'direccion'     => ['required', 'string', 'max:255'],
            'observaciones' => ['string', 'max:255'],
        ]);

        Sucursales::create([
            'nombre'        => $datos['nombre'],
            'direccion'     => $datos['direccion'],
            'observaciones' => $datos["observaciones"]            
        ]);
        Alert::success('Consideralo Hecho', 'Sucursal registrada');
        return redirect('sucursales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sucursales  $sucursales
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursales $sucursales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sucursales  $sucursales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursales $sucursales)
    {
        return view('modulos.editar-sucursal', compact('sucursales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sucursales  $sucursales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sucursales $sucursales)
    {
        
        $datos = request();

        $sucursales->nombre        = $datos['nombre'];
        $sucursales->direccion     = $datos['direccion'];
        $sucursales->observaciones = $datos['observaciones'];

        $sucursales->save();
        return redirect('sucursales');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sucursales  $sucursales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sucursales::destroy($id);
        Alert::success('Eliminado', 'Sucursal eliminada satisfactoriamente');
        return redirect('sucursales');
    }
}
