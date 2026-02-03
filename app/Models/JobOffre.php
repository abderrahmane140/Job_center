<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffre extends Model{

    protected $fillable = [
       'user_id',
        'title',
        'description',
        'image',
        'contract_type',
        'company',
        'is_active',
    ];

    // One-to-Many: Job -> Applications
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // Job belongs to a recruiter
    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}