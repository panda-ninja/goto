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
            <div class="col s12 m6 l6 margin-bottom-20">
                <div>
                    <h6><b>Sign in with your email</b></h6>
                </div>

                <form action="{{ route('client_auth_store_path')}}" method="post">
                    {{csrf_field()}}
                    <div class="row font-moserrat">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row font-moserrat">
                        <div class="input-field col s12">
                            <input id="password" name="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="row font-moserrat">
                        <div class="input-field col s12">
                            <input type="submit" value="Sign In" class="waves-effect waves-light btn yellow darken-4">
                        </div>
                    </div>

                    <div class="row margin-top-20">
                        <div class="col s12">
                            <a href="#forgot" class="modal-trigger">Forgot your password?</a> |
                            <a href="{{route('client_register_path')}}">Create new account</a>

                            <!-- Modal Structure -->
                            <div id="forgot" class="modal">
                                <div class="modal-content">
                                    <h4>ACCOUNT PASSWORD RESET</h4>
                                    <div class="row">
                                        <div class="col s12">
                                            Enter your e-mail address below, and we'll e-mail instructions for setting a new password.
                                            <form action="">
                                                <div class="row font-moserrat">
                                                    <div class="input-field col s7">
                                                        <input id="email" type="email" class="validate">
                                                        <label for="email" data-error="wrong" data-success="right">Email</label>
                                                    </div>
                                                    <div class="input-field col s5 font-moserrat">
                                                        <input type="submit" value="Reset my password" class="waves-effect waves-light btn yellow darken-4 btn-checkout">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
            <div class="col s12 m6 l6">
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