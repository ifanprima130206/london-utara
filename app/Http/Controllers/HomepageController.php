<?php

namespace App\Http\Controllers;

use App\Models\Back\Gallery;
use App\Models\Back\News;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(){

        $newses = News::latest()->limit(4)->get();
        $galleries = Gallery::latest()->limit(12)->get();

        $data = [
            'title' => 'Homepage',
            'newses' => $newses,
            'galleries' => $galleries
        ];

        return view('front.index', $data);
    }
}
