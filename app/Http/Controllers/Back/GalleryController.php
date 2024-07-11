<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('user')->latest()->get();

        // dd($galleries);

        $data = [
            'title' => 'Galeri',
            'galleries' => $galleries
        ];

        return view('back.data.gallery', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Galeri',
            'page' => 'create'
        ];

        return view('back.form.gallery', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,svg,webp',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $gallery = new Gallery();
        $gallery->enhancer = Auth::user()->id;
        $gallery->image = $request->file('image')->store('upload/gallery', 'public');
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $gallery = Gallery::findOrFail($id);

        $data = [
            'title' => 'Galeri',
            'page' => 'edit',
            'gallery' => $gallery
        ];

        return view('back.form.gallery', $data);
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $gallery->enhancer = Auth::user()->id;
        $gallery->title = $request->title;
        if ($request->hasFile('image')) {
            $gallery->image = $request->file('image')->store('upload/gallery', 'public');
        }
        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->route('galleries.index');
    }
}
