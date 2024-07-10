@extends('back.layout._main')

@section('content')
    <h4 class="my-4">{{ $title }}</h4>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form method="post"
                action="{{ $page === 'create' ? route('news.store') : route('news.update', Crypt::encrypt($news->id)) }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs p-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" autocomplete="off" value="{{ old('title', $news->title ?? '') }}"
                                    required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" autocomplete="off" value="{{ old('image', $news->image ?? '') }}"
                                    required>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <div class="form-control-wrap">
                                <input id="description" type="hidden" name="description" class="@error('description') is-invalid @enderror" value="{!! old('description', $news->description ?? '') !!}">
                                <trix-editor input="description"></trix-editor>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tag" class="form-label">Tag</label>
                            <div class="form-control-wrap">
                                <select name="tag[]" class="form-select js-select2 @error('tag') is-invalid @enderror" data-search="on" multiple required>
                                    <option value="news" {{ old('tag', $news->tag ?? '') == 'news' ? 'selected' : '' }}>
                                        News</option>
                                    <option value="announcement"
                                        {{ old('tag', $news->tag ?? '') == 'announcement' ? 'selected' : '' }}>
                                        Announcement</option>
                                    <option value="update"
                                        {{ old('tag', $news->tag ?? '') == 'update' ? 'selected' : '' }}>Update</option>
                                </select>
                                @error('tag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
