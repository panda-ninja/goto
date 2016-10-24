@extends('layouts.default')

@section('content')

    <div class="container">
        <div class="section">
            <!-- Page Layout here -->
            <div class="row">

                <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
                    <!-- Grey navigation panel

                          This content will be:
                      3-columns-wide on large screens,
                      4-columns-wide on medium screens,
                      12-columns-wide on small screens  -->
                    <div class="collection">
                        <a href="#!" class="collection-item">Quotes<span class="badge">1</span></a>

                        <a href="#!" class="collection-item">Payments</a>
                        <a href="#!" class="collection-item">Reports</a>
                        <a href="#!" class="collection-item">Wish list<span class="new badge">4</span></a>
                        <a href="#!" class="collection-item">Profile<span class="badge">14</span></a>
                    </div>

                </div>

                <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
                    <!-- Teal page content

                          This content will be:
                      9-columns-wide on large screens,
                      8-columns-wide on medium screens,
                      12-columns-wide on small screens  -->
                    <h5>{{$itinerario->paquete_personalizados->codigo}}: {{$itinerario->paquete_personalizados->titulo}}</h5>


                </div>

            </div>
        </div>
    </div>

@stop