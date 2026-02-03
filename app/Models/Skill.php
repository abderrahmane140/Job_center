<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model{
    protected $fillable = [
        'name'
    ];

    //many to many
    public function cvs(){
        return $this->belongsToMany(Cv::class, 'cv_skills');
    }
}