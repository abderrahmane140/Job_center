<?php


namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobOfferController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'recruiter') {
            // Recruiter sees only their own offers
            $jobOffers = JobOffer::where('user_id', $user->id)->get();
        } else {
            // Job seeker sees all active offers
            $jobOffers = JobOffer::where('is_active', 1)->get();
        }

        return view('job_offers.index', compact('jobOffers'));
    }

    public function create()
    {
        $this->authorize('create', JobOffer::class);
        return view('job_offers.create');
    }

    public function store(Request $request)
    {

        $this->authorize('create', JobOffer::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'contract_type' => 'required|in:CDI,CDD,Full-time,Stage,Freelance',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title','description','company','contract_type']);

        if($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('job_images', 'public');
        }

        $data['user_id'] = Auth::id();

        JobOffer::create($data);

        return redirect()->route('job_offers.index')
                         ->with('success', 'Job Offer Created!');
    }

    public function destroy(JobOffer $jobOffer)
    {

        if ($jobOffer->user_id !== auth()->id()) {
            abort(403, 'You are not authorized to delete this job offer.');
        }

        $jobOffer->delete();

        return redirect()->route('job_offers.index')->with('success', 'Job offer deleted!');
    }

}
