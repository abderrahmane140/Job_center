<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model{

    protected $fillable = [
        'cv_id',
        'position',
        'company',
        'duration'
    ];

    public function cv(){
        return $this->belongsTo(Cv::class);
    }
}