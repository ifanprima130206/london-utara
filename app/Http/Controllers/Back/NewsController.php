<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NewsController extends Controller
{
    public function index()
    {
        $newses = News::latest()->get();

        $data = [
            'title' => 'Berita',
            'newses' => $newses
        ];

        return view('back.data.news', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Berita',
            'page' => 'create'
        ];

        return view('back.form.news', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,svg,webp',
            'description' => 'required',
            'tag' => 'required',
        ]);

        
        $news = new News();
        $news->enhancer = Auth::user()->id;
        $news->title = $request->title;
        $news->image = $request->file('image')->store('upload/news', 'public');
        $news->description = $request->description;
        $news->viewers = 0;
        $news->tag = json_encode($request->tag);
        $news->save();

        return redirect()->route('news.index')->with('success', 'Berhasil Membuat Berita.');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $news = News::findOrFail($id);

        $data = [
            'title' => 'Berita',
            'page' => 'edit',
            'news' => $news
        ];

        return view('back.form.news', $data);
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
            'description' => 'required|string',
            'tag' => 'required',
        ]);

        $news->title = $request->title;
        $news->enhancer = Auth::user()->id;
        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('upload/news', 'public');
        }
        $news->description = $request->description;
        $news->tag = json_encode($request->tag);
        $news->save();

        // dd($news);

        return redirect()->route('news.index')->with('success', 'Berita Berhasil Dirubah.');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index');
    }
}
