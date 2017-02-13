<?php $j=0;?>
<ul>
@foreach($itinerario->take(30) as $itinerario)
    <?php $j++;?>
    <li class="collection-item dismissable">
        <p>
            <input type="checkbox" name="chb_itinerario_n" id="chb_itinerario_n{{$j}}" value="{{$itinerario->titulo.'['.$itinerario->descripcion}}">
            <label for="chb_itinerario_n{{$j}}">{{$itinerario->titulo}}</label>
        </p>
    </li>
@endforeach
</ul>