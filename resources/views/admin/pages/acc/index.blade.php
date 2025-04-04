@extends('admin.layout.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @if(session('message'))
                    <div class="col-md-12">
                        <div class="col-md-12 alert alert-info" role="alert">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    </div>

                @endif
                <div class="card mb-4" style="min-height: 680px;">
                    <div class="card-header pb-0">
                        <h6>Tài khoản chưa kích hoạt</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Họ tên</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Vai trò</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Số điện thoại</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Trạng thái</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ngày tạo</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            <a href="{{route('admin.user.create')}}" style="color: blue">Create</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$user->ho_ten}}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-sm bg-gradient-warning">{{$user->vaitro->name}}</span>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$user->so_dien_thoai}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($user->trang_thai == 0)
                                                    <span class="badge badge-sm bg-gradient-danger">
                                                        Chưa kích hoạt

                                                    </span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">
                                                        Kích hoạt
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'NULL' }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{route("admin.user.edit", $user->id)}}"
                                                    class="text-secondary font-weight-bold">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{route('admin.user.destroy', $user->id)}}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Chắc chắn xóa')" type="submit"
                                                        class="border-0 bg-transparent">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>


                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>



                    </div>
                    <div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection