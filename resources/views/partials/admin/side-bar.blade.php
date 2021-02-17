<div class="admin-side-bar col-3 p-0 m-0">
    <div class="admin-info">
        <img src="{{ asset('img/08.jpg ') }}" alt="" class="bg-img">
        <img src="
                @if (auth()->user()->profile->avatar == null) img/user.png
    @else
        {{-- auth()->user()->profile->avatar --}}
        {{ asset(auth()->user()->profile->avatar) }} @endif
        " alt="">
        <h4>{{ auth()->user()->name }}</h4>
        <p class="m-0">{{ auth()->user()->email }}</p>
    </div>
    <div class="admin-link">
        <a href="{{ route('admin.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='main' ) active @endif">
            <i class="fab fa-facebook-square align-self-center"></i>
            <p class="align-self-center">الصفحة الرئيسية</p>
        </a>
        <a href="{{ route('achievments') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='achievments' ) active @endif">
            <i class="fab fa-facebook-square align-self-center"></i>
            <p class="align-self-center">الانجازات</p>
        </a>
        <a href="{{ route('admin.message.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='admin-message' ) active @endif">
            <i class="fab fa-facebook-square align-self-center"></i>
            <p class="align-self-center">الرسائل</p>
        </a>
        <a href="{{ route('admin.joinus.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='joinus' ) active @endif">
            <i class="fab fa-facebook-square align-self-center"></i>
            <p class="align-self-center">أنضم الينا</p>
        </a>
        <a href="{{ route('admin.situation.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='Situation' ) active @endif">
            <i class="fab fa-facebook-square align-self-center"></i>
            <p class="align-self-center">الحالات</p>
        </a>
        <a href="{{ route('admin.gift.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='gift' ) active @endif">
            <i class="fab fa-facebook-square align-self-center"></i>
            <p class="align-self-center">التبرعات</p>
        </a>
        <a href="{{ route('admin.users.index') }}" class="d-flex flex-row-reverse @if ($active_sidebar=='users' ) active @endif">
            <i class="fab fa-facebook-square align-self-center"></i>
            <p class="align-self-center">الاعظاء</p>
        </a>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="d-flex flex-row-reverse">
                <i class="fab fa-facebook-square align-self-center"></i>
                <p class="align-self-center">تسجيل الخروج</p>
            </button>
        </form>
    </div>
</div>
