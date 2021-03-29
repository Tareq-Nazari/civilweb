@extends('User::Front.master')

@section('content')
    <div class="account" style="display: flex;flex-flow: column">
        <a class="account-logo" href="/">
            <img src="/img/weblogo.png" alt="">
        </a>
                <div class="card-header">برای ورود به حسابتان ابتدا ایمیل خودرا تایید کنید</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            لینک فعال سازی برای شما ارسال شد
                        </div>
                    @endif


                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <h5>اگر لینک فعال سازی برای شما ارسال نشده است مجددا درخواست دهید</h5>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">ارسال مجدد لینک</button>.
                    </form>
                </div>
        <a href="/">بازگشت به صفحه اصلی</a>

</div>
@endsection
