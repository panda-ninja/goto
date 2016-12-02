<link href="{{asset('css/admin-theme.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
<script type="text/javascript" src="{{URL::to('js/funciones_cotizacion.js')}}"></script>
<?php
$Paquete='';
?>
@foreach($paquete as $paquete)
    <?php $Paquete=$paquete;?>
@endforeach
<div class="card-panel">
    <div class="row">
        <div class="col s12 m6 l6">
            <h5 class="THIN letra-naranja">
                {{$Paquete->codigo.' '.$Paquete->titulo}}
            </h5>
                <b>Duracion: </b><label class="letra-verde">{{$Paquete->duracion}} DAYS & {{$Paquete->duracion-1}} NIGHTS</label>

        </div>

    </div>
    <hr>
    <div class="row">
        <div class="input-field col s12 m6 l6">
            <p>{{$Paquete->descripcion}}</p>
        </div>
        <div class="input-field col s12 m6 l6">
            <table class="table table1 borde-tabla-habitacion centrar">
                <tr>
                    <td width="50px"><b class="text-small">Rooms</b></td>
                    <td width="130px"><b class="text-small">Price per person</b><br><span class="letra-peque">Based on hotel category</span></td>
                    <td width="50px"><b class="letra-roja centrar text-small">2 STARS</b></td>
                    <td width="50px"><b class="letra-roja centrar text-small">3 STARS</b></td>
                    <td width="50px"><b class="letra-roja centrar text-small">4 STARS</b></td>
                    <td width="50px"><b class="letra-roja centrar text-small">5 STARS</b></td>
                </tr>

                @foreach($Paquete->precio_paquetes as $precio)
                    @if($precio->estrellas=="2")
                        <?php $precio_2_s=$precio->precio_s;?>
                        <?php $precio_2_d=$precio->precio_d;?>
                        <?php $precio_2_t=$precio->precio_t;?>
                    @endif
                    @if($precio->estrellas=="3")
                        <?php $precio_3_s=$precio->precio_s;?>
                        <?php $precio_3_d=$precio->precio_d;?>
                        <?php $precio_3_t=$precio->precio_t;?>
                    @endif
                    @if($precio->estrellas=="4")
                        <?php $precio_4_s=$precio->precio_s;?>
                        <?php $precio_4_d=$precio->precio_d;?>
                        <?php $precio_4_t=$precio->precio_t;?>
                    @endif
                    @if($precio->estrellas=="5")
                        <?php $precio_5_s=$precio->precio_s;?>
                        <?php $precio_5_d=$precio->precio_d;?>
                        <?php $precio_5_t=$precio->precio_t;?>
                    @endif

                @endforeach
                <tr>
                    <td><input type="number" value="0"></td>
                    <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                    <td><input type="number" name="precio_2_t" id="precio_2_t" value="{{$precio_2_t}}"></td>
                    <td><input type="number" name="precio_3_t" id="precio_3_t" value="{{$precio_3_t}}"></td>
                    <td><input type="number" name="precio_4_t" id="precio_4_t" value="{{$precio_4_t}}"></td>
                    <td><input type="number" name="precio_5_t" id="precio_5_t" value="{{$precio_5_t}}"></td>
                </tr>
                <tr>
                    <td><input type="number" value="0"></td>
                    <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                    <td><input type="number" name="precio_2_d" id="precio_2_d" value="{{$precio_2_d}}"></td>
                    <td><input type="number" name="precio_3_d" id="precio_3_d" value="{{$precio_3_d}}"></td>
                    <td><input type="number" name="precio_4_d" id="precio_4_d" value="{{$precio_4_d}}"></td>
                    <td><input type="number" name="precio_5_d" id="precio_5_d" value="{{$precio_5_d}}"></td>
                </tr>
                <tr>
                    <td><input type="number" value="0"></td>
                    <td class="centrar"><img src="{{asset('images')}}/matrimonial.png" alt="" width="50px" height="30px"></td>
                    <td><input type="number" name="precio_2_d_m" id="precio_2_d_m" value="{{$precio_2_d}}"></td>
                    <td><input type="number" name="precio_3_d_m" id="precio_3_d_m" value="{{$precio_3_d}}"></td>
                    <td><input type="number" name="precio_4_d_m" id="precio_4_d_m" value="{{$precio_4_d}}"></td>
                    <td><input type="number" name="precio_5_d_m" id="precio_5_d_m" value="{{$precio_5_d}}"></td>
                </tr>
                <tr>
                    <td><input type="number" value="0"></td>
                    <td class="centrar"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                    <td><input type="number" name="precio_2_s" id="precio_2_s" value="{{$precio_2_s}}"></td>
                    <td><input type="number" name="precio_3_s" id="precio_3_s" value="{{$precio_3_s}}"></td>
                    <td><input type="number" name="precio_4_s" id="precio_4_s" value="{{$precio_4_s}}"></td>
                    <td><input type="number" name="precio_5_s" id="precio_5_s" value="{{$precio_5_s}}"></td>
                </tr>
            </table>
        </div>
        <div class="input-field col s12 m6 l6">
            <ul id="task-card" class="collection with-header">
                <li class="collection-header cyan">
                    <h4 class="task-card-title">Destinos:</h4>
                </li>
                @foreach($destino as $destino1)
                    <?php $i=0;$esta=0;?>
                    @foreach($Paquete->paquetes_destinos as $destino)
                        <?php $i++;?>
                        @if($destino1->id==$destino->iddestinos)
                            <?php $esta=1;?>
                            <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                <input type="checkbox" id="task{{$i}}" checked="checked">
                                <label for="task{{$i}}" style="text-decoration: none;">{{$destino1->nombre}}
                                </label>
                            </li>
                        @endif
                    @endforeach
                    @if($esta==0)
                        <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task{{$i}}">
                            <label for="task{{$i}}" style="text-decoration: none;">{{$destino1->nombre}}
                            </label>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="input-field col s12 m6 l6">
            <ul id="task-card" class="collection with-header collapsible"  data-collapsible="accordion">
                <li class="collection-header cyan">
                    <h4 class="task-card-title">Itinerario:</h4>
                </li>
                @foreach($Paquete->itinerario as $itinerario)
                    <li>
                        <div class="collapsible-header">DAY {{$itinerario->dia}}: <span class="grey-text text-darken-3">{{$itinerario->titulo}}</span></div>
                        <div class="collapsible-body"><p><?php echo $itinerario->descripcion;?></p></div>

                    </li>
                @endforeach
            </ul>

        </div>


    </div>
</div>