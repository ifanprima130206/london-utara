@extends('back.layout._main')

@section('content')
    <div class="flex justify-between items-center my-4">
        <h4>{{ $title }}</h4>

        @if (Auth::user()->role_id === 1)
            <a href="{{ Storage::url($population->family_card) }}" target="_blank" class="btn btn-primary">Lihat Kartu
                Keluarga</a>
        @endif
    </div>

    @if ($page == 'edit')
        @if ($population->notes && Auth::user()->role_id === 0)
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <form action="{{ route('populations.unverified.verify', Crypt::encrypt($population->id)) }}"
                        method="post">
                        @csrf
                        <div class="row g-gs p-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="notes" class="form-label">Catatan</label>
                                    <div class="form-control-wrap">
                                        <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes" rows="4"
                                            disabled required>{{ old('notes', $population->notes ?? '') }}</textarea>
                                        @error('notes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    @endif

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form method="post"
                action="{{ $page === 'create' ? route('populations.unverified.store') : route('populations.unverified.update', Crypt::encrypt($population->id)) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row g-gs p-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <div class="form-control-wrap">
                                <input type="text" id="name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    autocomplete="off" value="{{ old('name', $population->name ?? '') }}"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik_kk" class="form-label">NIK KK</label>
                            <div class="form-control-wrap">
                                <input type="number" id="nik_kk"
                                    class="form-control @error('nik_kk') is-invalid @enderror" name="nik_kk"
                                    autocomplete="off" value="{{ old('nik_kk', $population->nik_kk ?? '') }}"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                @error('nik_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->role_id === 0)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="family_card" class="form-label">Kartu Keluarga (File)</label>
                                <div class="form-control-wrap">
                                    <input type="file" id="family_card"
                                        class="form-control @error('family_card') is-invalid @enderror" name="family_card"
                                        {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                        {{ $page === 'create' ? 'required' : '' }}>
                                    @error('family_card')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <div class="form-control-wrap">
                                <select id="gender" class="form-select js-select2 @error('gender') is-invalid @enderror"
                                    data-search="onn" name="gender"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="perempuan"
                                        {{ old('gender', $population->gender ?? '') === 'perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                    <option value="laki-laki"
                                        {{ old('gender', $population->gender ?? '') === 'laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_place" class="form-label">Tempat Lahir</label>
                            <div class="form-control-wrap">
                                <input type="text" id="birth_place"
                                    class="form-control @error('birth_place') is-invalid @enderror" name="birth_place"
                                    autocomplete="off" value="{{ old('birth_place', $population->birth_place ?? '') }}"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                @error('birth_place')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_date" class="form-label">Tanggal Lahir</label>
                            <div class="form-control-wrap">
                                <input type="date" id="birth_date"
                                    class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                    value="{{ old('birth_date', $population->birth_date ?? '') }}"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                @error('birth_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="religion" class="form-label">Agama</label>
                            <div class="form-control-wrap">
                                <select id="religion"
                                    class="form-select js-select2 @error('religion') is-invalid @enderror"
                                    data-search="on" name="religion"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam"
                                        {{ old('religion', $population->religion ?? '') === 'Islam' ? 'selected' : '' }}>
                                        Islam
                                    </option>
                                    <option value="Kristen"
                                        {{ old('religion', $population->religion ?? '') === 'Kristen' ? 'selected' : '' }}>
                                        Kristen</option>
                                    <option value="Katolik"
                                        {{ old('religion', $population->religion ?? '') === 'Katolik' ? 'selected' : '' }}>
                                        Katolik</option>
                                    <option value="Hindu"
                                        {{ old('religion', $population->religion ?? '') === 'Hindu' ? 'selected' : '' }}>
                                        Hindu
                                    </option>
                                    <option value="Buddha"
                                        {{ old('religion', $population->religion ?? '') === 'Buddha' ? 'selected' : '' }}>
                                        Buddha
                                    </option>
                                    <option value="Konghucu"
                                        {{ old('religion', $population->religion ?? '') === 'Konghucu' ? 'selected' : '' }}>
                                        Konghucu</option>
                                    <option value="Kepercayaan"
                                        {{ old('religion', $population->religion ?? '') === 'Kepercayaan' ? 'selected' : '' }}>
                                        Kepercayaan</option>
                                    <option value="Lainnya"
                                        {{ old('religion', $population->religion ?? '') === 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                                @error('religion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="marital_status" class="form-label">Status Perkawinan</label>
                            <div class="form-control-wrap">
                                <select id="marital_status"
                                    class="form-select js-select2 @error('marital_status') is-invalid @enderror"
                                    name="marital_status" data-search="on"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                    <option value="">Pilih Status Perkawinan</option>
                                    <option value="Belum Kawin"
                                        {{ old('marital_status', $population->marital_status ?? '') === 'Belum Kawin' ? 'selected' : '' }}>
                                        Belum Kawin</option>
                                    <option value="Kawin"
                                        {{ old('marital_status', $population->marital_status ?? '') === 'Kawin' ? 'selected' : '' }}>
                                        Kawin</option>
                                    <option value="Cerai Hidup"
                                        {{ old('marital_status', $population->marital_status ?? '') === 'Cerai Hidup' ? 'selected' : '' }}>
                                        Cerai Hidup</option>
                                    <option value="Cerai Mati"
                                        {{ old('marital_status', $population->marital_status ?? '') === 'Cerai Mati' ? 'selected' : '' }}>
                                        Cerai Mati</option>
                                </select>
                                @error('marital_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="job" class="form-label">Pekerjaan</label>
                            <div class="form-control-wrap">
                                <input type="text" id="job"
                                    class="form-control @error('job') is-invalid @enderror" name="job"
                                    autocomplete="off" value="{{ old('job', $population->job ?? '') }}"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                @error('job')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <div class="form-control-wrap">
                                <input type="number" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    autocomplete="off" value="{{ old('phone', $population->phone ?? '') }}"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }}
                                    required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="form-label">Alamat</label>
                            <div class="form-control-wrap">
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" rows="4"
                                    {{ Auth::user()->role_id == 1 ? 'disabled' : '' }} required>{{ old('address', $population->address ?? '') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->role_id === 0)
                    <button type="submit" class="btn btn-primary mx-4">Simpan</button>
                @endif

            </form>
        </div>
    </div>

    @if (Auth::user()->role_id === 1)
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form action="{{ route('populations.unverified.verify', Crypt::encrypt($population->id)) }}"
                    method="post">
                    @csrf
                    <div class="row g-gs p-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="residence_status" class="form-label">Status</label>
                                <div class="form-control-wrap">
                                    <select id="residence_status"
                                        class="form-select js-select2 @error('residence_status') is-invalid @enderror"
                                        name="residence_status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="1">Ditolak</option>
                                        <option value="2">Perlu Perbaikan</option>
                                        <option value="3">Diverifikasi</option>
                                    </select>
                                    @error('residence_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notes" class="form-label">Catatan</label>
                                <div class="form-control-wrap">
                                    <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes" rows="4"
                                        required>{{ old('notes', $population->notes ?? '') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mx-4">Simpan</button>
                </form>
            </div>
        </div>
    @endif
@endsection
