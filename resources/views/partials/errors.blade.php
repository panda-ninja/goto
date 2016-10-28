
{{--para encontrar errores--}}
{{--{{dd($errors->all())}}--}}
@if($errors->all())
    <div class="alert alert-danger" role="alert">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif