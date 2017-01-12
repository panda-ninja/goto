@extends('layouts.notifications_inquire')
@section('content')
    <tr>
        <td style="padding:0px 50px 0px 50px">
            <p style="font-size:18px">{{$name}} {{$last_name}}</p>
            <p>Este usuario envio un mensaje de GotoPeru.Travel del formulario Availability.</p>
            <center style="background:#f6f6f6; padding:10px;">
                <table>
                    <tbody>
                    <tr>
                        <td style="text-align:left">
                            <p><strong>Package: {{$code}}</strong></p>
                            <p><strong>Email: {{$email}}</strong></p>
                            <p><strong>Telephone: {{$telephone}}</strong></p>
                            <p><strong>Date: {{$date}}</strong></p>
                            <p><strong>Group size: {{$group_size}}</strong></p>
                            <p><strong>Accommodations: {{$accommodations}} Star
                            <p><strong>Departure date: {{$departure_date}}</strong></p>
                            <p><strong>Comments: {{$comments}}</strong></p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
@stop