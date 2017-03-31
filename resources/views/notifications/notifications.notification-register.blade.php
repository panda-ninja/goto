@extends('layouts.notifications_inquire')
@section('content')

    <tr>
        <td style="padding:0px 50px 0px 50px">
            <p style="font-size:18px"><b>{{$name}}</b></p>
            <p>Nuevo usuario registrado en GotoPeru.Travel:</p>
            <p><strong>Email</strong>: {{$email}}</p>
            <p><strong>Password</strong>: {{$password}}</p>
            <center style="padding:10px;">
                <a target="_blank" href="https://gotoperu.com/" style="color:#ffffff;background:#827717;font-size:18px;font-weight:bold;padding:16px 45px;text-align:center;border-radius:8px;text-decoration:none;display:inline-block">Go To Peru</a>
            </center>
        </td>
    </tr>


@stop