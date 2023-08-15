@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@if(\Illuminate\Support\Facades\Session::has('success'))
    <strong>{{\Illuminate\Support\Facades\Session::get('success')}}</strong>
@endif
@if(\Illuminate\Support\Facades\Session::has('error'))
    <strong>{{\Illuminate\Support\Facades\Session::get('error')}}</strong>
@endif
