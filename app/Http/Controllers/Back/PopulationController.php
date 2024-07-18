<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Population;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PopulationController extends Controller
{
    public function verified_document($id){

        $id = decrypt($id);

        $population = Population::findOrFail($id);

        $data = [
            'population' => $population,
        ];

        return view('back.print.verified-document', $data);
    }

    public function unverified()
    {
        if (Auth::user()->role_id === 1) {

            $unverified = Population::whereNot('residence_status', 3)->get();
        } else {

            $unverified = Population::whereNot('residence_status', 3)->where('enhancer', Auth::user()->id)->get();
        }

        // dd($unverified);

        $data = [
            'title' => 'Kependudukan',
            'page' => 'unverified',
            'unverified' => $unverified,
        ];

        return view('back.data.unverified-populations', $data);
    }

    public function verified()
    {
        if (Auth::user()->role_id === 1) {

            $unverified = Population::where('residence_status', 3)->get();
        } else {

            $unverified = Population::where('residence_status', 3)->where('enhancer', Auth::user()->id)->get();
        }

        // dd($unverified);

        $data = [
            'title' => 'Kependudukan',
            'page' => 'verified',
            'unverified' => $unverified,
        ];

        return view('back.data.unverified-populations', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Kependudukan',
            'page' => 'create'
        ];

        return view('back.form.unverified-populations', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nik_kk' => 'required|string|max:20',
            'gender' => 'required|in:laki-laki,perempuan',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'family_card' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $familyCardPath = $request->file('family_card')->store('upload/kartu_keluarga', 'public');

        $population = new Population;
        $population->enhancer = Auth::user()->id;
        $population->name = $validatedData['name'];
        $population->nik_kk = $validatedData['nik_kk'];
        $population->gender = $validatedData['gender'];
        $population->birth_place = $validatedData['birth_place'];
        $population->birth_date = $validatedData['birth_date'];
        $population->religion = $validatedData['religion'];
        $population->marital_status = $validatedData['marital_status'];
        $population->job = $validatedData['job'];
        $population->phone = $validatedData['phone'];
        $population->address = $validatedData['address'];
        $population->family_card = $familyCardPath;
        $population->residence_status = 0;

        $population->save();

        return redirect()->route('populations.unverified.index')->with('success', 'Berhasil Mengajukan Kependudukan.');
    }

    public function edit($id)
    {
        $population = Population::findOrFail(decrypt($id));

        // dd($population->residence_status);

        if ($population->residence_status === 1) {

            $rejection = 'disabled';
        } else {

            $rejection = '';
        }

        $data = [
            'title' => 'Kependudukan',
            'page' => 'edit',
            'population' => $population,
            'rejection' => $rejection
        ];

        return view('back.form.unverified-populations', $data);
    }

    public function verify(Request $request, $id)
    {
        $id = decrypt($id);

        $request->validate([
            'residence_status' => 'required|in:1,2,3',
            'notes' => 'required|string',
        ]);

        $populations_count = Population::whereNot('id', $id)->count();

        // dd($populations_count);

        $population = Population::findOrFail($id);

        $population->residence_status = $request->residence_status;
        $population->notes = $request->notes;

        if ($request->residence_status == 3) {
            $population->qr_code = QrCode::size(200)->generate(url('') . '/populations/verified_document/' . encrypt($population->id));
        }
        $population->nik = $populations_count + 1;

        $population->save();

        return redirect()->route('populations.unverified.index')->with('success', 'Verifikasi Berhasil.');
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());

        $id = decrypt($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'nik_kk' => 'required|string|max:20',
            'gender' => 'required|in:laki-laki,perempuan',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'family_card' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $population = Population::findOrFail($id);


        $population->enhancer = Auth::user()->id;
        $population->name = $request->name;
        $population->nik_kk = $request->nik_kk;
        $population->gender = $request->gender;
        $population->birth_place = $request->birth_place;
        $population->birth_date = $request->birth_date;
        $population->religion = $request->religion;
        $population->marital_status = $request->marital_status;
        $population->job = $request->job;
        $population->phone = $request->phone;
        $population->address = $request->address;
        if ($request->hasFile('family_card')) {

            $familyCardPath = $request->file('family_card')->store('upload/kartu_keluarga', 'public');
            $population->family_card = $familyCardPath;
        }
        $population->residence_status = 0;

        $population->save();

        return redirect()->route('populations.unverified.index')->with('success', 'Berhasil Mengajukan Kependudukan.');
    }

    public function destroy($id)
    {

        $id = decrypt($id);
        $population = Population::findOrFail($id);
        $population->delete();

        return redirect()->route('populations.unverified.index')->with('success', 'Pengajuan Berhasil Dihapus .');
    }
}
