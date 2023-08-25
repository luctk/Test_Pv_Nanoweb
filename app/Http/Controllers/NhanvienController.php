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

        $nhanvien = Nhanvien::paginate(3);
//        $paginator=Paginator::class
        if ($request->post() && $request->searchNhanvien) {
            $nhanvien = DB::table('nhanvien')
                ->where('ten', 'like', '%' . $request->searchNhanvien . '%')
                ->get();
            if ($nhanvien) {
                Session::flash('success', 'nhân viên tìm được');
            }
        }
        return view('nhanvien.list', compact('nhanvien'));
    }

    public function add(NhanvienRequest $request)
    {
        if ($request->isMethod('post')) {
            $params = $request->except('_token');
            $params['ten']=e($request->ten);
            $nhanvien = Nhanvien::create($params);
            if ($nhanvien) {
                Session::flash('success', 'thêm thành công');
            }
        }
        return view('nhanvien.add');

    }

    public function edit(NhanvienRequest $request, $id)
    {
        $nhanvien = DB::table('nhanvien')->where('id', $id)->first();
        if ($request->isMethod('post')) {
            $params = $request->except('_token');
            $result = Nhanvien::where('id', $id)->update($params);
            if ($result) {
                Session::flash('success', 'sua thành công');
                return redirect()->route('edit-nhanvien', ['id' => $id]);
            }
        }
        return view('nhanvien.edit', compact('nhanvien'));
    }
}
