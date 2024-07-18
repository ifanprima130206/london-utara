@extends('back.layout._main')

@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Setting</h3>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                                class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('setting.index') }}" class="btn btn-primary">
                                        <em class="icon ni ni-arrow-left"></em>
                                        <span>Kembali</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">
                    <form action="{{ route('setting.update', $setting->id) }}" method="POST">
                        @csrf
                        <div class="row g-gs"><
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="site_name">Site Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="site_name" name="site_name"
                                            value="{{ $setting->site_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="site_description">Site Description</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="site_description"
                                            name="site_description" value="{{ $setting->site_description }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="site_keywords">Site Keywords</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="site_keywords"
                                            name="site_keywords" value="{{ $setting->site_keywords }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="site_author">Site Author</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="site_author" name="site_author"
                                            value="{{ $setting->site_author }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="site_email">Site Email</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="site_email" name="site_email"
                                            value="{{ $setting->site_email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="site_phone">Site Phone</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="site_phone" name="site_phone"
                                            value="{{ $setting->site_phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection