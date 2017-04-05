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
                    <h5 class="breadcrumbs-title">Packages</h5>
                    <ol class="breadcrumbs">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Current Packages</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
    <div class="container">
        <div class="section">
            <div class="row">
                @if(Session::get('message'))
                    <div id="card-alert" class="card red">
                        <div class="card-content white-text">
                            <p><i class="mdi-alert-error"></i> {{Session::get('message')}}</p>
                        </div>
                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

            </div>
            <div class="row">
                <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Codigo</th>
                            <th>Title</th>
                            <th>Duration</th>
                            {{--<th>Imagen</th>--}}
                            <th></th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Title</th>
                            <th>Description</th>
                            {{--<th>Imagen</th>--}}
                            <th></th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @foreach($packages->sortBy("titulo") as $package)
                            <tr>
                                <td>1</td>
                                <td>{{$package->codigo}}</td>
                                <td>{{ucwords(strtolower($package->titulo))}}</td>
                                <td>{{$package->duracion}}</td>
                                {{--<td>--}}
                                    {{--@if (Storage::disk('itinerary')->has($itinerarios->imagen))--}}
                                        {{--<section class="row new-post">--}}
                                            {{--<div class="col-md-6 col-md-offset-3">--}}
                                                {{--<img src="{{ route('admin_itinerary_image_path', ['filename' => $itinerarios->imagen]) }}" alt="" width="100">--}}
                                            {{--</div>--}}
                                        {{--</section>--}}
                                    {{--@endif--}}
                                {{--</td>--}}
                                <td class="right-align">
                                    <form action="" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="delete">
                                        <a href="" class="orange-text text-20"><i class="mdi-editor-mode-edit"></i></a>
                                        {{--<input type="submit" class="btn btn-danger" value="Eliminar Post" onclick="">--}}
                                        <a href="javascript:;" onclick="parentNode.submit();return confirm('Estas seguro de eliminar?')" class="red-text text-20"><i class="mdi-action-delete"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a href="" class="btn-floating btn-large red modal-trigger">
            <i class="large mdi-content-add"></i>
        </a>
    </div>

    <!-- Modal Structure itinerario-->
    <div id="itinerary_add" class="modal">
        <div class="modal-content">
            <form action="{{route("admin_itinerary_store_path")}}"  method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="patch">
                <div class="row">
                    <div class="col s12">
                        <h5 class="center">Nuevo itinerario</h5>
                        <div class="divider margin-bottom-20"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Ingrese el titulo del itinerario" id="titulo_txt" name="titulo_txt" type="text" class="validate" required>
                        <label for="titulo_txt" class="active">Titulo</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="descipcion_txt" name="descipcion_txt" class="materialize-textarea" required></textarea>
                        <label for="descipcion_txt" class="active">Descripcion</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <p class="grey-text">Agregue una imagen</p>
                        <input type="file" id="file" name="file" class="dropify" data-default-file=""/>
                    </div>
                </div>
                <div class="row spacer-20">
                    <div class="col s12">
                        <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>

@stop