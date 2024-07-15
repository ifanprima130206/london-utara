<?php

namespace App\Models\Back;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'users';

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];
    
    public function gallery(){
        return $this->hasMany(Gallery::class, 'enhancer');
    }

    public function news(){
        return $this->hasMany(News::class, 'enhancer');
    }

    public function schedule(){
        return $this->hasMany(Schedules::class, 'enhancer');
    }

    public function question(){
        return $this->hasMany(Schedules::class, 'enhancer');
    }
}
