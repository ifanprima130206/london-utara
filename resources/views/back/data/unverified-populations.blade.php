@extends('back.layout._main')

@section('content')
    @if (Auth::user()->role_id == 0)
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('populations.unverified.create') }}" class="btn btn-primary">Ajukan Kependudukan</a>
    </div>
    @endif

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK KK</th>
                        <th>Gender</th>
                        <th>Telepon</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unverified as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->user->name }}</td>
                            <td>{{ $value->nik_kk }}</td>
                            <td>
                                @if ($value->gender == "laki-laki")

                                    <span class="badge bg-primary">Laki-laki</span>
                                @else
                                
                                    <span class="badge bg-secondary">Perempuan</span>
                                @endif
                            </td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->address }}</td>
                            <td>
                                @if ($value->residence_status == 1)

                                    <span class="badge bg-danger">Ditolak</span>
                                @elseif ($value->residence_status == 2)
                                
                                    <span class="badge bg-warning">Perlu Perbaikan</span>
                                @else

                                    <span class="badge bg-primary">Menunngu</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a class="btn btn-sm" href="#" type="button"
                                        data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                    <div class="dropdown-menu">
                                        <ul class="link-list-opt">
                                            <li>
                                                <a href="{{ route('populations.unverified.edit', Crypt::encrypt($value->id)) }}"><em class="icon ni ni-edit"></em><span>{{ Auth::user()->role_id === 1 ? 'Verifikasi' : 'Edit' }}</span></a>
                                            </li>
                                            <li>
                                                <a onclick="deleteUser('{{ route('populations.unverified.destroy', Crypt::encrypt($value->id)) }}')"><em class="icon ni ni-trash"></em><span>Hapus</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
