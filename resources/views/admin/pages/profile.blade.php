@extends('admin.layout.main')
@section('content')
    <div class="main-content position-relative max-height-vh-100 h-100">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Profile</p>
                                <button class="btn btn-primary btn-sm ms-auto">Edit</button>
                            </div>
                        </div>
                        <div class="card-body" style="min-height: 75vh">
                       
                            <div class="row">
                                <div class="col-md-6 pb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Họ tên</label>
                                        <input class="form-control" type="text" value="lucky.jesse">
                                    </div>
                                </div>
                                <div class="col-md-6 pb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email </label>
                                        <input class="form-control" type="email" value="jesse@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 pb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Số điện thoại</label>
                                        <input class="form-control" type="text" value="031234566">
                                    </div>
                                </div>
                                <div class="col-md-6 pb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Ngày sinh</label>
                                        <input class="form-control" type="date" value="2002-03-02">
                                    </div>
                                </div>
                            </div>
                         
                            <div class="row">
                                <div class="col-md-12 pb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Giới tính</label>
                                        <input class="form-control" type="text"
                                            value="Nam">
                                    </div>
                                </div>
                                <div class="col-md-12 pb-3">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input class="form-control" type="text" value="New York">
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>

        </div>
    </div>



@endsection