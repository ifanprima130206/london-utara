@extends('back.layout._main')

@section('content')
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna</a>
    </div>

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>
                                @if ($value->role_id == 1)
                                    <span class="badge bg-primary">Admin</span>
                                @else
                                    <span class="badge bg-secondary">Masyarakat</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a class="btn btn-sm" href="#" type="button"
                                        data-bs-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                    <div class="dropdown-menu">
                                        <ul class="link-list-opt">
                                            <li><a href="{{ route('users.edit', Crypt::encrypt($value->id)) }}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                            <li><a onclick="deleteUser('{{ route('users.destroy', Crypt::encrypt($value->id)) }}')"><em class="icon ni ni-trash"></em><span>Hapus</span></a></li>
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

@section('script')
    <script>
        function deleteUser(url) {
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        showConfirmButton: true,
                        timer: false,
                    }).then(() => {
                        window.location.href = url;
                    });
                }
            });
        }
    </script>
@endsection
