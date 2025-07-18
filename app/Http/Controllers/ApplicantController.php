<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicantRequest;
use App\Models\Applicant;
use App\Models\ApplicantListing;

class ApplicantController extends Controller
{
    public function index(Listing $listing)
    {
        return view('apply', [
            'listing' => $listing
        ]);
    }

    public function show(Applicant $applicant)
    {
        $applicants = Applicant::where('applicant_name', '=', (auth()->user()->name ?? false))->get();

        foreach ($applicants as $applicant) {
            if ($applicant) {
                return view('auth.applications', [
                    'applicant' => $applicant
                ]);
            }
        }

        return view('auth.applications');
    }

    public function store(ApplicantRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('applicant_resume')) {
            $validated['applicant_resume'] = $request->file('applicant_resume')->store('resumes', 'public');

            $applicant = Applicant::create($validated);
            ApplicantListing::create([
                'applicant_id' => $applicant->id,
                'listing_id' => $validated['listing_id']
            ]);
        }


        return redirect('/job/' . $validated['listing_id']);
    }
}
