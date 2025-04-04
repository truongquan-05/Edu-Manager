<?php

namespace App\Http\Controllers\Admin;

use App\Models\LopHoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LopHocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.lophoc");
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
    public function show(LopHoc $lopHoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LopHoc $lopHoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LopHoc $lopHoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LopHoc $lopHoc)
    {
        //
    }
}
