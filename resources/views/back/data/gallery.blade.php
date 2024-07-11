@extends('back.layout._main')

@section('content')
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('galleries.create') }}" class="btn btn-primary">Tambah Gambar</a>
    </div>

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penulis</th>
                        <th>Judul</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $key => $gallery)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $gallery->user->name }}</td>
                            <td>{{ $gallery->title }}</td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a class="btn btn-sm" href="#" type="button" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-more-v"></em>
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul class="link-list-opt">
                                            <li>
                                                <a href="#" class="view-image" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-image="{{ url('storage/' . $gallery->image) }}" data-title="{{ $gallery->title }}">
                                                    <em class="icon ni ni-eye"></em><span>Lihat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('galleries.edit', Crypt::encrypt($gallery->id)) }}">
                                                    <em class="icon ni ni-edit"></em><span>Edit</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    onclick="deleteGallery('{{ route('galleries.destroy', Crypt::encrypt($gallery->id)) }}')">
                                                    <em class="icon ni ni-trash"></em><span>Hapus</span>
                                                </a>
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

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="imagePreview" class="img-fluid" alt="Preview Image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('script')
    <script>
        $(document).ready(function() {
            $('.view-image').on('click', function(event) {
                event.preventDefault();
                var imageUrl = $(this).data('image');
                var imageTitle = $(this).data('title');
                $('#imagePreview').attr('src', imageUrl);
                $('#imageModalLabel').text(imageTitle);
            });
        });
    </script>
@endsection
