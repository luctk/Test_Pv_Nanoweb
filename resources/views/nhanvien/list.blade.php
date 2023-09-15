
@extends('templates.layout')
@section('content')
    <div class="row g-3">
        <div class="col-sm-2">
            <p>Tạo mới nhân viên</p>
        </div>
        <div class="col-sm-9">
            <a href="{{route('add-nhanvien')}}" class="btn btn-outline-dark">Add</a>
        </div>
        <div class="col-sm">
            <a href="{{route('logout')}}" class="btn btn-outline-dark">Log out</a>
        </div>
    </div>
    <div>
        <p>Tìm kiếm nhân viên bằng tên</p>
        <form action="{{route('search-nhanvien')}}" method="post">
            @csrf
            <input type="text" name="searchNhanvien">
            <input type="submit" value="Search" name="btnSend" class="btn btn-outline-dark">
        </form>
    </div>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
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
                    <td><a style="text-decoration: none;color: inherit; "
                           href="{{route('edit-nhanvien',['id'=>$nv->id])}}">Biên soạn</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        @php
            $start = $currentPage - (($currentPage - 1) % 3);
            $end = min($start + 2, $nhanvien->lastPage());
        @endphp
        @if ($nhanvien->previousPageUrl())
            @if ($currentPage > 3)
                <a href="{{ $nhanvien->url($start - 1) }}">&lt;&lt;</a>
            @else
                <a href="{{ $nhanvien->url(1) }}">&lt;&lt;</a>
            @endif
        @endif
        @for ($i = $start; $i <= $end; $i++)
            @if ($currentPage == $i)
                <span> {{ $i }} </span>
            @else
                <a href="{{ $nhanvien->url($i) }}">{{ $i }}</a>
            @endif
        @endfor
        @if ($nhanvien->nextPageUrl())
            @if ($currentPage < $nhanvien->lastPage() - 2)
                <a href="{{ $nhanvien->url($end + 1) }}">&gt;&gt;</a>
            @else
                <a href="{{ $nhanvien->url($nhanvien->lastPage()) }}">&gt;&gt;</a>
            @endif
        @endif
    </div>
@endsection
