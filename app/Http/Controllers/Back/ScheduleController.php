<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedules::latest()->get();

        $data = [
            'title' => 'Agenda',
            'schedules' => $schedules
        ];

        return view('back.data.schedule', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Agenda',
            'page' => 'create'
        ];

        return view('back.form.schedule', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'address' => 'required|string',
        ]);

        Schedules::create([
            'enhancer' => Auth::user()->id,
            'title' => $validated['title'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('schedules.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    public function edit($id)
    {
        $schedule = Schedules::findOrFail(Crypt::decrypt($id));

        $data = [
            'title' => 'Edit Agenda',
            'schedule' => $schedule,
            'page' => 'edit'
        ];

        return view('back.form.schedule', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'address' => 'required|string',
        ]);

        $schedule = Schedules::findOrFail(Crypt::decrypt($id));

        $schedule->update([
            'enhancer' => Auth::user()->id,
            'title' => $validated['title'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('schedules.index')->with('success', 'Agenda berhasil diupdate');
    }

    public function destroy($id)
    {
        $schedule = Schedules::findOrFail(Crypt::decrypt($id));

        $schedule->delete();

        return redirect()->route('schedules.index');
    }

}
