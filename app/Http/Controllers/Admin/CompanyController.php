<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
        $this->middleware('auth:sanctum');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        return response()->successJson($this->companyService->get($request->all()));
    }

    public function store(CompanyStoreRequest $request)
    {
        return response()->successJson($this->companyService->create($request->all()));
    }

    public function show($id)
    {
        return response()->successJson($this->companyService->show($id));
    }

    public function update(CompanyUpdateRequest $request, $id)
    {
        return response()->successJson($this->companyService->edit($request->all(), $id));
    }

    public function destroy($id)
    {
        $this->companyService->delete($id);
        return response()->successJson([], 'Company deleted successfully');
    }
}

