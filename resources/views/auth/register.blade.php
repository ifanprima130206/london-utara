<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ url('assets/back') }}/images/favicon.png">
    <!-- Page Title  -->
    <title>{{ $title ?? '' }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ url('assets/back') }}/css/dashlite.css?ver=3.0.3">
    <link id="skin-default" rel="stylesheet" href="{{ url('assets/back') }}/css/theme.css?ver=3.0.3">
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="{{ url('/') }}" class="logo-link">
                                        <h4>London Utara</h4>
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Daftar</h5>
                                        <div class="nk-block-des">
                                            <p>Buat akun website Kec. London Utara</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="{{ route('auth.store_register') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="name">Nama</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="name" placeholder="Masukan nama anda" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="email" placeholder="Masukan email anda" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Paassword</label>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" placeholder="Masukan password anda" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! htmlFormSnippet() !!}
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 pt-4"> Sudah punya akun ? <a href="{{ route('auth.login') }}"><strong>Login sekarang</strong></a>
                                </div>
                            </div>
                        </div>
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/back') }}/js/bundle.js?ver=3.0.3"></script>
    <script src="{{ url('assets/back') }}/js/scripts.js?ver=3.0.3"></script>

</html>