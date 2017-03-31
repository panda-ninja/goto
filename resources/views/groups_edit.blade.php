@extends('layouts.dashboard')

@section('content')

    {{--{{$cliente->nombres}}--}}

    {{--<div class="row">--}}
        {{--<div class="col s12">--}}
            {{--<a href="{{route("group_path", $cotizacion->id)}}">Groups</a>/Personal information--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <form action="{{route('client_patch_path', $cliente->id)}}" class="col s12 font-moserrat" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col s12">
                    <h5 class="font-moserrat grey-text text-darken-3">Personal information</h5>
                    <div class="divider margin-bottom-20"></div>

                    @if(Session::get('success'))
                        <div class="card-panel light-blue darken-1 center-align">
                            <h5 class="white-text">{{Session::get('success')}}</h5>
                        </div>
                    @endif

                </div>
                <div class="input-field col s6">
                    <input placeholder="Name" id="name" type="text" name="name_txt" class="validate" value="{{$cliente->nombres}}">
                    <label for="name" class="active">Name</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Last Name" id="last_name" name="last_txt" type="text" class="validate" value="{{$cliente->apellidos}}">
                    <label for="last_name" class="active">Last Name</label>
                </div>

            </div>
            <div class="row">
                <div class="col s6">
                    <p>
                        <input name="sexo_rbo" type="radio" id="male_rbo" value="1" @php if($cliente->sexo == 1){ echo "checked";} @endphp/>
                        <label for="male_rbo">Male</label>

                        <input name="sexo_rbo" type="radio" id="female_rbo" value="0" @php if($cliente->sexo == 0){ echo "checked";} @endphp/>
                        <label for="female_rbo">Female</label>
                    </p>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Date Of Birth" id="nacimiento_txt" name="nacimiento_txt" type="date" class="datepicker" value="{{$cliente->fechanacimiento}}">
                    <label for="nacimiento_txt" class="active">Date Of Birth</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="email" id="email_txt" name="email_txt" type="text" class="validate" value="{{$cliente->email}}">
                    <label for="email_txt" class="active"><span class="orange-text">Email</span></label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Password" id="password_txt" type="password" name="password_txt" class="validate" value="{{$cliente->password}}">
                    <label for="password_txt" class="active"><span class="orange-text">Password</span></label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Telephone" id="telefono_txt" name="telefono_txt" type="tel" class="validate" value="{{$cliente->telefono}}">
                    <label for="telefono_txt" class="active">Telephone</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Passport Number" id="passport_txt" name="passport_txt" type="text" class="validate" value="{{$cliente->pasaporte}}">
                    <label for="passport_txt" class="active">Passport Number</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Nationality" id="nacionalidad_txt" name="nacionalidad_txt" type="text" class="validate" value="{{$cliente->nacionalidad}}">
                    <label for="nacionalidad_txt" class="active">Nationality</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="City of Residence" id="residencia_txt" name="residencia_txt" type="text" class="validate" value="{{$cliente->residencia}}">
                    <label for="residencia_txt" class="active">City of Residence</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Medical Restrictions" id="restricciones_txt" name="restricciones_txt" type="text" class="validate" value="{{$cliente->restricciones}}">
                    <label for="restricciones_txt" class="active">Medical Restrictions</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Allergies" id="alergias_txt" name="alergias_txt" type="text" class="validate" value="{{$cliente->alergias}}">
                    <label for="alergias_txt" class="active">Allergies</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Diet Restrictions" id="dieta_txt" name="dieta_txt" type="text" class="validate" value="{{$cliente->dieta}}">
                    <label for="dieta_txt" class="active">Diet Restrictions</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <h5 class="font-moserrat grey-text text-darken-3">Comments</h5>
                </div>
                <div class="input-field col s12">
                    <textarea id="comentarios_txt" placeholder="Comments" name="comentarios_txt" class="materialize-textarea">{{$cliente->comentarios}}</textarea>
                    <label for="comentarios_txt" class="active">Comments</label>
                </div>
            </div>
            <div class="row center">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>

@stop