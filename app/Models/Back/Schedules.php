<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedules extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'schedules';

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class, 'enhancer');
    }
}
