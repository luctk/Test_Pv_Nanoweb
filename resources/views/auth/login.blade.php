<p>Hãy nhập LoginID và Password </p>
@extends('templates.layout')
@section('content')
    <table class="table">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">LoginID</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="loginId" name="loginId">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </table>
@endsection

