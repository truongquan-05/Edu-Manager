<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\NguoiDung;
use App\Models\SinhVien;
use App\Models\VaiTro;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = NguoiDung::with('vaitro')->where('trang_thai', '0')->orderBy('id', 'DESC')->paginate(8);
        return view(
            "admin.pages.acc.index",
            compact('users')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = VaiTro::all();
        return view('admin.pages.acc.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $stt = false;
        $flag = false;


        if ($data['vai_tro_id'] == 3) {
            $stt = true;
            $flag = true;
            $data['ma_giang_vien'] = 'GV' . rand(1000, 99999);
        } elseif ($data['vai_tro_id'] == 4) {
            $flag = true;
            $data['ma_sinh_vien'] = 'SV' . rand(1000, 99999);
        }
        $nguoidung = NguoiDung::create($data);
        $data['nguoi_dung_id'] = $nguoidung->id;
        if ($stt && $flag) {
            GiangVien::create($data);
        } elseif( $flag ) {
            SinhVien::create($data);
        }
        return redirect()->route('admin.user.edit',$nguoidung->id)->with('message','Thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $uesr = NguoiDung::find($id);
        $roles = VaiTro::all();
        return view(
            "admin.pages.acc.edit",
            compact('uesr', 'roles')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', '_method');

        if ($data['vai_tro_id'] == 1) {
            return redirect()->route("admin.user.edit", $id)
                ->with('message', 'Chưa xác định vai trò');
        }

        $uesr = NguoiDung::find($id);
        $uesr->update($data);
        return redirect()->route("admin.user.edit", $id)
            ->with('message', 'Thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $uesr = NguoiDung::find($id);
        $uesr->delete();
        return redirect()->route('admin.user.index')->with('message','Thành công');
    }
    public function testData()
    {

        $users = NguoiDung::with('vaitro')
            ->orderBy('id', 'DESC')
            ->get();
        return $users;
    }
}
