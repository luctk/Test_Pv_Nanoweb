<p>Xác nhận thông tin</p>
@extends('templates.layout')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Tên" name="ten" value="{{$params['ten']}}"><br>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Email" name="email" value="{{$params['email']}}"><br>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Tel</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Tel" name="tel" value="{{$params['tel']}}"><br>
            </div>
        </div>
        <button class="btn btn-primary" name="xacnhanxoa">OK</button>
    </form>
@endsection

