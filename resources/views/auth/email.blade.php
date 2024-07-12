<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aktivasi Akun Kecamatan London Utara</title>
</head>
<body>
    
    # Aktivasi Akun <br><br>
    
    Halo, {{ $user->name }} <br><br>
    
    Silakan klik tombol di bawah ini untuk mengaktifkan akun Anda: <br><br>
    
    <a href="{{ route('auth.activation', Crypt::encrypt($user->id)) }}">Aktivasi Akun</a> <br><br>
    
    Terima kasih,<br>
    {{ config('app.name') }}
</body>
</html>

