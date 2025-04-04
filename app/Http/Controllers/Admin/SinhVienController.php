<?php

namespace App\Http\Controllers\Admin;

use App\Models\SinhVien;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $sinhviens = SinhVien::with('nguoidung')->get();
        return view(
            'admin.pages.sinhvien',
            compact('sinhviens')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $uesr = NguoiDung::find($id);
        $uesr->delete();
        return redirect()->route('admin.sinhvien.index')->with('message','Thành công');
    
    }
}
