<?php

namespace GotoPeru\Http\Controllers;


use Faker\Provider\DateTime;
use GotoPeru\Cliente;
use GotoPeru\ClienteCotizacion;
use GotoPeru\Cotizacion;
use GotoPeru\DestinoCotizacion;
use GotoPeru\DestinoPaqueteCotizacion;
use GotoPeru\ItinerarioCotizacion;
use GotoPeru\ItinerarioOrden;
use GotoPeru\OrdenModelo;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PDestino;
use GotoPeru\PrecioPaquete;
use GotoPeru\DestinoModelo;
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
        return view('cotizacion');
    }
    public function cotizacion()
    {
        $estadoMensaje=1;
        $mensaje='';
        return view('cotizacion',['cotizacion_id'=>'0','cliente'=>'','estadoMensaje'=>$estadoMensaje,'mensaje'=>$mensaje]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardar_pre_cotizacion(Request $request)
    {
        $email=$request->input('email3');
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
//                $cotizacion->clientes_id=$cliente[0]->id;
                $cotizacion->users_id=auth()->guard('admin')->user()->id;
                $cotizacion->save();
                $clienteCotizacion=new ClienteCotizacion();
                $clienteCotizacion->cotizaciones_id=$cotizacion->id;
                $clienteCotizacion->clientes_id=$cliente[0]->id;
                $clienteCotizacion->estado='1';
                $clienteCotizacion->save();
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
    public function guardar_cotizacion_paso1(Request $request)
    {
        $email=$request->input('email3');
        $nropasa=$request->input('nropasajeros');
//        $fecha=date_create($request->input('fecha'));
//        $fecha=date_format($fecha,'Y-m-d');
        $fecha= new \DateTime($request->input('fecha'));
        $fecha_nombre= $request->input('fecha');
        $fecha=$fecha->format('Y-m-d');
        try{
            $cliente = Cliente::where('email',$email)->get();
            //dd($cliente);
            if(count($cliente)>0){
                $cotizacion=new Cotizacion();
                $cotizacion->nropersonas=$nropasa;
                $cotizacion->fecha=$fecha;
                $cotizacion->estado="6";
                $cotizacion->users_id=auth()->guard('admin')->user()->id;
                $cotizacion->save();
                $clienteCotizacion=new ClienteCotizacion();
                $clienteCotizacion->cotizaciones_id=$cotizacion->id;
                $clienteCotizacion->clientes_id=$cliente[0]->id;
                $clienteCotizacion->estado='1';
                $clienteCotizacion->save();
                $estadoMensaje=1;
                $mensaje='';
                return view('configurar_paquete',['cotizacion_id'=>$cotizacion->id,'nropasajeros'=>$nropasa,'fecha'=>$fecha,'fecha_nombre'=>$fecha_nombre,'cliente'=>$cliente,'estadoMensaje'=>$estadoMensaje,'mensaje'=>$mensaje]);
            }
            else{
                $estadoMensaje=0;
                $mensaje='No existe el pasajero';
                return view('cotizacion',['estadoMensaje'=>$estadoMensaje,'mensaje'=>$mensaje]);
            }
        }
        catch(Exception $e){
            $estadoMensaje=-1;
            $mensaje=$e;
            return view('cotizacion',['estadoMensaje'=>$estadoMensaje,'mensaje'=>$mensaje]);
        }
    }

    public function guardar_cotizacion_paso2(Request $request){
//        $file = $request->file('imagen');
//        dd($file);
//        $path = $file->getClientOriginalName();
        $path ='';
        $paquete_id=$request->input('paquete_id');
        $codigo_plan=$request->input('codigo_txt');
        $titulo_plan=$request->input('titulo_txt');
        $dias_plan=$request->input('duracion_txt');
        $descr=$request->input('descipcion_txt');
        $precio_plan='0.00';

        $incluye=$request->input('incluye_txt');
        $noincluye=$request->input('noincluye_txt');
        $opcional=$request->input('opcional_txt');
        $destino=$request->input('destino');

//        dd($destino);
        $paqueteCotizacion = PaqueteCotizacion::FindOrFail($paquete_id);
        $paqueteCotizacion->codigo = $codigo_plan;
        $paqueteCotizacion->titulo = $titulo_plan;
        $paqueteCotizacion->duracion = $dias_plan;
        $paqueteCotizacion->preciocosto = $precio_plan;
        $paqueteCotizacion->descripcion = $descr;
        $paqueteCotizacion->incluye= $incluye;
        $paqueteCotizacion->noincluye= $noincluye;
        $paqueteCotizacion->opcional= $opcional;
        $paqueteCotizacion->estado = '0';
        $paqueteCotizacion->imagen=$path;
        $paqueteCotizacion->save();

        if(count($destino)>0){
            $antiguos_destinos=DestinoCotizacion::where('paquete_cotizaciones_id',$paquete_id)->delete();
            foreach ( $destino as $item) {
                $buscar_destinos=PDestino::FindOrFail($item);
                $new_destino=new DestinoCotizacion();
                $new_destino->codigo=$buscar_destinos->codigo;
                $new_destino->destino=$buscar_destinos->destino;
                $new_destino->region=$buscar_destinos->region;
                $new_destino->pais=$buscar_destinos->pais;
                $new_destino->descripcion=$buscar_destinos->descripcion;
                $new_destino->imagen=$buscar_destinos->imagen;
                $new_destino->estado=$buscar_destinos->estado;
                $new_destino->paquete_cotizaciones_id=$paquete_id;
                $new_destino->save();
            }
        }
        $cotizacion_id = $request->input('cotizacion_id');
        $cliente_id = $request->input('cliente_id');
        $cliente_ = Cliente::FindOrFail($cliente_id);
        $cotizacion_ = Cotizacion::FindOrFail($cotizacion_id);

        $paquete = PaqueteCotizacion::with('precio_paquetes','destinos','itinerario_cotizaciones.ordenes')->get()->where('id',$paquete_id);
        $destinos=DestinoModelo::get();

        $ordenes1=OrdenModelo::get();

//        dd($ordenes);
        return view('configurar-itinerario',['cotizaciones'=>$cotizacion_,'cliente'=>$cliente_,'destinos'=>$destinos,'paquete'=>$paquete,'ordenes1'=>$ordenes1]);
    }
    public function guardar_plan_cotizacion(Request $request)
    {

//      $fil=$request->input->file('foto');
//      Input::file('foto')->move($destinationPath, $fileName);
        $path='';
        $idCotizacion=$request->input('idCotizacion');
        $codigo_plan=$request->input('codigo_plan');
        $titulo_plan=$request->input('titulo_plan');
        $dias_plan=$request->input('dias_plan');
        $descr=$request->input('descr');
        $precio_plan=$request->input('precio_plan');

        $incluye=$request->input('text_incluye');
        $noincluye=$request->input('text_noincluye');
        $opcional=$request->input('text_opcional');
        $destinos='';
        if(strlen($request->input('destinos'))>0)
            $destinos=explode('[]',$request->input('destinos')) ;

        $titulo_itinerario=explode('[]',$request->input('titulo_itinerario'));
        $iti_descripcion=explode('[]',$request->input('iti_descripcion'));
        $precio_itinerario=explode('[]',$request->input('precio_itinerario'));
        $pos_itinerario=$request->input('pos_itinerario');
        $ordenes=explode('*',$request->input('ordenes'));

        $fecha_paquete=$request->input('fecha_paquete');
//      strftime("%B, %d", strtotime(str_replace('-','/', $disponibilidad->fecha_disponibilidad)))
//        $fecha = date($fecha_paquete);




//        echo $destinos;
//        dd($destinos);

        $paqueteCotizacion = new PaqueteCotizacion();
        $paqueteCotizacion->codigo = $codigo_plan;
        $paqueteCotizacion->titulo = $titulo_plan;
        $paqueteCotizacion->duracion = $dias_plan;
        $paqueteCotizacion->preciocosto = $precio_plan;
        $paqueteCotizacion->descripcion = $descr;
        $paqueteCotizacion->incluye= $incluye;
        $paqueteCotizacion->noincluye= $noincluye;
        $paqueteCotizacion->opcional= $opcional;
        $paqueteCotizacion->estado = '0';
        $paqueteCotizacion->imagen=$path;
        $paqueteCotizacion->cotizaciones_id=$idCotizacion;
        $paqueteCotizacion->save();

        if(count($destinos)>0){
            foreach ( $destinos as $item) {
                $destino = new DestinoPaqueteCotizacion();
                $destino->paquete_cotizaciones_id=$paqueteCotizacion->id;
                $destino->destino_cotizaciones_id=$item;
                $destino->save();
            }
        }
        if(count($titulo_itinerario)>0){
            $i=0;
            $dia=1;
            foreach ($titulo_itinerario  as $item) {

                $itinerario = new ItinerarioCotizacion();
                $itinerario->titulo=$item;
                $itinerario->descripcion=$iti_descripcion[$i];
                $itinerario->dias=$dia;
//                $date = date($fecha_paquete);
//                $mod_date = strtotime($date."+ ".$dia." days");
//                $itinerario->fecha=date("Y-m-d",$mod_date);
                $itinerario->fecha=date("Y-m-d");
                $itinerario->precio=$precio_itinerario[$i];
                $itinerario->imagen='nono';
                $itinerario->estado=1;
                $itinerario->paquete_cotizaciones_id=$paqueteCotizacion->id;
                $itinerario->save();
                $variable='orden_nombre_'.$pos_itinerario[$i];
                $orden_nombres=$request->input($variable);
//                dd($orden_nombres);
                $orden_precio=$request->input('orden_precio_'.$variable);
//                $orden_observacion=$request->input('orden_observacion_'.$variable);
//                $j=0;
//                foreach ($ordenes[$i] as $orden) {
                    $ordenarray = explode('_', $ordenes[$i]);
                    foreach ($ordenarray as $item1) {
                        $itemarray = explode('/', $item1);
                        $orden = new ItinerarioOrden();
                        $orden->itinerario_cotizaciones_id = $itinerario->id;
                        $orden->nombre =$itemarray[0];
                        $orden->precio = $itemarray[1];
                        $orden->observacion  = $itemarray[2];
                        $orden->save();
                    }

//                }
//                $j++;
                $dia++;
                $i++;
            }
        }

        $estrellas=$request->input('estrellas');
        $room_t=$request->input('room_t');
        $room_d=$request->input('room_d');
        $room_m=$request->input('room_m');
        $room_s=$request->input('room_s');

        $precio_2_t=$request->input('precio_2_t');
        $precio_2_d=$request->input('precio_2_d');
        $precio_2_d_m=$request->input('precio_2_d_m');
        $precio_2_s=$request->input('precio_2_s');

        $precio_3_t=$request->input('precio_3_t');
        $precio_3_d=$request->input('precio_3_d');
        $precio_3_d_m=$request->input('precio_3_d_m');
        $precio_3_s=$request->input('precio_3_s');

        $precio_4_t=$request->input('precio_4_t');
        $precio_4_d=$request->input('precio_4_d');
        $precio_4_d_m=$request->input('precio_4_d_m');
        $precio_4_s=$request->input('precio_4_s');

        $precio_5_t=$request->input('precio_5_t');
        $precio_5_d=$request->input('precio_5_d');
        $precio_5_d_m=$request->input('precio_5_d_m');
        $precio_5_s=$request->input('precio_5_s');

        $precioPaquetes = new PrecioPaquete();
        $precioPaquetes->estrellas=2;
        $precioPaquetes->precio_s=$precio_2_s;
        $precioPaquetes->personas_s=$room_s;
        $precioPaquetes->precio_d=$precio_2_d;
        $precioPaquetes->personas_d=$room_d*2;
        $precioPaquetes->precio_m=$precio_2_d_m;
        $precioPaquetes->personas_m=$room_m*2;
        $precioPaquetes->precio_t=$precio_2_t;
        $precioPaquetes->personas_t=$room_t*3;
        $precioPaquetes->paquete_cotizaciones_id=$paqueteCotizacion->id;
        if($estrellas=='2')
            $precioPaquetes->estado=1;
        else
            $precioPaquetes->estado=0;
        $precioPaquetes->save();
        $precioPaquetes = new PrecioPaquete();
        $precioPaquetes->estrellas=3;
        $precioPaquetes->precio_s=$precio_3_s;
        $precioPaquetes->personas_s=$room_s;
        $precioPaquetes->precio_d=$precio_3_d;
        $precioPaquetes->personas_d=$room_d*2;
        $precioPaquetes->precio_m=$precio_3_d_m;
        $precioPaquetes->personas_m=$room_m*2;
        $precioPaquetes->precio_t=$precio_3_t;
        $precioPaquetes->personas_t=$room_t*3;
        $precioPaquetes->paquete_cotizaciones_id=$paqueteCotizacion->id;
        if($estrellas=='3')
            $precioPaquetes->estado=1;
        else
            $precioPaquetes->estado=0;
        $precioPaquetes->save();
        $precioPaquetes = new PrecioPaquete();
        $precioPaquetes->estrellas=4;
        $precioPaquetes->precio_s=$precio_4_s;
        $precioPaquetes->personas_s=$room_s;
        $precioPaquetes->precio_d=$precio_4_d;
        $precioPaquetes->personas_d=$room_d*2;
        $precioPaquetes->precio_m=$precio_4_d_m;
        $precioPaquetes->personas_m=$room_m*2;
        $precioPaquetes->precio_t=$precio_4_t;
        $precioPaquetes->personas_t=$room_t*3;
        $precioPaquetes->paquete_cotizaciones_id=$paqueteCotizacion->id;
        if($estrellas=='4')
            $precioPaquetes->estado=1;
        else
            $precioPaquetes->estado=0;
        $precioPaquetes->save();
        $precioPaquetes = new PrecioPaquete();
        $precioPaquetes->estrellas=5;
        $precioPaquetes->precio_s=$precio_5_s;
        $precioPaquetes->personas_s=$room_s;
        $precioPaquetes->precio_d=$precio_5_d;
        $precioPaquetes->personas_d=$room_d*2;
        $precioPaquetes->precio_m=$precio_5_d_m;
        $precioPaquetes->personas_m=$room_m*2;
        $precioPaquetes->precio_t=$precio_5_t;
        $precioPaquetes->personas_t=$room_t*3;
        $precioPaquetes->paquete_cotizaciones_id=$paqueteCotizacion->id;
        if($estrellas=='5')
            $precioPaquetes->estado=1;
        else
            $precioPaquetes->estado=0;
        $precioPaquetes->save();


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
                $respuesta.='<a id="send'.$planes->id.'" href="#!" class="grey-text text-darken-1" onclick="enviarPlan('.$planes->id.')"><i class="mdi-content-send small"></i></a>';
            }
            else{
            $respuesta.='<a id="send'.$planes->id.'" href="#!" class="green-text text-darken-2"  onclick="enviarPlan('.$planes->id.')"><i class="mdi-content-send small"></i></a>';
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
    public function enviar_plan_cotizacion(Request $request)
    {
        $id=$request->input('id');
        $paqueteCotizacion = PaqueteCotizacion::findOrFail($id);
        $paqueteCotizacion->estado=1;
        $paqueteCotizacion->save();
        return 1;
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

    // list cot
    public function proposals($id)
    {
        $cliente = Cliente::findOrFail($id);
        $idCliente=$cliente->id;
        $cotizaciones = Cotizacion::with(['paquete_cotizaciones','cliente_cotizaciones'=>function($query) use ($idCliente) { $query->where('clientes_id', $idCliente);}])
            ->get()
            ->sortByDesc('fecha');


        return view('admin.proposals', ['cotizaciones'=>$cotizaciones, 'cliente'=>$cliente]);
    }

    public function posibilidad(Request $request, $id)
    {
        $idcliente = $request->get('idcliente_txt');

        $cotizacion = Cotizacion::findOrFail($id);

        $cotizacion->posibilidad = $request->get('posibilidad_txt');
        $cotizacion->save();

        return redirect()->route('admin_proposals_path', $idcliente)->with('success','actualizado');
    }

    public function pdf_proposal($id)
    {
//        return view("pdf-proposal");
        $paquetes = PaqueteCotizacion::with('precio_paquetes')->get()->where('id', $id);
        foreach ($paquetes as $paquetes2){
            $paquete = PaqueteCotizacion::with('precio_paquetes')->get()->where('id', $id);
            $cotizacion = Cotizacion::where('id',$paquetes2->cotizaciones_id)->get();
            $pdf = \PDF::loadView('pdf-proposal', ['paquete'=>$paquete, 'cotizacion'=>$cotizacion])->setPaper('a4')->setWarnings(true);
            return $pdf->download('proposals_'.$id.'.pdf');
        }
    }
}
