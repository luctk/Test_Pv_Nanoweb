@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
{{--@if(Session::has('success'))--}}
{{--    <strong style="color: red">{{Session::get('success')}}</strong>--}}
{{--@endif--}}
@if(Session::has('error'))
    <strong style="color: red">{{Session::get('error')}}</strong>
@endif
