@extends('back.layout._main')

@section('content')
    <h4 class="my-4">{{ $title }}</h4>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form method="post"
                action="{{ $page === 'create' ? route('galleries.store') : route('galleries.update', Crypt::encrypt($gallery->id)) }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs p-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" autocomplete="off" value="{{ old('title', $gallery->title ?? '') }}"
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
                                    name="image" autocomplete="off" value="{{ old('image', $gallery->image ?? '') }}"
                                    >
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
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $gallery->description ?? '') }}</textarea>
                                @error('description')
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
