<?php
$Paquete='';
?>
@foreach($paquete as $paquete)
    <?php $Paquete=$paquete;?>
@endforeach
<div class="card-panel">
    <div class="row">
        <div class="col s6">
            <h5 class="THIN letra-naranja">
                {{$Paquete->codigo.' '.$Paquete->titulo}}
            </h5>
                <b>Duracion: </b><label class="letra-verde">{{$Paquete->duracion}} DAYS & {{$Paquete->duracion-1}} NIGHTS</label>

        </div>

    </div>
    <hr>
    <div class="row">
        <div class="input-field col s6">
            <p>{{$Paquete->descripcion}}</p>
        </div>
        <div class="input-field col s6">
            <h5 class="letra-naranja">PRICE</h5>
            <table class="table table1">
                <tr>
                    <td width="50px"><b>Rooms</b></td>
                    <td width="210px"><b>Price per person</b><br><span class="letra-peque">Based on hotel category</span></td>
                    <td width="70px"><b class="letra-roja">2 STARS</b></td>
                    <td width="70px"><b class="letra-roja">3 STARS</b></td>
                    <td width="70px"><b class="letra-roja">4 STARS</b></td>
                    <td width="70px"><b class="letra-roja">5 STARS</b></td>
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
                <td><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                <td>{{$precio_2_t}}</td>
                <td>{{$precio_3_t}}</td>
                <td>{{$precio_4_t}}</td>
                <td>{{$precio_5_t}}</td>
            </tr>
                <tr>
                    <td><input type="number" value="0"></td>
                    <td><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                    <td>{{$precio_2_d}}</td>
                    <td>{{$precio_3_d}}</td>
                    <td>{{$precio_4_d}}</td>
                    <td>{{$precio_5_d}}</td>
                </tr>
                <tr>
                    <td><input type="number" value="0"></td>
                    <td><img src="{{asset('images')}}/matrimonial.png" alt="" width="50px" height="30px"></td>
                    <td>{{$precio_2_d}}</td>
                    <td>{{$precio_3_d}}</td>
                    <td>{{$precio_4_d}}</td>
                    <td>{{$precio_5_d}}</td>
                </tr>
                <tr>
                    <td><input type="number" value="0"></td>
                    <td><img src="{{asset('images')}}/single.png" alt="" width="30px" height="30px"></td>
                    <td>{{$precio_2_s}}</td>
                    <td>{{$precio_3_s}}</td>
                    <td>{{$precio_4_s}}</td>
                    <td>{{$precio_5_s}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>