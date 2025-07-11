<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\UserRequest;
use App\Models\Company;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index()
    {
        return view('index', [
            'listings' => Listing::all()
        ]);
    }

    public function show()
    {
        return view('listings.show');
    }

    public function create()
    {
        if (!auth()->user()) {
            return view('listings.company-details');
        }

        return redirect('/post-job/company-details/job-details');
    }

    public function create_companyDetails(CompanyRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('company_logo')) {
            $validated['company_logo'] = $request->file('company_logo')->store('logos', 'public');
        }

        Company::create($validated);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        auth()->login($user);

        return redirect('/post-job/company-details/job-details')->with('method_boolean', 'Success');
    }

    public function create_jobDetails()
    {
        if (session()->has('method_boolean') || auth()->user()) {
            return view('listings.job-details');
        }

        return redirect('/post-job');
    }

    public function store() {}
}
