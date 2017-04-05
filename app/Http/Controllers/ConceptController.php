<?php

namespace GotoPeru\Http\Controllers;

use GotoPeru\OrdenModelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concept = OrdenModelo::get();
        return view('concepts',['concept'=>$concept]);
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
        $concept = OrdenModelo::get()->where('observacion', $request->get('observacion_txt'));
        if (count($concept) > 0){
            return redirect()->route('admin_concepts_index_path')->with('error','El concepto '.$request->get('observacion_txt').': '.$request->get('observacion_txt').' ya existe.');
        }else{
            $concepts = new OrdenModelo();
            $concepts->nombre = $request->get('titulo_txt');
            $concepts->observacion = $request->get('observacion_txt');
            $concepts->precio = $request->get('price_txt');
            $concepts->save();

            return redirect()->route('admin_concepts_index_path')->with('success','El concepto '.$request->get('observacion_txt').': '.$request->get('observacion_txt').' se agrego satisfactoriamente.');
        }
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
        //
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
        $concepto = OrdenModelo::findOrFail($id);

        if (count($concepto) > 0){
            $concepts = OrdenModelo::findOrFail($id);
            $concepts->nombre = $request->get('titulo_txt');
            $concepts->observacion = $request->get('observacion_txt');
            $concepts->precio = $request->get('price_txt');
            $concepts->save();
            return redirect()->route('admin_concepts_index_path')->with('success','El concepto '.$request->get('observacion_txt').': '.$request->get('observacion_txt').' se actualizo satisfactoriamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concepto = OrdenModelo::findOrFail($id);
        $concepto->delete();

        Session::flash('error', $concepto->nombre.' - '.$concepto->observacion.': Fue eliminado satisfactoriamente');

        return redirect()->route('admin_concepts_index_path');
    }
}
