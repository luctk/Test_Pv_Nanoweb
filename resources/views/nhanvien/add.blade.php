@extends('templates.layout')
@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Tên</span>
        <input type="text" class="form-control" placeholder="Tên" name="ten" value="{{old('ten')}}">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Email</span>
        <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Tel</span>
        <input type="text" class="form-control" placeholder="Tel" name="tel"value="{{old('tel')}}">
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection
