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
                    <h5 class="breadcrumbs-title">Concepts</h5>
                    <ol class="breadcrumbs">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Concepts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12">
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
            </div>
            <div class="row">
                <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="right-align">Price</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="right-align">Price</th>
                            <th></th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @php $i = 1; @endphp
                        @foreach($concept->sortBy("nombre") as $concepts)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ucwords(strtolower($concepts->nombre))}}</td>
                                <td>{{$concepts->observacion}}</td>
                                <td class="right-align">{{$concepts->precio}}$</td>

                                <td class="right-align">
                                    <form action="{{route('admin_concept_delete_path', $concepts->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="delete">
                                        <a href="#{{$concepts->id}}-concept" class="orange-text text-20 modal-trigger"><i class="mdi-editor-mode-edit"></i></a>
                                        <button class="btn-submit-form" type="submit" name="action" onclick="return confirm('Estas seguro de eliminar?')">
                                            <i class="mdi-action-delete red-text text-20"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Structure concept edit-->
                            <div id="{{$concepts->id}}-concept" class="modal">
                                <div class="modal-content">
                                    <form action="{{route('admin_concept_update_path', $concepts->id)}}"  method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="patch">
                                        <div class="row">
                                            <div class="col s12">
                                                <h5 class="center">Concept</h5>
                                                <div class="divider margin-bottom-40"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input placeholder="Ingrese el titulo del itinerario" id="titulo_txt" name="titulo_txt" type="text" class="validate" required value="{{$concepts->nombre}}">
                                                <label for="titulo_txt" class="active">Title</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input placeholder="Ingrese precio del servicio" id="price_txt" name="price_txt" type="number" min="0" class="validate" required value="{{$concepts->precio}}">
                                                <label for="price_txt" class="active">Price</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="observacion_txt" name="observacion_txt" class="materialize-textarea" required>{{$concepts->observacion}}</textarea>
                                                <label for="observacion_txt" class="active">Observation</label>
                                            </div>
                                        </div>
                                        <div class="row spacer-20">
                                            <div class="col s12">
                                                <button class="btn waves-effect waves-light right" type="submit" name="action">Update
                                                    <i class="mdi-content-send right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a href="#concept_add" class="btn-floating btn-large red modal-trigger">
            <i class="large mdi-content-add"></i>
        </a>
    </div>

    <!-- Modal Structure concept-->
    <div id="concept_add" class="modal">
        <div class="modal-content">
            <form action="{{route("admin_concept_store_path")}}"  method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="patch">
                <div class="row">
                    <div class="col s12">
                        <h5 class="center">New Concept</h5>
                        <div class="divider margin-bottom-20"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Ingrese el titulo del itinerario" id="titulo_txt" name="titulo_txt" type="text" class="validate" required>
                        <label for="titulo_txt" class="active">Title</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Ingrese precio del servicio" id="price_txt" name="price_txt" type="number" min="0" class="validate" required>
                        <label for="price_txt" class="active">Price</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="observacion_txt" name="observacion_txt" class="materialize-textarea" required></textarea>
                        <label for="observacion_txt" class="active">Observation</label>
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