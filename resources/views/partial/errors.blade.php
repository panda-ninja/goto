@if($errors->all())
<div class="error-box card-panel red lighten-5  red-text text-darken-4">
    <ul class="list-unstyled">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif