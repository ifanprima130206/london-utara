<?php

namespace App\Models\Back;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Population extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "populations";

    protected $guarded = ["id"];

    protected $dates = ["deleted_at"];

    public function user(){
        return $this->belongsTo(User::class, "enhancer");
    }

    public function anwer(){
        
        return $this->hasOne(Answer::class, "population_id");
    }
}
