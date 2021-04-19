<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="_token" content="{{csrf_token()}}">
    <title>Panel</title>
    <link rel="stylesheet" href="/panel/css/style.css?v={{uniqid()}}">
    <link rel="stylesheet" href="/panel/css/responsive_991.css" media="(max-width:991px)">
    <link rel="stylesheet" href="/panel/css/responsive_768.css" media="(max-width:768px)">
    <link rel="stylesheet" href="/panel/css/font.css">
    <link rel="stylesheet" href="/panel/css/toast-plugin.css">
    @yield('css')
</head>
<body>

<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href="https://webamooz.net"></a>
    <form action="{{route('user.profileImage')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="profile__info border cursor-pointer text-center">

            <div class="avatar__img"><img  src="@if(is_object(auth()->user()->image))
                {{auth()->user()->image->thumb}}
                @else /panel/img/pro.jpg
            @endif

                    " class="avatar___img">
                <input onchange="this.form.submit()" name="image" type="file" accept="image/*" class="hidden avatar-img__input">
                <div class="v-dialog__container" style="display: block;"></div>
                <div class="box__camera default__avatar"></div>
            </div>
            <span class="profile__name">کاربر : {{auth()->user()->name}}</span>
        </div>
    </form>


    <ul>

{{--        <li class="item-li i-courses "><a href="courses.html">دوره ها</a></li>--}}
{{--        <li class="item-li i-users"><a href="users.html"> کاربران</a></li>--}}
        @foreach(config('sidebar.items') as $sidebarItem)
        <li class="item-li {{$sidebarItem['icon']}} @if(request()->url() == $sidebarItem['url']) is-active @endif"><a href="{{$sidebarItem['url']}}">{{$sidebarItem['title']}}</a></li>
        @endforeach
{{--        <li class="item-li i-slideshow"><a href="slideshow.html">اسلایدشو</a></li>--}}
{{--        <li class="item-li i-banners"><a href="banners.html">بنر ها</a></li>--}}
{{--        <li class="item-li i-articles"><a href="articles.html">مقالات</a></li>--}}
{{--        <li class="item-li i-ads"><a href="ads.html">تبلیغات</a></li>--}}
{{--        <li class="item-li i-comments"><a href="comments.html"> نظرات</a></li>--}}
{{--        <li class="item-li i-tickets"><a href="tickets.html"> تیکت ها</a></li>--}}
{{--        <li class="item-li i-discounts"><a href="discounts.html">تخفیف ها</a></li>--}}
{{--        <li class="item-li i-transactions"><a href="transactions.html">تراکنش ها</a></li>--}}
{{--        <li class="item-li i-checkouts"><a href="checkouts.html">تسویه حساب ها</a></li>--}}
{{--        <li class="item-li i-checkout__request "><a href="checkout-request.html">درخواست تسویه </a></li>--}}
{{--        <li class="item-li i-my__purchases"><a href="mypurchases.html">خرید های من</a></li>--}}
{{--        <li class="item-li i-my__peyments"><a href="mypeyments.html">پرداخت های من</a></li>--}}
{{--        <li class="item-li i-notification__management"><a href="notification-management.html">مدیریت اطلاع رسانی</a>--}}
{{--        </li>--}}
{{--        <li class="item-li i-user__inforamtion"><a href="user-information.html">اطلاعات کاربری</a></li>--}}
    </ul>

</div>
<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            <a class="header__logo" href="https://webamooz.net"></a>
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">
            <span class="account-balance font-size-12">موجودی : 2500,000 تومان</span>
            <div class="notification margin-15">
                <a class="notification__icon"></a>
                <div class="dropdown__notification">
                    <div class="content__notification">
                        <span class="font-size-13">موردی برای نمایش وجود ندارد</span>
                    </div>
                </div>
            </div>
            <form action="{{route('logout')}}" method="post" id="logout">
                @csrf
                <a href="" onclick="event.preventDefault();document.getElementById('logout').submit()" class="logout" title="خروج"></a>

            </form>
        </div>
    </div>


@yield('content')
</div>
</body>
<script src="/panel/js/jquery-3.4.1.min.js"></script>
<script src="/panel/js/toast-plugin.js"></script>
<script src="/panel/js/js.js"></script>

</html>
