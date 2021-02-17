<!-- Modal for login-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-center">
                    أعمار
                </h2>
                <p class="text-center">أهلاً بكم في صفحة تسجيل الدخول</p>
                <div>
                    <a href="{{ route('login-test', 'facebook') }}" class="d-flex btn btn-facebook">
                        <i class="fab fa-facebook-square align-self-center"></i>
                        <p class="align-self-center">الدخول بحساب الفيس بوك</p>
                    </a>
                    <a href="{{ route('login-test', 'google') }}" class="d-flex btn btn-google">
                        <i class="fab fa-google-plus-square align-self-center"></i>
                        <p class="align-self-center">الدخول بحساب كوكل</p>
                    </a>
                </div>
                <div class="line">
                    <div class="left"></div>
                    <p>أو</p>
                    <div class="right"></div>
                </div>
                <form id="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="loginInputEmail"
                            aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="loginInputPassword"
                            placeholder="Password">
                    </div>


                    <button id="login-submit" type="submit" class="btn btn-info mb-3">تسجيل الدخول</button>
                </form>

                <div class="d-block text-center ">
                    <a class="btn">هل نسيت كلمة السر؟</a>
                </div>

                <div class="d-block text-center ">
                    <p>ليس لديك حساب؟ <a href="{{ route('register') }}">أنشاء حساب</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
