<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model{

    use HasFactory;

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
        return $this->hasMany(Application::class, 'job_id'); 
    }

    // Job belongs to a recruiter
    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}