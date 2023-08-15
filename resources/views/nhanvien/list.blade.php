@extends('templates.layout');
@section('content')
    <div><a href="{{route('add-nhanvien')}}" class="btn-primary">Add</a></div>
    <form action="{{route('search-nhanvien')}}" method="POST">
        @csrf
        <input type="text" name="searchNhanvien">
        <input type="submit" value="Search" name="btnSend">
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tên</th>
            <th scope="col">Email</th>
            <th scope="col">Tel</th>
            <th scope="col">Tel</th>
        </tr>
        </thead>
        <tbody>
        @foreach($nhanvien as $nv)
            <tr>
                <th scope="row">{{$nv->id}}</th>
                <td>{{$nv->ten}}</td>
                <td>{{$nv->email}}</td>
                <td>{{$nv->tel}}</td>
                <td><a href="{{route('edit-nhanvien',['id'=>$nv->id])}}">SỬA</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
