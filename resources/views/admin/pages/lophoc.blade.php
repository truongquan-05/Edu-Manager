@extends('admin.layout.main')
@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between">
                        <div>
                            <h6 class="mb-0">Danh sách lớp học</h6>
                        </div>
                        <div>
                            <a href="" class="btn btn-primary">Create</a>
                        </div>
                    </div>

                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            @foreach ($lopHocs as $lophoc)
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">{{ $lophoc->ten_lop }}</h6>
                                        <span class="mb-2 text-xs">Mã Lớp Học: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{ $lophoc->ma_lop_hoc }}</span></span>
                                        <span class="mb-2 text-xs">Số Lượng: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $lophoc->so_luong }}</span></span>
                                        <span class="text-xs">Phòng Học: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $lophoc->phong_hoc }}</span></span>
                                        <span class="mb-2 text-xs">Giảng Viên: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $lophoc->giangVien->ma_giang_vien ?? 'N/A' }}</span></span>
                                        <span class="mb-2 text-xs">Môn Học: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $lophoc->mon_hoc_id }}</span></span>
                                        <span class="mb-2 text-xs">Ca học: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $lophoc->ca_hoc }}</span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <form action="{{ route('admin.lophoc.destroy', $lophoc->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Chắc chắn xóa?')" type="submit" class="border-0 bg-transparent text-danger">
                                                <i class="far fa-trash-alt me-2"></i>Delete
                                            </button>
                                        </form>
                                        <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.lophoc.edit', $lophoc->id) }}">
                                            <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="card-header pb-0 d-flex justify-content-between">
                                <div>
                                    <h6 class="mb-0">Danh sách môn học</h6>
                                </div>
                                <div>
                                    {{-- <a href="{{ route('monhoc.create') }}" class="btn btn-primary">Create</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                                        <span class="text-xs">Mã Môn</span>
                                    </div>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-dark px-2 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                                    <a class="btn btn-link text-danger text-gradient px-2 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                        <span class="text-xs">Mã Môn</span>
                                    </div>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-dark px-2 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                                    <a class="btn btn-link text-danger text-gradient px-2 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i></a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
