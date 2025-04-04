<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
  id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
      target="_blank">
      <img src="{{asset('argon-dashboard-master/assets/img/logo-ct-dark.png')}}" width="26px" height="26px"
        class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Creative Tim</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Bảng điều khiển</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.giangvien.index')}}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-chalkboard-user fa-2xl" style="color: #000000;"></i>
          </div>
          <span class="nav-link-text ms-1">Giảng viên</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.sinhvien.index')}}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-graduation-cap fa-2xl" style="color: #000000;"></i>
          </div>
          <span class="nav-link-text ms-1">Sinh viên</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{route("admin.user.index")}}">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-users fa-2xl" style="color: #000000;"></i>
          </div>
          <span class="nav-link-text ms-1">Tài khoản</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-martini-glass-empty fa-2xl" style="color: #000000;"></i>
          </div>
          <span class="nav-link-text ms-1">Lớp học</span>
        </a>
      </li>

      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Trang tài khoản</h6>
      </li>
      <li class="nav-item">
        @if (session()->has('nguoi_dung'))
            <a class="nav-link" href="javascript:void(0);">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ session('nguoi_dung.ho_ten') }}</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center ps-4">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger mt-2">
                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Đăng xuất
                </button>
            </form>
        @else
            <a class="nav-link" href="{{ route('login') }}">
                <div
                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-arrow-right-from-bracket" style="color: #000000; font-size: 1em;"></i>
                </div>
                <span class="nav-link-text ms-1">Đăng nhập</span>
            </a>
        @endif
    </li>
    </ul>
  </div>

</aside>