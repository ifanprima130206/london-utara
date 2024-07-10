<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="{{ url('/') }}">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ url('assets/back') }}/images/favicon.png">
    <title>{{ $title ?? 'London Utara' }}</title>
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
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <h4>London Utara</h4>
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Masuk</h5>
                                        <div class="nk-block-des">
                                            <p>Akses dashboard menggunakan email dan password anda.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="{{ route('auth.store_login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" name="email"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                id="default-01" placeholder="Masukkan Email Anda">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            <a class="link link-primary link-sm" tabindex="-1"
                                                href="html/pages/auths/auth-reset-v3.html">Lupa Password?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#"
                                                class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="Masukkan Password Anda">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            {!! htmlFormSnippet() !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Masuk</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 pt-4"> Belum punya akun? <a
                                        href="html/pages/auths/auth-register-v3.html">Daftar Sekarang</a>
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
