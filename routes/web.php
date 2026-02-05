<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function() {
    // Recruiter routes
    Route::get('/job-offers', [JobOfferController::class, 'index'])
         ->name('job_offers.index');

    Route::get('/job-offers/create', [JobOfferController::class, 'create'])
         ->name('job_offers.create');
    Route::post('/job-offers', [JobOfferController::class, 'store'])
         ->name('job_offers.store');
    Route::delete('/job-offers/{jobOffer}', [JobOfferController::class, 'destroy'])
         ->name('job_offers.destroy');

    // Job Seeker route
    Route::get('/job-offers/list', function () {
        return view('job_offers.list');
    })->name('job_offers.list');
});




Route::middleware(['auth', 'role:job_seeker'])->group(function () {
    Route::get('/job-offers', function () {
        return view('job_offers.list');
    })->name('job_offers.list');
});

Route::get('offers', [JobOfferController::class, 'index'])->name('offers');

Route::middleware(['role:job_seeker'])->group(function () {
    Route::post('/job-offers/{jobOffer}/apply', [ApplicationController::class, 'store']);
});


Route::get('/cv' , [CvController::class, 'index'])->name('cv.index');

Route::post('/experience' , [ExperienceController::class , 'store'])->name('experiences.store');
Route::delete('/experience/{experience}' , [ExperienceController::class , 'destroy'])->name('experiences.destroy');

Route::post('/education' , [EducationController::class , 'store'])->name('educations.store');
Route::delete('/education/{education}' , [EducationController::class , 'destroy'])->name('educations.destroy');

Route::post('/skills' , [SkillController::class , 'store'])->name('skills.store');
Route::delete('/skills/{skill}' , [SkillController::class , 'destroy'])->name('skills.destroy');


require __DIR__.'/auth.php';

