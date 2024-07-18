<?php

namespace App\Models;

use App\Models\Back\Population;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'answer';

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function populations(){

        return $this->belongsTo(Population::class, 'population_id');
    }

}
