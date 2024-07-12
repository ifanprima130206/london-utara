@extends('back.layout._main')

@section('content')
    <h4 class="my-4">{{ $title }}</h4>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form method="post"
                action="{{ $page === 'create' ? route('users.store') : route('users.update', Crypt::encrypt($user->id)) }}">
                @csrf
                <div class="row g-gs p-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Nama</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" autocomplete="off" value="{{ old('name', $user->name ?? '') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" autocomplete="off" value="{{ old('email', $user->email ?? '') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Role</label>
                            <div class="form-control-wrap">
                                <select name="role_id" class="form-select js-select2 @error('role_id') is-invalid @enderror"
                                    id="role_id" data-search="on" required>
                                    <option value="" selected disabled>Pilih Role</option>
                                    <option value="1" {{ (old('role_id', $user->role_id ?? '') == '1') ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ (old('role_id', $user->role_id ?? '') == '0') ? 'selected' : '' }}>Masyarakat</option>
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <div class="form-control-wrap">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
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
