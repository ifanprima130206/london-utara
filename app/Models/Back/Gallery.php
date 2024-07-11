<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gallery';

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];
}
