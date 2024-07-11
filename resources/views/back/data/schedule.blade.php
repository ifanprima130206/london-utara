@extends('back.layout._main')

@section('content')

    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('schedules.create') }}" class="btn btn-primary">Buat Agenda</a>
    </div>

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penulis</th>
                        <th>Judul</th>
                        <th>Lokasi</th>
                        <th>Waktu</th>
                        <th>Tanggal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->user->name }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ \Carbon\Carbon::parse($value->start_time)->format('H:i') }} - 
                                {{ \Carbon\Carbon::parse($value->end_time)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($value->date)->locale("id")->translatedFormat('l, d F Y') }}</td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a class="btn btn-sm" href="#" type="button"
                                        data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                    <div class="dropdown-menu">
                                        <ul class="link-list-opt">
                                            <li>
                                                <a href="{{ route('schedules.edit', Crypt::encrypt($value->id)) }}"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                            </li>
                                            <li>
                                                <a onclick="deleteUser('{{ route('schedules.destroy', Crypt::encrypt($value->id)) }}')"><em class="icon ni ni-trash"></em><span>Hapus</span></a>
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
