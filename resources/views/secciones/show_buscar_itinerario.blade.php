<?php $j=0;?>
@foreach($itinerario->take(5) as $itinerario)
    <?php $j++;?>
    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="portlet-header ui-sortable-handle ui-widget-header ui-corner-all">
            <span class="ui-icon portlet-toggle ui-icon-plusthick"></span>
            <span class="cursor-move">DAY <span class="pos_iti" name="posdia[]" id="pos_dia_{{$j}}">{{$itinerario->dia}}</span>: <i id="titulo_{{$j}}">{{$itinerario->titulo}}</i></span></div>
        <div class="portlet-content" style="display: none;">
            <div class="row">
                <div class="col s12">
                    <span class="grey-text text-darken-3">
                        <input name="titulo_itinerario[]" id="titulo_itinerario_{{$j}}" type="text" placeholder="Ingrese el titulo" value="{{$itinerario->titulo}}">
                    </span>
                </div>

            </div>
            <textarea  name="desc_itinerario[]" id="desc_itinerario_{{$j}}"  >
                {{$itinerario->descripcion}}
            </textarea>
        </div>
    </div>
    <script>
        $(function(){
            $('#desc_itinerario_{{$j}}')
                    .on('froalaEditor.initialized', function (e, editor) {
                        $('#desc_itinerario_{{$j}}').parents('form').on('submit', function () {
                            {{--console.log($('#desc_itinerario_{{$j}}').val());--}}
                            //                                                    return false;
                        })
                    })
                    .froalaEditor({iframe:false,enter: $.FroalaEditor.ENTER_P, placeholderText: null})
        });
    </script>
@endforeach