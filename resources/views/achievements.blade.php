@extends('layouts.app')

@php $active_sidebar = ''; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')

<section id="stores" class="stores">
    <div class="container">

        <h1 class="text-center h1-header">جديد فروعنا</h1>

        <div class="row justify-content-center mx-auto">
            <div class="story">
              <figure class="story-shape">
                <img src="{{ asset('img/04.jpg') }}" alt="" class="story-image">
              </figure>
              <div class="story-text">
                <h4 class="">مركز دجلة للأعمال الخيرية</h4>
                <p>هناك حقيقة مثبتة رئ عن الركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي تمحتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) </p>
              </div>
            </div>
        </div>
        <div class="row justify-content-center mx-auto">
            <div class="story">
              <figure class="story-shape">
                <img src="{{ asset('img/01.jpg') }}" alt="" class="story-image">
              </figure>
              <div class="story-text">
                <h4 class="">مركز دجلة للأعمال الخيرية</h4>
                <p>هناك حقيقة مثبتة رئ عن الركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي تمحتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) </p>
              </div>
            </div>
        </div>
        <div class="row justify-content-center mx-auto">
            <div class="story">
              <figure class="story-shape">
                <img src="{{ asset('img/02.jpg') }}" alt="" class="story-image">
              </figure>
              <div class="story-text">
                <h4 class="">مركز دجلة للأعمال الخيرية</h4>
                <p>هناك حقيقة مثبتة رئ عن الركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي تمحتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) </p>
              </div>
            </div>
        </div>
        <div class="row justify-content-center mx-auto">
            <div class="story">
              <figure class="story-shape">
                <img src="{{ asset('img/03.jpg') }}" alt="" class="story-image">
              </figure>
              <div class="story-text">
                <h4 class="">مركز دجلة للأعمال الخيرية</h4>
                <p>هناك حقيقة مثبتة رئ عن الركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي تمحتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) </p>
              </div>
            </div>
        </div>
    </div>

</section>

<section id="slider" class="">
  <h1 class="text-center h1-header">مشاريع تم انجازها</h1>
  <div class="regular slider">
      <div>
        <div class="card">
          <img src="{{ asset('img/05.jpg') }}" alt="" srcset="">
          <div class="card-body">
            <h4 class="text-center m-3">علي حيدر</h4>
            <p>
              هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ماركيز على الشكل الخارجي للنص
            </p>
          </div>
          <div class="card-footer">
            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
            <a href="" class="btn btn-info">المزيد</a>
          </div>
        </div>
      </div>
      <div>
        <div class="card">
          <img src="{{ asset('img/05.jpg') }}" alt="" srcset="">
          <div class="card-body">
            <h4 class="text-center m-3">علي حيدر</h4>
            <p>
              هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ماركيز على الشكل الخارجي للنص
            </p>
          </div>
          <div class="card-footer">
            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
            <a href="" class="btn btn-info">المزيد</a>
          </div>
        </div>
      </div>
      <div>
        <div class="card">
          <img src="{{ asset('img/05.jpg') }}" alt="" srcset="">
          <div class="card-body">
            <h4 class="text-center m-3">علي حيدر</h4>
            <p>
              هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ماركيز على الشكل الخارجي للنص
            </p>
          </div>
          <div class="card-footer">
            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
            <a href="" class="btn btn-info">المزيد</a>
          </div>
        </div>
      </div>
      <div>
        <div class="card">
          <img src="{{ asset('img/05.jpg') }}" alt="" srcset="">
          <div class="card-body">
            <h4 class="text-center m-3">علي حيدر</h4>
            <p>
              هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ماركيز على الشكل الخارجي للنص
            </p>
          </div>
          <div class="card-footer">
            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
            <a href="" class="btn btn-info">المزيد</a>
          </div>
        </div>
      </div>
      <div>
        <div class="card">
          <img src="{{ asset('img/05.jpg') }}" alt="" srcset="">
          <div class="card-body">
            <h4 class="text-center m-3">علي حيدر</h4>
            <p>
              هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ماركيز على الشكل الخارجي للنص
            </p>
          </div>
          <div class="card-footer">
            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
            <a href="" class="btn btn-info">المزيد</a>
          </div>
        </div>
      </div>
      <div>
        <div class="card">
          <img src="{{ asset('img/05.jpg') }}" alt="" srcset="">
          <div class="card-body">
            <h4 class="text-center m-3">علي حيدر</h4>
            <p>
              هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ماركيز على الشكل الخارجي للنص
            </p>
          </div>
          <div class="card-footer">
            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
            <a href="" class="btn btn-info">المزيد</a>
          </div>
        </div>
      </div>
  </div>
</section>

@endsection



@section('css')
<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
@endsection


@section('js')
<script src="{{ asset('js/slick.js') }}"></script>
<script>
	var width = $(window).width();
    if (width >= 1200) {
        $(".regular").slick({
            dots: false,
            infinite: true,
            accessibility:true,
            slidesToShow: 4,
            slidesToScroll: 1,
            focusOnSelect:false,
            focusOnChange:false,
            mobileFirst:false,
            rtl:false,
        });
        }else if(width >= 992 && width < 1200){
            $(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                focusOnSelect:false,
                focusOnChange:false,
                mobileFirst:false,
                rtl:false,
        });
        }else if(width >= 768 && width < 992){
            $(".regular").slick({
            dots: false,
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            focusOnSelect:false,
            focusOnChange:false,
            mobileFirst:false,
            rtl:false,
            });
        }else if(width < 768){
        $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        focusOnSelect:false,
        focusOnChange:false,
        mobileFirst:false,
        rtl:false,
        });
    }
    $(window).on('resize', function() {
        width = $(this).width();
        $(location).prop("href", location.href);
    });
  //location.reload();
</script>
@endsection
