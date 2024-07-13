@extends('back.layout._main')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-inner">
                    <div class="nk-wg7">
                        <div class="nk-wg7-stats">
                            <div class="text-start">
                                <span>Hari Ini</span>
                            </div>
                            <div class="text-end">
                                <div class="nk-wg7-title fs-4">
                                    {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l') }}</div>
                                <div class="number-lg fs-1">
                                    {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('j') }}
                                </div>
                                <div class="fs-6">{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->role_id == 1)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-inner">
                        <div class="nk-wg7">
                            <div class="nk-wg7-stats">
                                <div class="text-start">
                                    <span>Agenda Hari Ini</span>
                                </div>
                                <div class="text-end">
                                    <div class="nk-wg7-title fs-4">
                                        Jumlah
                                    </div>
                                    <div class="number-lg fs-1">
                                        {{ $schedules_now_count }}
                                    </div>
                                    <div class="fs-6">
                                        Lihat
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::user()->role_id == 1)
    </div>
    <div class="row g-gs">
        @endif
        <div class="col-md-6">
            <div class="card card-full overflow-hidden">
                <div class="nk-ecwg nk-ecwg7 h-100">
                    <div class="card-inner flex-grow-1">
                        <div class="card-title-group mb-4">
                            <div class="card-title">
                                <h6 class="title">Statistik Penduduk</h6>
                            </div>
                        </div>
                        <div class="nk-ecwg7-ck">
                            <canvas class="ecommerce-doughnut-s1" id="orderStatistics"></canvas>
                        </div>
                        <ul class="nk-ecwg7-legends">
                            <li>
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#13c9f2"></span>
                                    <span>Terverifikasi</span>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#ff82b7"></span>
                                    <span>Belum Terverifikasi</span>
                                </div>
                            </li>
                        </ul>
                    </div><!-- .card-inner -->
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        @if (Auth::user()->role_id == 1)
            <div class="col-xxl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="card-title-group mb-2">
                            <div class="card-title">
                                <h6 class="title">Statistik Website</h6>
                            </div>
                        </div>
                        <ul class="nk-store-statistics">
                            <li class="item">
                                <div class="info">
                                    <div class="title">Pengguna Aktif</div>
                                    <div class="count">{{ $users_count }}</div>
                                </div>
                                <em class="icon bg-primary-dim ni ni-users"></em>
                            </li>
                            <li class="item">
                                <div class="info">
                                    <div class="title">Berita</div>
                                    <div class="count">{{ $newses_count }}</div>
                                </div>
                                <em class="icon bg-info-dim ni ni-template"></em>
                            </li>
                            <li class="item">
                                <div class="info">
                                    <div class="title">Galeri</div>
                                    <div class="count">{{ $galleries_count }}</div>
                                </div>
                                <em class="icon bg-pink-dim ni ni-img"></em>
                            </li>
                            <li class="item">
                                <div class="info">
                                    <div class="title">Pertanyaan</div>
                                    <div class="count">0</div>
                                </div>
                                <em class="icon bg-purple-dim ni ni-question"></em>
                            </li>
                        </ul>
                    </div><!-- .card-inner -->
                </div><!-- .card -->
            </div><!-- .col -->
        @endif
    </div>
@endsection
