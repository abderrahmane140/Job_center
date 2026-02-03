<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model {

    protected $fillable = [
        'cv_id',
        'degree',
        'school',
        'year'
    ];


    public function cv(){
        return $this->belongsTo(Cv::class);
    }
}