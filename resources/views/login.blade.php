@extends('layouts.default')

@section('content')


    <div class="container">
        <div class="section">
            <div class="row">
                    <div class="col l12">
                        @include('partial.errors')
                    </div>
            </div>
            <div class="row">
                <div class="col s6">

                    <div>
                        <h6><b>Sign in with your email</b></h6>
                    </div>

                    <form action="{{ route('auth_store_path')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="submit" value="Sign In" class="waves-effect waves-light btn yellow darken-4">
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <p>
                                    <input type="checkbox" id="filled-in-1" checked="checked" disabled="disabled"/>
                                    <label for="filled-in-1">Agregue paquetes y compare en una lista de deseos</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="filled-in-2" checked="checked" disabled="disabled"/>
                                    <label for="filled-in-2">Personalize su paquete de ensueño</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="filled-in-3" checked="checked" disabled="disabled"/>
                                    <label for="filled-in-3">Haga seguimiento a sus pagos facilmente</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="filled-in-4" checked="checked" disabled="disabled"/>
                                    <label for="filled-in-4">Vea todos sus paquetes</label>
                                </p>

                                <p>
                                    <input type="checkbox" id="filled-in-5" class="filled-in"/>
                                    <label for="filled-in-5">Recibir notificaciones</label>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s6">
                    <div>
                        <h6><b>Sign in with facebook</b></h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet, dignissimos ducimus ea est facere fugit ipsum iusto modi molestias neque pariatur sint tempore tenetur totam ullam vel velit vitae!</p>
                    </div>
                    <div>
                        <a class="waves-effect waves-light btn indigo darken-3"><i class="material-icons left">thumb_up</i>Sign in with facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @stop