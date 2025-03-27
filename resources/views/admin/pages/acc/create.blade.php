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
                <form action="{{route("admin.user.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <a href="{{route("admin.user.index")}}" class="create">
                                        <p class="mb-0"><i class="fa-solid fa-chevron-left"></i> Thêm mới tài khoản</p>
                                    </a>

                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Tạo mới</button>
                                </div>
                            </div>

                            <div class="card-body" style="height: 75vh">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Họ tên</label>
                                            <input class="form-control" type="text" name="ho_ten" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input class="form-control" type="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Số điện thoại</label>
                                            <input class="form-control" type="text" name="so_dien_thoai" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Ngày sinh</label>
                                            <input class="form-control" type="date" name="ngay_sinh" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Địa chỉ</label>
                                            <input class="form-control" type="text" name="dia_chi" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Giới tính</label>
                                            <select name="gioi_tinh" id="" class="form-control">
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Vai trò</label>
                                            <select name="vai_tro_id" id="" class="form-control" onchange="vaitro(value)">
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="chuyen__nghanh"></div>
                                    <template id="templateChuyenNganh">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Chuyên
                                                nghành</label>
                                            <select name="chuyen_nganh" id="" class="form-control">
                                                <option value="Công nghệ thông tin">Công nghệ thông tin</option>
                                                <option value="Maketing">Maketing</option>
                                                <option value="Thiết kế đồ họa">Thiết kế đồ họa</option>
                                            </select>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>


@endsection

<style>
    .create:hover {
        color: blue;
    }

    input {
        border: 2px solid gray;
        outline: none;
    }

    /* Viền đỏ khi input trống sau khi bấm "Gửi" */
    .error {
        border: 2px solid red !important;
    }

    /* Viền xanh khi nhập đúng */
    .valid {
        border: 2px solid green !important;
    }
</style>
<script>

    function vaitro(value) {
        let chuyenNganh = document.getElementById("chuyen__nghanh");
        chuyenNganh.innerHTML = "";

        if (value != 2 && value != 1) {
            let template = document.getElementById("templateChuyenNganh");
            let clone = template.content.cloneNode(true);
            chuyenNganh.appendChild(clone);
        }
    }

 
</script>