<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyUpdateRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
        $this->middleware('auth:sanctum');
        $this->middleware('company');
    }

    public function show()
    {
        $company = auth()->user()->company;
        return response()->successJson($company);
    }

    public function update(CompanyUpdateRequest $request)
    {
        // dd($request->all());
        $company = auth()->user()->company;
        // dd($company->id);
        $updatedCompany = $this->companyService->edit($request->all(), $company->id);
        return response()->successJson($updatedCompany);
    }
}
