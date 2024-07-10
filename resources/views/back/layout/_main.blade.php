<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    
    @include('back.layout._meta')

    @include('back.layout._css')

    @yield('style')

</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-main ">

            @include('back.layout._sidebar')

            <div class="nk-wrap ">

                @include('back.layout._header')

                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>

                @include('back.layout._footer')

            </div>
        </div>
    </div>
    
    @include('back.layout._js')

    @yield('script')

</body>

</html>