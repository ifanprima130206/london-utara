@extends('back.layout._main')

@section('content')
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('questions.create') }}" class="btn btn-primary">Tambah Pertanyaan</a>
    </div>

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penulis</th>
                        <th>Pertanyaan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $key => $question)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $question->user->name }}</td>
                            <td>{{ $question->question }}</td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a class="btn btn-sm" href="#" type="button" data-bs-toggle="dropdown"><em
                                            class="icon ni ni-more-v"></em></a>
                                    <div class="dropdown-menu">
                                        <ul class="link-list-opt">
                                            <li>
                                                <a href="javascript:void(0);" class="detail"
                                                    data-question="<?= $question->question ?>"
                                                    data-choice="<?= htmlspecialchars($question->choices) ?>">
                                                    <em class="icon ni ni-eye"></em>
                                                    <span>Lihat</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('questions.edit', Crypt::encrypt($question->id)) }}">
                                                    <em class="icon ni ni-edit"></em><span>Edit</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    onclick="deleteUser('{{ route('questions.destroy', Crypt::encrypt($question->id)) }}')">
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

    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail <?php echo $title; ?></h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="#" class="form-validate is-alter">
                        <div class="row g-gs">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Pertanyaan</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" placeholder="Pertanyaan" name="question"
                                            required disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="email">Pilihan</label>
                                    <div id="choices-container"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <a href="#" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                        Tutup
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on("click", ".detail", function(e) {

            e.preventDefault();
            let question = $(this).data("question");
            let choices = $(this).data("choice");

            $('#modal-detail input[name="question"]').val(question);

            $('#modal-detail #choices-container').empty();

            if (Array.isArray(choices)) {
                choices.forEach(function(choice, index) {
                    if (index === 0) {
                        $('#modal-detail #choices-container').append(`
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="${choice}" placeholder="Pilihan" name="choice[]" aria-label="Pilihan" aria-describedby="add-choice" disabled>
                </div>
            `);
                    } else {
                        $('#modal-detail #choices-container').append(`
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="${choice}" placeholder="Pilihan" name="choice[]" aria-label="Pilihan" aria-describedby="add-choice" disabled>
                </div>
            `);
                    }
                });
            } else {
                console.error("Data pilihan tidak valid");
            }

            $("#modal-detail").modal("show");
        });
    </script>
@endsection
