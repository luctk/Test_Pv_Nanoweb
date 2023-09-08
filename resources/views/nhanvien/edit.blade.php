<div><p>Biên soạn thông tin nhân viên</p></div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="" class="btn btn-outline-dark">Log out</a>
</div
@extends('templates.layout')
@section('content')
    <form action="{{route('edit-nhanvien',['id'=>$nhanvien->id])}}" method="post">
        @csrf
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Id" name="id" value="{{$nhanvien->id}}" disabled><br>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Tên" name="ten" value="{{old('ten') ?? $nhanvien->ten}}"><br>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Email" name="email" value="{{ old('email')?? $nhanvien->email}}"><br>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Tel</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Tel" name="tel" value="{{ old('tel')?? $nhanvien->tel}}"><br>
            </div>
        </div>
        <button type="submit" class="" name="edit">Update</button>
        <button type="submit" class="" name="xoa">
            Delete
        </button>
        <button type="submit" class="" name="edit"><a href="{{route('list-nhanvien')}}">Back</a></button>
    </form>
@endsection
