<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Http;
use RealRashid\SweetAlert\Facades\Alert;
use Redirect,Response;
class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sucursal_id)
    {
        // $comics = DB::select('SELECT * FROM comics JOIN inventario ON comics.id = inventario.comic_id');
        $comics = DB::table('comics')
                    ->join('inventario','comics.id','inventario.comic_id')
                    ->where('inventario.sucursal_id', '=', $sucursal_id)
                    ->select('comics.id','comics.imagen','comics.titulo','comics.volumen')
                    ->get();
        $sucursal = Sucursales::find($sucursal_id);
        return view('modulos/comics')->with('comics', $comics)
                                     ->with('sucursal', $sucursal);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sucursal_id)
    {

        $response = Http::get('http://gateway.marvel.com/v1/public/comics', [
            'apikey'  => config('constants.apiKey'),
            'ts'      => config('constants.ts'),
            'hash'    => config('constants.hash'),
            'orderBy' => 'title',
            'limit'   => '100',
        ]);
        $comics = $response->json();
        $sucursal = Sucursales::find($sucursal_id);
        
        return view('modulos/agregar-comics',compact('comics'))->with('sucursal', $sucursal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, sucursales $sucursal)
    {
        
        $comics = request()->all();
        foreach($comics['idComic'] as $comic){
            
            $registro=explode('@', $comic);
            Comic::firstOrCreate(
                [  
                    'id' => $registro[0]                    
                ],
                [
                    'imagen'  => $registro[1],
                    'titulo'  => $registro[2],
                    'volumen' => $registro[3]
                ]);
            DB::table('inventario')->insertOrIgnore([
                'sucursal_id' => $sucursal['id'],
                'comic_id'    => $registro[0],
            ]);
        }
        Alert::success('Hecho', 'Comics Agregados');
        return redirect('ver-comics/'.$sucursal['id']);
        // return view('modulos/comics')->with('comics', $comics)
        //                              ->with('sucursal', $sucursal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show($comic_id)
    {
        $response = Http::get('http://gateway.marvel.com/v1/public/comics/'.$comic_id, [
            'apikey'  => config('constants.apiKey'),
            'ts'      => config('constants.ts'),
            'hash'    => config('constants.hash'),
            'comicId' => $comic_id,
        ]);
        $comic = $response->json();

        $response2 = Http::get('http://gateway.marvel.com/v1/public/comics/'.$comic_id.'/characters', [
            'apikey'  => config('constants.apiKey'),
            'ts'      => config('constants.ts'),
            'hash'    => config('constants.hash'),
            'comicId' => $comic_id,
        ]);
        $personajes = $response2->json();

        $sucursales = DB::table('sucursales')
                    ->join('inventario','sucursales.id','inventario.sucursal_id')
                    ->where('inventario.comic_id', '=', $comic_id)
                    ->select('sucursales.nombre')
                    ->get();
        return view('modulos/detalle-comic',compact('comic','personajes'))
                    ->with('sucursales', $sucursales);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy($comic_id,$sucursal_id)
    {
        DB::table('inventario')
            ->where('comic_id',     '=', $comic_id)
            ->where('sucursal_id',  '=', $sucursal_id)
            ->delete();
        return redirect('ver-comics/'.$sucursal_id);
    }
}
