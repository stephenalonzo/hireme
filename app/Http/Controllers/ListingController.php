<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\ListingRequest;
use App\Models\CompanyListing;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index()
    {
        switch (request('sort_by')) {
            case (2):
                return view('index', [
                    'listings' => Listing::filter(request(['job']))->filter(request(['job_category']))->filter(request(['job_type']))->orderBy('listings.job_title', 'desc')->get()
                ]);
                break;
            case (3):
                return view('index', [
                    'listings' => Listing::filter(request(['job']))->filter(request(['job_category']))->filter(request(['job_type']))->orderBy('listings.created_at', 'desc')->get()
                ]);
                break;
            default:
                return view('index', [
                    'listings' => Listing::filter(request(['job']))->filter(request(['job_category']))->filter(request(['job_type']))->orderBy('listings.job_title')->get()
                ]);
                break;
        }
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        $user = User::find((auth()->user()->id ?? []));

        if (!auth()->user()) {
            return view('listings.company-details');
        }

        if ($user->company_id != null) {
            return redirect('/post-job/company-details/job-details');
        }

        return view('listings.company-details', [
            'user' => $user
        ]);
    }

    public function createCompanyDetails(CompanyRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request->file('company_logo')->store('logos', 'public');
        }

        $company = Company::create($validated);
        $user = User::create([
            'company_id' => $company->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        auth()->login($user);

        return redirect('/post-job/company-details/job-details')->with('method_boolean', 'Success');
    }

    public function createJobDetails()
    {
        if (session()->has('method_boolean') || auth()->user()) {
            return view('listings.job-details');
        }

        return redirect('/post-job');
    }

    public function store(ListingRequest $request)
    {
        if (auth()->check()) {
            $validated = $request->validated();
            $validated['uid'] = '#' . date('Y-m-d', strtotime(now())) . rand();

            $users = User::where('id', auth()->user()->id)->get();

            foreach ($users as $user) {
                $validated['company_id'] = $user->company_id;
                $listing = Listing::create($validated);

                CompanyListing::create([
                    'company_id' => $user->company_id,
                    'listing_id' => $listing->id
                ]);

                return redirect('/job/' . $listing->id);
            }
        }

        return back();
    }
}
