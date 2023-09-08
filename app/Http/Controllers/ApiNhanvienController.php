<?php
namespace App\Http\Controllers;
use App\Http\Resources\NhanvienResoure;
use App\Models\Nhanvien;
use Illuminate\Http\Request;

class ApiNhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhanvien = Nhanvien::all(); //lấy toàn bộ danh sách
        //trả ve danh sách dưới dạng json
        return NhanvienResoure::collection($nhanvien);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nhanvien = Nhanvien::create($request->all());
        return new NhanvienResoure($nhanvien);
//        return response()->json([
//            'status'=>200,
//            'message'=>'them thanh cong',
//        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nhanvien = Nhanvien::find($id);
        if ($nhanvien) {
            return new NhanvienResoure($nhanvien);
        }else{
            return response()->json(['message'=>'nhân viên ko tồn tại'],404);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nhanvien = Nhanvien::find($id);
        if($nhanvien){
            $nhanvien->update($request->all());

        }else{
            return  response()->json(['message'=>'nhân viên không tại'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nhanvien=Nhanvien::find($id);
        if($nhanvien)
        {
            $nhanvien->delete();
            return response()->json(['message'=>'xóa thành công'],280);
        }
        else
        {
            return response()->json(['message'=>'nhân viên ko tồn tại'],404);
        }
    }
}
