<?php

namespace GotoPeru\Http\Controllers;


use GotoPeru\Cliente;
use GotoPeru\Cotizacion;
use GotoPeru\PaqueteCotizacion;
use GotoPeru\PrecioPaquete;
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

//        $destinationPath ='/img/tmp';
//        $foto=$request->file('foto');
//        $path = $foto->getClientOriginalName();
//        $ext = $foto->getClientOriginalExtension();
//        $upload_success = $foto->move($destinationPath,"archivito");
        $path ='';
//        $fil=$request->input->file('foto');
////        Input::file('foto')->move($destinationPath, $fileName);
//        $nombre_archivo = $_FILES['foto']['name'];
//        $tipo_archivo = $_FILES['foto']['type'];
//        $tamano_archivo = $_FILES['foto']['size'];
//        $tmp_archivo = $_FILES['foto']['tmp_name'];
//        $archivador = $upload_folder . '/' . $nombre_archivo;
//        move_uploaded_file($tmp_archivo, $archivador);

        $idCotizacion=$request->input('idCotizacion');
        $codigo_plan=$request->input('codigo_plan');
        $titulo_plan=$request->input('titulo_plan');
        $dias_plan=$request->input('dias_plan');
        $descr=$request->input('descr');
        $precio_plan=$request->input('precio_plan');

        $incluye=$request->input('text_incluye');
        $noincluye=$request->input('text_noincluye');
        $opcional=$request->input('text_opcional');
//        $incluye='';
//        $noincluye='';
//        $opcional='';


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
}
