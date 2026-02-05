<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'user_id',
        'title'
    ];

    // One-to-one 
    public function user(){
        return $this->belongsTo(User::class);
    }

    // One-to-many 
    public function educations(){
        return $this->hasMany(Education::class);
    }

    // One-to-many 
    public function experiences(){
        return $this->hasMany(Experience::class);
    }

    // Many-to-many
    public function skills(){
        return $this->belongsToMany(Skill::class,'cv_skill');
    }
}
