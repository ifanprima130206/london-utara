<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit($id){

        $id = decrypt($id);

        $website = Setting::find($id);

        $data = [
            'title' => 'Pengaturan Website',
            'website' => $website
        ];

        return view('back.form.setting', $data);
    }
}
