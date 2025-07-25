<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies', [
            'companies' => Company::filter(request(['company']))->orderBy('company_name')->get()
        ]);
    }
}
