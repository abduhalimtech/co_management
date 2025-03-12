<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use App\Rules\Passport;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
        $this->middleware('auth:sanctum');
        $this->middleware('company');
    }

    public function index(Request $request)
    {
        $employees = $this->employeeService->get($request->all());
        return response()->successJson($employees);
    }

    public function store(EmployeeStoreRequest $request)
    {
        $employee = $this->employeeService->create($request->all());
        return response()->successJson($employee);
    }

    public function show($id)
    {
        $employee = $this->employeeService->show($id);
        return response()->successJson($employee);
    }

    // Update an employee
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $employee = $this->employeeService->edit($request->all(), $id);
        return response()->successJson($employee);
    }

    public function destroy($id)
    {
        $this->employeeService->delete($id);
        return response()->successJson([], 'Employee deleted successfully');
    }
}

