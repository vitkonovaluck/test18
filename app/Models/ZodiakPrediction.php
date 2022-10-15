<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ZodiakPrediction extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function zodiak(){
        return $this->belongsTo(Zodiak::class);
    }

    public function prediction(){
        return $this->belongsTo(Prediction::class);
    }

}
