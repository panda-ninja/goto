<?php

namespace GotoPeru\Http\Controllers;


use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\PaqueteCotizacion;
use Illuminate\Http\Request;
//use Symfony\Component\HttpKernel\Client;

class CotizacionController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function nuevacotizacion()
    {
        return view('nuevacotizacion');
    }
    public function cotizacion()
    {
        return view('cotizacion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar_pre_cotizacion(Request $request)
    {
        $email=$request->input('email');
        $nropasa=$request->input('nropasajeros');
        $fecha=$request->input('fecha');
//     return $email.'/'.$nropasa.'/'.$fecha;
//        dd($request);
        try{
            $cliente = Cliente::where('email',$email)->get();
            //dd($cliente);
            if(count($cliente)>0){

//                return $cliente[0]->nombres;
                $cotizacion=new Cotizacion();
                $cotizacion->nropersonas=$nropasa;
                $cotizacion->fecha=$fecha;
                $cotizacion->estado="6";/*-- 6=pre cotizacion*/
                $cotizacion->clientes_id=$cliente[0]->id;
                $cotizacion->users_id=auth()->guard('admin')->user()->id;
                $cotizacion->save();
                return $cotizacion->id;
            }
            else{
                return '0';
            }
//           return  $cliente->id;
//            return count($cliente);
        }
        catch(Exception $e){
            return $e;
        }
    }
    public function guardar_plan_cotizacion(Request $request)
    {


        $idCotizacion=$request->input('idCotizacion');
        $codigo_plan=$request->input('codigo_plan');
        $titulo_plan=$request->input('titulo_plan');
        $dias_plan=$request->input('dias_plan');
        $descr=$request->input('descr');
        $precio_plan=$request->input('precio_plan');

        $paqueteCotizacion = new PaqueteCotizacion();
        $paqueteCotizacion->codigo = $codigo_plan;
        $paqueteCotizacion->titulo = $titulo_plan;
        $paqueteCotizacion->duracion = $dias_plan;
        $paqueteCotizacion->preciocosto = $precio_plan;
        $paqueteCotizacion->descripcion = $descr;
        $paqueteCotizacion->estado = '0';
        $paqueteCotizacion->cotizaciones_id=$idCotizacion;
        $paqueteCotizacion->save();
        $cotizacion = Cotizacion::findOrFail($idCotizacion);
        $lista_planes = PaqueteCotizacion::where('cotizaciones_id',$idCotizacion)->get();
        $respuesta='<table class="striped">
                                <thead>
                                <tr>
                                    <th data-field="id">Codigo</th>
                                    <th data-field="name">Titulo</th>
                                    <th data-field="number">Dias</th>
                                    <th data-field="number">Nro persona</th>
                                    <th data-field="number">Precio</th>
                                    <th data-field="date">Fecha</th>
                                    <th data-field="name">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>';
        foreach ($lista_planes as $planes){
            $respuesta.='<tr>
                            <td>'.$planes->codigo.'</td>
                            <td>'.$planes->titulo.'</td>
                            <td>'.$planes->duracion.'</td>
                            <td>'.$cotizacion->nropersonas.'</td>
                            <td>'.$planes->preciocosto.'</td>
                            <td>'.$cotizacion->fecha.'</td>
                            <td class="">
                                <a href="#!"><i class="mdi-content-create small"></i></a>
                                <a href="#!" class="red-text text-darken-2"><i class="mdi-action-delete small"></i></a>';

            if($planes->estado==1){
                $respuesta.='<a href="#!" class="grey-text text-darken-1"><i class="mdi-content-send small"></i></a>';
            }
            else{
            $respuesta.='<a href="#!" class="green-text text-darken-2"><i class="mdi-content-send small"></i></a>';
            }
            $respuesta.='</td>
                        </tr>
                        ';
        }
        $respuesta.='</tbody>
                            </table>';
        return $respuesta;
//        $valor=explode('[]',$request->input('valor'));
//        $descripcion='';
//        for($i=0;$i<count($valor);$i++){
//            $descripcion.=$valor[$i].'()';
//        }
//        return $request->input('valor');

    }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
