@extends('admin.layout.main')
@section('content')
    <div class="main-content position-relative max-height-vh-100 h-100">

        <div class="container-fluid py-4">
            <div class="row">
                @if(session('message'))
                    <div class="col-md-12">
                        <div class="col-md-12 alert alert-info" role="alert">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    </div>

                @endif
                <form action="{{route("admin.user.update", $uesr->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <a href="{{route("admin.$title.index")}}">
                                        <p class="mb-0"><i class="fa-solid fa-chevron-left"></i>Tài khoản</p>
                                    </a>

                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Cập nhật</button>
                                </div>
                            </div>
                            <div class="card-body" style="height: 75vh">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Họ tên</label>
                                            <input class="form-control" type="text" value="{{$uesr->ho_ten}}" name="ho_ten">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input class="form-control" type="email" value="{{$uesr->email}}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Số điện thoại</label>
                                            <input class="form-control" type="text" value="{{$uesr->so_dien_thoai}}"
                                                name="so_dien_thoai">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Ngày sinh</label>
                                            <input class="form-control" type="date" value="{{$uesr->ngay_sinh}}"
                                                name="ngay_sinh">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Địa chỉ</label>
                                            <input class="form-control" type="text" value="{{$uesr->dia_chi}}"
                                                name="dia_chi">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Giới tính</label>
                                            <select name="gioi_tinh" id="" class="form-control">
                                                <option hidden value="{{$uesr->gioi_tinh}}">{{$uesr->gioi_tinh}}</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Vai trò</label>
                                            <select name="vai_tro_id" id="" class="form-control">
                                                <option hidden value="{{$uesr->vai_tro_id}}">
                                                    {{ucfirst($uesr->vaitro->name)}}
                                                </option>
                                                @foreach ($roles as $role)
                                                    @if ($role->id == 3 || $role->id == 4)
                                                        <option disabled value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Trạng thái</label>
                                            <select name="trang_thai" id="" class="form-control">
                                                <option hidden value="{{$uesr->trang_thai}}">
                                                    @if($uesr->trang_thai == 1) Kích hoạt @else Chưa kích hoạt @endif
                                                </option>
                                                <option value="1">Kích hoạt</option>
                                                <option value="0">Chưa kích hoạt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>


@endsection