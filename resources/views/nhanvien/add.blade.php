<div><p>Đăng kí nhân viên mới</p></div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="" class="btn btn-outline-dark">Log out</a>
</div
@extends('templates.layout')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Tên" name="ten" ><br>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Email" name="email"><br>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Tel</label>
            <div class="col-sm-3">
                <input type="text" placeholder="Tel" name="tel"><br>
            </div>
        </div>
        <button type="submit" class="" name="add">Register</button>
        <button type="submit" class="" name="back">Back</button>
    </form>
@endsection
