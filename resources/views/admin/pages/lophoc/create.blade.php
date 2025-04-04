@extends('admin.layout.main')
@section('content')
    <div class="main-content position-relative">

        <div class="container-fluid py-4">
            <div class="row" style="max-height: 680px;">

                <form action="{{route("admin.lophoc.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="height: 85vh">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Tạo lớp học</p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Tạo mới</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Mã lớp học</label>
                                            <input class="form-control" type="text" name="ma_lop_hoc">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Phòng học</label>
                                            <input class="form-control" type="text" name="phong_hoc">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Ca học</label>
                                            <input class="form-control" type="text" name="ca_hoc">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Thời gian học
                                                (Giờ)</label>
                                            <input class="form-control" type="number" name="thoi_gian_hoc">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Ngày bắt đầu</label>
                                            <input class="form-control" type="date" name="ngay_bat_dau">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Ngày kết thúc</label>
                                            <input class="form-control" type="date" name="ngay_ket_thuc">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Môn học</label>
                                            <select name="mon_hoc_id" id="" class="form-control">
                                                <option value="0" hidden>--Chọn môn học--</option>
                                                @foreach ($monhocs as $mon_hoc)
                                                    <option value="{{$mon_hoc->id}}">{{$mon_hoc->ten_mon_hoc}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Giảng viên</label>
                                            <select name="giang_vien_id" id="" class="form-control">
                                                <option value="0" hidden>--Chọn giảng viên--</option>
                                                @foreach ($giangviens as $giang_vien)
                                                    <option value="{{$giang_vien->id}}">{{$giang_vien->nguoidung->ho_ten}}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Chuyên ngành</label>
                                            <select name="chuyen_nganh" id="" class="form-control">
                                                <option value="0" hidden>--Chọn chuyên ngành--</option>
                                                <option value="Công nghệ thông tin">Công nghệ thông tin</option>
                                                <option value="Maketing">Maketing</option>
                                                <option value="Thiết kế đồ họa">Thiết kế đồ họa</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Số lượng</label>
                                            <input class="form-control" type="number" name="so_luong">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Sinh viên</label>

                                            <input type="text" class="form-control me-auto" id="sinhvienDaChon"
                                                placeholder="ID đã chọn..." name="sinh_vien_id" readonly>

                                        </div>
                                    </div>

                                </div>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#chonDuLieuModal">
                                    Thêm sinh viên
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="chonDuLieuModal" tabindex="-1" aria-labelledby="chonDuLieuLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chonDuLieuLabel">Chọn dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>

                <div class="modal-body">
                    <!-- Ô lọc -->
                    <input type="text" class="form-control mb-3" placeholder="Tìm kiếm sinh viên..." id="filterInput"
                        oninput="locDuLieu()">

                    <!-- Danh sách checkbox -->
                    <div style="max-height: 400px; overflow-y: auto;">
                        <div id="danhSachCheckbox">
                            @foreach ($sinhviens as $sinhvien)
                                <div class="form-check data-item">
                                    <input class="form-check-input" type="checkbox" name="sinhviens[]"
                                        value="{{ $sinhvien->id }}" id="data{{ $sinhvien->id }}">
                                    <label class="form-check-label" for="data{{ $sinhvien->id }}">
                                        {{ $sinhvien->ma_sinh_vien }}- {{$sinhvien->nguoidung->ho_ten}} -
                                        {{$sinhvien->chuyen_nganh}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- Ô hiển thị ID đã chọn -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-success" onclick="layDuLieu()">Chọn</button>
                </div>
            </div>
        </div>
    </div>




@endsection

<style>
    .create:hover {
        color: blue;
    }
</style>
<script>
    function locDuLieu() {
        const keyword = document.getElementById('filterInput').value.toLowerCase();
        const items = document.querySelectorAll('.data-item');

        items.forEach(item => {
            const text = item.innerText.toLowerCase();
            item.style.display = text.includes(keyword) ? 'block' : 'none';
        });
    }

    function layDuLieu() {
        const checked = document.querySelectorAll('.form-check-input:checked');
        const values = Array.from(checked).map(cb => cb.value);
        document.getElementById('sinhvienDaChon').value = values.join(', ');

        // Ẩn modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('chonDuLieuModal'));
        modal.hide();
    }
</script>