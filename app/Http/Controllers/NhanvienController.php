<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhanvienRequest;
use App\Models\Nhanvien;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NhanvienController extends Controller
{
    public function index(Request $request)
    {

        $perPage = 4;
        $currentPage = $request->query('page', 1);
        $nhanvien = NhanVien::query();

        if ($request->isMethod('post') && $request->searchNhanvien) {
            $nhanvien = NhanVien::where('ten', 'like', '%' . $request->searchNhanvien . '%');
        }

        $nhanvien = $nhanvien->paginate($perPage, ['*'], 'page', $currentPage);

        if ($nhanvien->isEmpty() && $request->searchNhanvien) {
            Session::flash('error','Không tìm thấy nhân viên');
        }

        return view('nhanvien.list', compact('nhanvien', 'currentPage'));

    }

    public function add(NhanvienRequest $request)
    {
        if ($request->isMethod('post') && isset($_POST['add'])) {
            $params = $request->all();
            $params['ten']=e($request->ten);
            return view('nhanvien.xacnhan', compact('params'));
        }
        if ($request->isMethod('post') && isset($_POST['xacnhan'])) {
            $params = $request->all();
            $nhanvien = Nhanvien::create($params);
            if ($nhanvien) {
                $tb = 'đăng kí thành công';
                return view('nhanvien.tb', compact('tb'));
            }
        }
        return view('nhanvien.add');
    }

    public function edit(NhanvienRequest $request, $id)
    {
        $nhanvien = Nhanvien::find($id);
        if ($request->isMethod('post') && isset($_POST['edit'])) {
            $params = $request->all();
            return view('nhanvien.xacnhan', compact('params'));
        }
        if ($request->isMethod('post') && isset($_POST['xacnhan'])) {
            $params = $request->all();
            $nhanvien->update($params);
            $tb = 'update thành công';
            return view('nhanvien.tb', compact('tb'));
        }
        //delete
        if ($request->isMethod('post') && isset($_POST['xoa'])) {
            $params = $request->all();
            return view('nhanvien.xacnhanxoa', compact('params'));
        }
        if ($request->isMethod('post') && isset($_POST['xacnhanxoa'])) {
            if ($nhanvien) {
                $nhanvien->delete();
                $tb = 'delete thành công';
                return view('nhanvien.tb', compact('tb'));
            }

        }
        return view('nhanvien.edit', compact('nhanvien'));
    }
}

