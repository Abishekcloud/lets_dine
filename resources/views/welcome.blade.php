<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title> Admin | Login</title>


    <link rel="icon" type="image/x-icon" href="{{ asset('storage/app/public/ecommerce/' . ($icon ?? 'default-icon.png')) }}">

    <link rel="shortcut icon" href="#">

    <link rel="stylesheet" href="{{asset('assets/admin/css/font/open-sans.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/icon-set/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/theme.minc619.css?v=2.0')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/toastr.css')}}">
</head>

<body>
<main id="content" role="main" class="main">
    <div class="d-flex flex-column flex-md-row min-vh-100">
        <div class="d-none d-md-flex justify-content-center flex-grow-1 bg-light login-bg-box" data-bg-img="{{asset('assets/admin/img/login_bg.png')}}">
            <div class="login-left-content p-3">
                <a class="d-flex mb-4" href="javascript:">
                    <img class="z-index-2 height-60px" src="" alt="Image Description">
                </a>

                <h3 class="mb-0">Your <br/> All Service</h3>
                <h2 class="text-primary font-weight-bold">in one field....</h2>
            </div>
        </div>
        <div class="flex-grow-1 bg-white d-flex justify-content-center">
            <div class="card-content-wrap pb-5 pb-md-0">
                <div class="card-body">
                    <div class="software-version d-flex justify-content-end">
                        <label class="badge badge-soft-success __login-badge text-primary">Software version : {{ env('SOFTWARE_VERSION')}}</label>
                    </div>

                    <form id="form-id" action="{{route('admin.login')}}" method="post">
                        @csrf

                        <div>
                            <div class="mb-5">
                                <h3 class="display-4"> sign_in</h3>
                                <p>want to login your branches
                                    ?
                                    <a href="{{route('branch.login')}}">
                                        branch login
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="js-form-message form-group">
                            <label class="input-label text-capitalize" for="signinSrEmail">your email</label>

                            <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail"
                                   tabindex="1" placeholder="email@address.com" aria-label="email@address.com"
                                   required data-msg="Please enter a valid email address.">
                        </div>

                        <div class="js-form-message form-group">
                            <label class="input-label" for="signupSrPassword" tabindex="0">
                                <span class="d-flex justify-content-between align-items-center">
                                    password
                                </span>
                            </label>

                            <div class="input-group input-group-merge">
                                <input type="password" class="js-toggle-password form-control form-control-lg"
                                       name="password" id="signupSrPassword" placeholder="8+ characters required"
                                       aria-label="8+ characters required" required
                                       data-msg="Your password is invalid. Please try again."
                                       data-hs-toggle-password-options='{
                                           "target": "#changePassTarget",
                                           "defaultClass": "tio-hidden-outlined",
                                           "showClass": "tio-visible-outlined",
                                           "classChangeTarget": "#changePassIcon"
                                       }'>
                                <div id="changePassTarget" class="input-group-append">
                                    <a class="input-group-text" href="javascript:">
                                        <i id="changePassIcon" class="tio-visible-outlined"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="remember">
                                <label class="custom-control-label text-muted" for="termsCheckbox">
                                    remember me
                                </label>
                            </div>
                        </div>

                        {{-- <div class="mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control form-control-lg" name="default_captcha_value" value=""
                                           placeholder="{{__('messages.Enter captcha value')}}" autocomplete="off">
                                </div>
                                <div class="col-6">
                                    <a>
                                        <img src="{{ captcha_src() }}" class="input-field rounded h-54px" id="default_recaptcha_id" alt="{{ __('messages.image') }}">
                                        <i class="tio-refresh icon" onclick="refreshCaptcha()"></i>
                                    </a>
                                </div>
                            </div>
                        </div> --}}

                        <button type="submit" class="btn btn-block btn-primary">sign_in</button>
                    </form>

                    @if(env('APP_MODE')=='demo')
                        <div class="login-footer d-flex justify-content-between mt-4 border-top pt-3">
                            <div class="font-weight-medium">
                                <div>Email : admin@admin.com</div>
                                <div>Password : 12345678</div>
                            </div>
                            <button type="button" class="btn btn-primary login-copy" id="copyButton">
                                <i class="tio-copy"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{asset('assets/admin/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/admin/js/theme.min.js')}}"></script>
<script src="{{asset('assets/admin/js/toastr.js')}}"></script>
{{-- {!! Toastr::message() !!} --}}

@if ($errors->any())
    <script>
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif

<script>
    "use strict";

    $(document).on('ready', function () {
        $('.js-toggle-password').each(function () {
            new HSTogglePassword(this).init()
        });

        $('.js-validate').each(function () {
            $.HSCore.components.HSValidation.init($(this));
        });

        let $bgImg = $("[data-bg-img]");
        $bgImg.css("background-image", function () {
            return 'url("' + $(this).data("bg-img") + '")';
        }).removeAttr("data-bg-img").addClass("bg-img");
    });


    @if(env('APP_MODE')=='demo')
    function copy_cred() {
        $('#signinSrEmail').val('admin@admin.com');
        $('#signupSrPassword').val('12345678');
        toastr.success('Copied successfully!', 'Success!', {
            CloseButton: true,
            ProgressBar: true
        });
    }
    @endif
</script>

<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="{{asset('assets/admin/vendor/babel-polyfill/polyfill.min.js')}}"><\/script>');
</script>
</body>
</html>
