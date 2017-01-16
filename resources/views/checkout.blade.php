@extends('layouts.default')

@section('content')
    <?php $i1=0;?>
    @foreach($paquetes as $paquete)
        @foreach($paquete->paquete_servicio_extra as $servicios)
            <?php $i1++;?>
        @endforeach
    @endforeach
    <?php
    $paquete1='';

    $pre_2_s=$precio;
    $pre_2_d=$precio;
    $pre_2_t=$precio;

    $pre_3_s=$precio;
    $pre_3_d=$precio;
    $pre_3_t=$precio;

    $pre_4_s=$precio;
    $pre_4_d=$precio;
    $pre_4_t=$precio;

    $pre_5_s=$precio;
    $pre_5_d=$precio;
    $pre_5_t=$precio;
    function obtenerFechaEnLetra($fecha0){
        $fecha1=explode('-',$fecha0);
        $fecha=$fecha1[2].'-'.$fecha1[1].'-'.$fecha1[0];
        $dia= conocerDiaSemanaFecha($fecha);
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return $dia.', '.$mes.' '.$num.', '.$anno;
    }

    function conocerDiaSemanaFecha($fecha) {
        $dias = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $dia = $dias[date('w', strtotime($fecha))];
        return $dia;
    }
    ?>
    @foreach($paquetes as $paquete)
        <?php
        $paquete1=$paquete;
        ?>
    @endforeach

    <div class="container">
        <div class="section">
            <div class="row center">
              hola </div>
         </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>
    <script src="https://use.fontawesome.com/1d452fa330.js"></script>
    <script type="text/javascript" src="{{URL::to('js/funciones-checkout.js')}}"></script>
@endsection
