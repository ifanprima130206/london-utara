<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="flex flex-col md:flex-row bg-white border border-gray-300 rounded-lg shadow-lg max-w-3xl">
            <img class="object-cover w-full md:w-2/5 h-48 md:h-auto" src="{{ Storage::url($population->image) }}" alt="Foto">
            <div class="p-6 md:w-3/5">
                <h5 class="text-xl font-bold text-gray-900">{{ $population->name }}</h5>
                <p class="text-sm text-gray-700 mt-1">NIK: XXXXXXXX{{ $population->nik }}</p>
                <p class="text-sm text-gray-700 mt-1">Alamat: {{ $population->address }}</p>
                <p class="text-sm text-gray-700 mt-1">Jenis Kelamin: {{ $population->gender }}</p>
                <p class="text-sm text-gray-700 mt-1">Tempat Lahir: {{ $population->birth_place }}</p>
                <p class="text-sm text-gray-700 mt-1">Tanggal Lahir: {{ $population->birth_date }}</p>
                <p class="text-sm text-gray-700 mt-1">Pekerjaan: {{ $population->job }}</p>
                <p class="text-sm text-gray-700 mt-1">Status Pernikahan: {{ $population->marital_status }}</p>
                <p class="text-sm text-gray-700 mt-1">Telepon: {{ $population->phone }}</p>
                <div class="mt-4">
                    <div class="w-28 h-2w-28">
                        {!! str_replace('<svg', '<svg class="w-full h-full"', $population->qr_code) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    




</body>

</html>
