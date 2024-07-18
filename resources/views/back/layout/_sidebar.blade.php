<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img src="{{ url('assets/icon.jpg') }}" style="height: 50px;width:150px;margin-left: -15px">
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Dasbor</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/overview') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Ikhtisar</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Layanan</h6>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Kependudukan</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('populations.unverified.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Belum Terverifikasi</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('populations.verified.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Terverifikasi</span></a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_id === 1)
                        <li class="nk-menu-item">
                            <a href="{{ route('users.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                                <span class="nk-menu-text">Pengguna</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('questions.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-question"></em></span>
                                <span class="nk-menu-text">Pertanyaan</span>
                            </a>
                        </li>
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Halaman Website</h6>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('news.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-template"></em></span>
                                <span class="nk-menu-text">Berita</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('galleries.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-img"></em></span>
                                <span class="nk-menu-text">Galeri</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('schedules.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-calendar-alt"></em></span>
                                <span class="nk-menu-text">Agenda</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
