@extends('back.layout._main')

@section('content')
    <h4 class="my-4">{{ $title }}</h4>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form method="post"
                action="{{ $page === 'create' ? route('questions.store') : route('questions.update', isset($question) ? Crypt::encrypt($question->id) : '') }}"
                enctype="multipart/form-data">
                @csrf
                {{-- @if ($page === 'edit')
                    @method('PUT')
                @endif --}}
                <div class="row g-gs p-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="question" class="form-label">Pertanyaan</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('question') is-invalid @enderror"
                                    name="question" autocomplete="off" value="{{ old('question', $question->question ?? '') }}"
                                     required>
                                @error('question')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="choices" class="form-label">Pilihan</label>
                            <div id="choices-wrapper">
                                @if (old('choices', isset($question) ? json_decode($question->choices) : []))
                                    @foreach (old('choices', isset($question) ? json_decode($question->choices) : []) as $index => $choice)
                                        <div class="input-group mb-2" id="choice-{{ $index }}">
                                            <input type="text" class="form-control @error('choices.' . $index) is-invalid @enderror"
                                                name="choices[]" value="{{ $choice }}"  required>
                                            <button type="button" class="btn btn-danger remove-choice" data-index="{{ $index }}">Hapus</button>
                                            @error('choices.' . $index)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2" id="choice-0">
                                        <input type="text" class="form-control @error('choices.0') is-invalid @enderror"
                                            name="choices[]"  required>
                                        <button type="button" class="btn btn-danger remove-choice" data-index="0">Hapus</button>
                                        @error('choices.0')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-primary" id="add-choice">Tambah Pilihan</button>
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let choiceIndex = {{ count(old('choices', isset($question) ? json_decode($question->choices) : [''])) }};
            
            document.getElementById('add-choice').addEventListener('click', function () {
                const choicesWrapper = document.getElementById('choices-wrapper');
                const newChoice = document.createElement('div');
                newChoice.classList.add('input-group', 'mb-2');
                newChoice.id = `choice-${choiceIndex}`;
                newChoice.innerHTML = `
                    <input type="text" class="form-control" name="choices[]"  required>
                    <button type="button" class="btn btn-danger remove-choice" data-index="${choiceIndex}">Hapus</button>
                `;
                choicesWrapper.appendChild(newChoice);
                choiceIndex++;
            });

            document.getElementById('choices-wrapper').addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('remove-choice')) {
                    const index = e.target.getAttribute('data-index');
                    document.getElementById(`choice-${index}`).remove();
                }
            });
        });
    </script>
@endsection
