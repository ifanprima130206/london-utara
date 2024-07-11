<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Gallery;
use App\Models\Back\News;
use App\Models\Back\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $newses_count = News::count();
        $galleries_count = Gallery::count();
        $users_count = User::count();
        
        $data = [
            'title' => 'Dashboard',
            'newses_count' => $newses_count,
            'galleries_count' => $galleries_count,
            'users_count' => $users_count
        ];

        return view('back.dashboard', $data);
    }
}
