<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
        $this->middleware('auth:sanctum');
        $this->middleware('admin');
    }

    // Get all employees (paginated)
    public function index(Request $request)
    {
        $employees = $this->employeeService->get($request->all());
        return response()->successJson($employees);
    }

    // Get a specific employee by ID
    public function show($id)
    {
        $employee = $this->employeeService->show($id);
        return response()->successJson($employee);
    }

    // Delete an employee
    public function destroy($id)
    {
        $this->employeeService->delete($id);
        return response()->successJson([], 'Employee deleted successfully');
    }
}
