@extends('layouts.notifications_inquire')
@section('content')
    <tr>
        <td style="padding:0px 50px 0px 50px">
            <p style="font-size:18px">{{$name}}</p>
            <p>Este usuario envio un mensaje de GotoPeru.Travel del formulario "Design Your TRIP".</p>
            <center style="background:#f6f6f6; padding:10px;">
                <table>
                    <tbody>
                    <tr>
                        <td style="text-align:left">

                            <p><strong>Email: {{$email}}</strong></p>
                            <p><strong>Telephone: {{$telephone}}</strong></p>
                            <p><strong>Travel Date: {{$travel_date}}</strong></p>
                            <p><strong>Number of Travelers: {{$travelers}}</strong></p>

                            <p><strong>Destinations (Peru): {{$peru}}</strong></p>
                            <p><strong>Multicountries: {{$multicountries}}</strong></p>
                            <p><strong>Hotel category: {{$hotel}}</strong></p>
                            <p><strong>Trip Length: {{$trip}}</strong></p>

                            <p><strong>Comment: {{$comment}}</strong></p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
@stop