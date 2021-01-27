<nav class="navbar navbar-expand-md navbar-light nav-primary">
    @auth
    <div class="nav-item dropdown">
      <a class="navbar-brand " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{ asset(auth()->user()->profile->avatar) }}" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
      </a>
      <div class="dropdown-menu  text-right " aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('profile') }}">معلومات الحساب</a>
        <div class="dropdown-divider"></div>
        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#ching-avatar">تغيير الصورة الشخصة</button>
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ching-avatar">
                Launch demo modal
            </button> --}}
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('edit-profile', auth()->user()->id) }}">تعديل الحساب</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">تعديل كلمة السر</a>
        <div class="dropdown-divider"></div>
        {{-- <a class="dropdown-item" href="">تسجيل الخروج</a> --}}
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="dropdown-item" href="">تسجيل الخروج</button>
        </form>
      </div>
    </div>
    @endauth
    @guest
        <button type="button" class="btn btn-login mt-0" data-toggle="modal" data-target="#login-modal">
            تسجيل الدخول
            <i class="fas fa-user"></i>
        </button>
    @endguest
    <!--  -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item @if ($active_sidebar=='about') active @endif">
                <a class="nav-link" href="#">حول الموقع<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">الانجازات</a>
            </li>
            <li class="nav-item @if ($active_sidebar=='addsituation') active @endif">
                <a class="nav-link" href="{{ route('cases.create') }}">إضافة حالة</a>
            </li>
            <li class="nav-item @if ($active_sidebar=='situation') active @endif">
                {{-- situation --}}
                <a class="nav-link" href="{{ route('cases.index') }}">الحالات</a>
            </li>
            @auth
                @if (Auth::user()->isAdmin == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">لوحة التحكم</a>
                    </li>
                @endif
            @endauth
        </ul>
        <a class="navbar-brand" href="{{ route('home') }}">إعمار</a>
    </div>
</nav>

@auth
<!-- Modal -->
<div class="modal fade" id="ching-avatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
        <form action="{{ route('edit-image', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleFormControlFile1">إضافة صورة:</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="mx-auto">
                <button type="submit" class="btn btn-primary btn-block">حفظ</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endauth
