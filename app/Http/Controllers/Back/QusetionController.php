<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QusetionController extends Controller
{
    public function index()
    {
        $questions = Question::latest()->get();

        $data = [
            "title" => "Pertanyaan",
            "questions" => $questions
        ];

        return view('back.data.question', $data);
    }

    public function create()
    {
        $data = [
            "title" => "Buat Pertanyaan",
            "page" => "create"
        ];

        return view('back.form.question', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'choices' => 'required|array',
            'choices.*' => 'required|string|max:255',
        ]);

        $question = new Question();
        $question->enhancer = Auth::user()->id;
        $question->question = $request->question;
        $question->choices = json_encode($request->choices); // Simpan pilihan sebagai JSON
        $question->save();

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil dibuat');
    }

    public function edit($id)
    {
        $question = Question::findOrFail(decrypt($id));

        $data = [
            "title" => "Edit Pertanyaan",
            "page" => "edit",
            "question" => $question
        ];

        return view('back.form.question', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'choices' => 'required|array',
            'choices.*' => 'required|string|max:255',
        ]);

        $question = Question::findOrFail(decrypt($id));
        $question->question = $request->question;
        $question->choices = json_encode($request->choices); // Simpan pilihan sebagai JSON
        $question->save();

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail(decrypt($id));
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
