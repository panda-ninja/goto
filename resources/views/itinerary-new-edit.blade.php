@extends('layouts.admin')

@section('content')
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey hide-on-large-only">
            <i class="mdi-action-search active"></i>
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title">Itinerary</h5>
                    <ol class="breadcrumbs">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Itinerary update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="row">
                    @if(Session::get('success'))
                        <div id="card-alert" class="card green">
                            <div class="card-content white-text">
                                <p><i class="mdi-alert-error"></i> {{Session::get('success')}}</p>
                            </div>
                            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                        @if(Session::get('error'))
                            <div id="card-alert" class="card red">
                                <div class="card-content white-text">
                                    <p><i class="mdi-alert-error"></i> {{Session::get('error')}}</p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                </div>
                <form action="{{route("admin_itinerary_patch_path", $itinerario->id)}}"  method="post" enctype="multipart/form-data">
                    <div class="col s8">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="patch">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="text-20">Itinerary</h5>
                                <div class="divider margin-bottom-20"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Ingrese el titulo del itinerario" id="titulo_txt" name="titulo_txt" type="text" class="validate" required value="{{$itinerario->titulo}}">
                                <label for="titulo_txt" class="active">Titulo</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea" required>{{$itinerario->descripcion}}</textarea>
                                <label for="descipcion_txt" class="active">Descripcion</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 input-field">
                                <p class="grey-text">Agregue una imagen</p>
                                @if (Storage::disk('itinerary')->has($itinerario->imagen))
                                    <input type="file" id="file" name="file" class="dropify" data-default-file="{{ route('admin_itinerary_image_path', ['filename' => $itinerario->imagen])}}"/>
                                    @else
                                    <input type="file" id="file" name="file" class="dropify"/>
                                @endif
                            </div>
                        </div>
                        <div class="row spacer-20">
                            <div class="col s12">
                                <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="row" id="c_services">
                            <div class="col s12">
                                <h5 class="text-20">Services</h5>
                                <div class="divider margin-bottom-20"></div>
                            </div>
                            @foreach($servicios as $servicio)

                                    <div class="col s9">
                                        <input type="checkbox" id="services-{{$servicio->id}}" name="services[]" class="filled-in" value="{{$servicio->id}}"
                                                @foreach($itinerario_orden_modelo as $itinerario_orden_modelos)
                                                    @php
                                                        if ($servicio->id == $itinerario_orden_modelos->orden_modelo_id)
                                                            echo "checked";
                                                    @endphp
                                                @endforeach
                                        />
                                        <label for="services-{{$servicio->id}}">{{ucwords(strtolower($servicio->nombre))}} <i class="text-10">({{strtolower($servicio->observacion)}})</i></label>
                                    </div>
                                <div class="col s3">
                                    <b class="right">({{$servicio->precio}}$)</b>
                                </div>
                            @endforeach


                        </div>
                        <div class="row">

                            <div class="col s12">
                                <a href="#!" class="right" onclick="Materialize.showStaggeredList('#staggered-test')">New Concept +</a>

                                <ul id="staggered-test">
                                    <li style="opacity: 0">
                                        <form id="theForm">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input placeholder="Ingrese el titulo del itinerario" id="c_titulo_txt" name="c_titulo_txt" type="text" class="validate" required>
                                                    <label for="c_titulo_txt" class="active">Title</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <input placeholder="Ingrese precio del servicio" id="c_price_txt" name="c_price_txt" type="number" min="0" class="validate" required>
                                                    <label for="c_price_txt" class="active">Price</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <textarea id="c_observacion_txt" name="c_observacion_txt" class="materialize-textarea" required></textarea>
                                                    <label for="c_observacion_txt" class="active">Observation</label>
                                                </div>
                                            </div>
                                            <div class="row spacer-20">
                                                <div class="col s12">
                                                    {{--<button class="btn waves-effect waves-light right" type="submit" name="action">Agregar--}}
                                                    {{--<i class="mdi-content-send right"></i>--}}
                                                    {{--</button>--}}

                                                    <button class="btn waves-effect waves-light yellow darken-4" id="c_send" type="button" onclick="addConcept()">Submit
                                                    </button>

                                                </div>
                                            </div>
                                            {{--<div class="row">--}}
                                            {{--<div class="col s12">--}}
                                            {{--<div id="c_congratulation">--}}
                                            {{--<p></p>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
@stop