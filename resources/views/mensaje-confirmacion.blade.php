@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="section">
            <div class="row center">
                @if($estado=='1')
                <div class="col s12">
                    <div id="charge-success" name="charge-success" class="success-box card-panel green lighten-5  green-text text-darken-4 ">
                        Your pay was succesfull <br>We send the purchase details to your mail. <i class="material-icons">done_all</i>
                    </div>
                    <!--<span class="payment-errors"></span>-->
                </div>
                @elseif($estado=='0')
                <div class="col s12">
                    <div id="charge-error" class="error-box card-panel red lighten-5  red-text text-darken-4 ">
                        Ups! Something went wrong, try again. <i class="material-icons">error</i>
                    </div>
                    <a href="{{route('home_path')}}" class="waves-effect waves-light btn">Try again</a>
                    <!--<span class="payment-errors"></span>-->
                </div>
                @endif
            </div>
        </div>
        <div class="section">
            <div class="row center">
                <h1 class="yellow-text text-darken-4 no-margin text-50"><b>{{$titulo_p}}</b></h1>
                <p class="font-moserrat center text-20 no-margin grey-text ">{{$nrodias_p}} DAYS | {{$date_travel}}</p>
            </div>
        </div>
        <div class="section">
           <div class="row center">
                <div class="col m4 offset-m4">
                    <div class="row center">
                        <div class="col s12 caja-flotante grey lighten-2">
                            <ul>
                                <?php
                                $precio=0;
                                ?>
                                @if($nro_ontriple_p!=0)
                                    <?php $precio+=($nro_ontriple_p*$precio_ontriple_p); ?>
                                    <li id="acomodacion_3" class=" grey-text text-darken-1"><span>On triple accomodation </span><span id="rooms_T">{{$nro_ontriple_p}}</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_3">{{$precio_ontriple_p}}</span></li>
                                @endif
                                @if($nro_ondouble_p!=0)
                                        <?php $precio+=($nro_ondouble_p*$precio_ondouble_p); ?>
                                        <li id="acomodacion_2" class="grey-text text-darken-1"><span>On double accomodation </span><span id="rooms_D">{{$nro_ondouble_p}}</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_Ma2">{{$precio_ondouble_p}}</span></li>
                                @endif
                                @if($nro_onmatrimonial_p!=0)
                                        <?php $precio+=($nro_onmatrimonial_p*$precio_onmatrimonial_p); ?>
                                    <li id="acomodacion_M" class=" grey-text text-darken-1"><span>On matinonial accomodation </span><span id="rooms_M">{{$nro_onmatrimonial_p}}</span>X<img class="" src="{{asset('images/male.png')}}"><img class="" src="{{asset('images/male.png')}}">X$<span id="precio_2">{{$precio_onmatrimonial_p}}</span></li>
                                @endif
                                @if($nro_onsimple_p!=0)
                                        <?php $precio+=($nro_onsimple_p*$precio_ononsimple_p); ?>
                                    <li id="acomodacion_1" class=" grey-text text-darken-1"><span>On simple accomodation </span><span id="rooms_S">{{$nro_onsimple_p}}</span>X<img class="" src="{{asset('images/male.png')}}">X$<span id="precio_1">{{$precio_ononsimple_p}}</span></li>
                                @endif



                            </ul>
                        </div>
                        <div class=" col s12 grey darken-4">
                            <div class="text-14 white-text" >Total (USD)
                                <span class="text-30 blue-text text-lighten-1 ">$
                        <span id="subtotal"> {{$precio}}</span>
                    </span>
                            </div>
                            <div class="text-12 align-rigth white-text">taxes included
                            </div>
                        </div>
                    </div>
                    <div class="row center">
                        <div class="col s12">
                            <h6>Optional Activities:</h6>


                            @if($ch_extras_valor_count>0)
                                <?php $pos=0;?>
                                @foreach($ch_extras_valor as $ch_extra)
                                    @if($ch_extra>0)
                                            <p>
                                            <input type="checkbox" id="ch_extras_{{$pos}}" name="ch_extras[]" value="" checked />
                                            <label for="ch_extras_{{$pos}}" >{{$ch_extras_name[$pos]}}<span id="p_{{$pos}}}"> $ <span id="extra_precioP_{{$pos}}">{{$travellers_p*$ch_extras_precio[$pos]}}</span> ($<span id="extra_precioS_{{$pos}}">{{$ch_extras_precio[$pos]}}</span> for traveller)</span></label>
                                            </p>
                                            <br>
                                            <hr>
                                        @endif
                                    <?php $pos++;?>
                                @endforeach
                            @else
                                None
                            @endif


                            <br>
                        </div>
                        <div class=" col s12 orange lighten-1">
                            <div class="text-14 white-text" >Total (USD)
                                <span class="text-30 ">$
                        <span id="total"> {{$total}}</span>
                    </span>
                            </div>
                            <div class="text-12 align-rigth white-text">taxes included
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="https://use.fontawesome.com/1d452fa330.js"></script>
@endsection
