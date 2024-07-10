<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newses = News::latest()->get();

        $data = [
            'title' => 'Berita',
            'newses' => $newses
        ];
        
    }
}
