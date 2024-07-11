@extends('back.layout._main')

@section('content')
    <h4 class="my-4">{{ $title }}</h4>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form method="post"
                action="{{ $page === 'create' ? route('schedules.store') : route('schedules.update', Crypt::encrypt($schedule->id)) }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs p-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="form-label">Judul</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" autocomplete="off" value="{{ old('title', $schedule->title ?? '') }}"
                                    required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date" class="form-label">Tanggal</label>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    name="date" autocomplete="off" value="{{ old('date', $schedule->date ?? '') }}"
                                    required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="start_time" class="form-label">Jam Mulai</label>
                            <div class="form-control-wrap">
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                    name="start_time" autocomplete="off" value="{{ old('start_time', $schedule->start_time ?? '') }}"
                                    required>
                                @error('start_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="end_time" class="form-label">Jam Mulai</label>
                            <div class="form-control-wrap">
                                <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                    name="end_time" autocomplete="off" value="{{ old('end_time', $schedule->end_time ?? '') }}"
                                    required>
                                @error('end_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address" class="form-label">Alamat</label>
                            <div class="form-control-wrap">
                                <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" required>{{ old('address', $schedule->address ?? '') }}</textarea>
                                @error('address')
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
