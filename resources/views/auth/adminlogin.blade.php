@extends('layouts.default-admin')

@section('content')


    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col l12">
                    @include('partial.errors')
                </div>
            </div>
            <div class="row">
                <div class="col s3"></div>
                <div class="col s6">
                    <div>
                        <h3><b>Bienvenido al Sistema</b></h3>
                    </div>
                    <div>
                        <h6><b>Sign in with your email</b></h6>
                    </div>
                    <form action="{{ route('admin_auth_store_path')}}" method="post">
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

                    </form>
                </div>

            </div>
        </div>
    </div>


@stop