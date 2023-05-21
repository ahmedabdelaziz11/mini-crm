<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $companies = $this->companyService->getAllCompanies();
        return view('company.index',compact('companies'));
    }

    public function create()
    {
        return view('company.create');  
    }

    public function store(CompanyRequest $request)
    {
        $this->companyService->store($request->all());
        session()->flash('mss', 'added successfully');
        return back();
    }

    public function show(Company $company)
    {
        return view('company.show',['company' => $company]);
    }

    public function edit(Company $company)
    {
        return view('company.edit',['company' => $company]); 
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $this->companyService->update($request->all(),$company);
        session()->flash('mss', 'updated successfully');
        return back();
    }

    public function destroy(Company $company)
    {
        $this->companyService->delete($company);
        session()->flash('delete', 'deleted successfully');
        return back();
    }
}
