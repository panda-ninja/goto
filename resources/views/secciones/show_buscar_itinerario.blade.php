<?php $j=0;?>
<ul>
@foreach($itinerario as $itinerario)
    <?php $j++;?>
    <li class="collection-item dismissable">
        <p>
            <input type="hidden" name="precio_iti[]" id="precio_iti_{{$j}}" value="{{$itinerario->precio}}">
            <input type="checkbox" name="chb_itinerario_n" id="chb_itinerario_n{{$j}}" value="{{$itinerario->titulo.'['.$itinerario->descripcion.'['.$itinerario->precio}}">
            <label for="chb_itinerario_n{{$j}}"><b>{{$itinerario->titulo}}</b></label>
        </p>
    </li>
@endforeach
</ul>