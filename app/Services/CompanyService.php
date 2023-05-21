<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public function getAllCompanies()
    {
        return Company::withCount('employees')->paginate(10);
    }

    public function store($formData)
    {
        $company = Company::create([
            'name'    => $formData['name'],
            'email'   => $formData['email'],
            'website' => $formData['website'],
        ]);

        if(isset($formData['logo'])){
            $company->logo = $this->savePhoto($formData['logo']);
            $company->save(); 
        }
    }

    public function update($formData,Company $company)
    {
        $company->update([
            'name'    => $formData['name'],
            'email'   => $formData['email'],
            'website' => $formData['website'],
        ]);

        if(isset($formData['logo'])){
            Storage::delete('/public/logos/'.$company->logo);
            $company->logo = $this->savePhoto($formData['logo']);
            $company->save(); 
        }
    }

    public function delete(Company $company)
    {
        Storage::delete('/public/logos/'.$company->logo);
        $company->delete();
    }

    public function savePhoto($file)
    {
        $logoWithExt = $file->getClientOriginalName();
        $logoName = pathinfo($logoWithExt, PATHINFO_FILENAME);
        $logoExtension = $file->getClientOriginalExtension();

        $logoNameToStore = $logoName.'_'.time().'.'.$logoExtension;

        $file->storeAs('public/logos',$logoNameToStore);

        return $logoNameToStore;
    }
}
