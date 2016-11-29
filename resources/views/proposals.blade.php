@extends('layouts.dashboard')

@section('content')

    <h4 class="center">Travel Proposals</h4>

    @foreach($cotizaciones as $cotizacion)

            <?php $i=1; ?>
            @foreach($cotizacion->paquete_cotizaciones as $paquete_cotizaciones)

                <div class="col s12">
                    @if($paquete_cotizaciones->estado == 1)
                        <?php
                        $active = 'active';
                        $yellow = 'yellow-text text-darken-3';
                        $green = 'green-text';
                        $grey = 'grey-text text-darken-4';
                        $blue = 'blue-text text-darken-3';
                        $btn_yellow = 'yellow darken-3';
                        $img_active = '';
                        ?>
                    @else
                        <?php
                        $active = 'desactive';
                        $yellow = 'grey-text';
                        $green = 'grey-text';
                        $grey = 'grey-text';
                        $blue = 'grey-text';
                        $btn_yellow = 'grey darken-3';
                        $img_active = 'desaturada';
                        ?>
                    @endif
                    <div class="section card-panel grey lighten-4 z-depth-1 hoverable {{$active}}">

                        <div class="valign-wrapper qoutes-box">

                            <div class="col s12">
                                <p class="no-padding {{$yellow}} text-20"><b class="{{$yellow}}">Plan {{$i++}}: </b> <span class="grey-text">{{$paquete_cotizaciones->duracion}} Days & {{$paquete_cotizaciones->duracion-1}} Nights</span></p>
                                <p class="no-padding {{$grey}}">
                                    @foreach($paquete_cotizaciones->paquetes_destinos as $destino)
                                        {{ucwords(strtolower($destino->destinos->destino))}},
                                    @endforeach
                                </p>

                                <p class="center {{$grey}}"><b>"Lorem ipsum dolor sit amet, consectetur adipisicing elit."</b></p>

                                <div class="col s9">
                                    @foreach($paquete_cotizaciones->incluye_paquete_cotizaciones as $incluye)

                                        <div class="col s3">
                                            <img src="{{asset('img/icons/include/'.$incluye->incluye->imagen)}}" alt="" class="responsive-img {{$img_active}}">
                                            <p class="no-padding center">{{ucwords(strtolower($incluye->incluye->titulo))}}</p>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="col s3">
                                    @foreach($paquete_cotizaciones->precio_paquetes as $precio)
                                        <p class="no-padding {{$green}}"><b>{{$precio->estrellas}} stars:</b>  <span class="right">${{$precio->precio_d}}</span></p>
                                    @endforeach
                                </div>
                                <div class="col s12 right-align">
                                    <div class="divider spacer-margin-20"></div>
                                    <a href="{{route('quotes_show_path',$paquete_cotizaciones->id)}}" class="waves-effect waves-light btn {{$btn_yellow}}">View</a>
                                    <a href="#upgrade" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Customize</a>
                                    <a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Confirm</a>
                                    {{--<form action="{{route('quotes_show_path', $paquete_cotizaciones->id)}}" method="post">--}}

                                        {{--{{csrf_field()}}--}}

                                        {{--<input type="submit" value="View" class="waves-effect waves-light btn {{$btn_yellow}}">--}}
                                        {{--<a href="#upgrade" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Customize</a>--}}
                                        {{--<a href="#confirm{{$paquete_cotizaciones->id}}" class="modal-trigger waves-effect waves-light btn {{$btn_yellow}}">Confirm</a>--}}
                                    {{--</form>--}}


                                </div>

                            </div>

                            <!-- Modal Structure -->
                            <div id="confirm{{$paquete_cotizaciones->id}}" class="modal">
                                <form action="{{route('quotes_patch_path', $paquete_cotizaciones->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="patch">

                                    <div class="modal-content">
                                        <h5>Estas seguro de confirmar?</h5>
                                        <p class="margin-top-40">El paquete personalizado se confirmara para su viaje de ensueño</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Confirm Now
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

    @endforeach


@stop