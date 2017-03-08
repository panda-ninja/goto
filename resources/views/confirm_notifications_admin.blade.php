@extends('layouts.notifications_inquire')
@section('content')
    <tr>
        <td style="padding:0px 50px 0px 50px">
            <p style="font-size:18px">{{$name}} {{$apellido}}</p>
            <p>Este usuario confirmo un paquete personalizado.</p>
            <center style="background:#f6f6f6; padding:10px;">
                <table>
                    <tbody>
                    <tr>
                        <td style="text-align:left">
                            <p><strong>Paquete:</strong> {{$codigo}} - {{$titulo}}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
@stop