<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public function getAllEmployees()
    {
        return Employee::with('company')->paginate(10);
    }

    public function store($formData)
    {
        $company = Employee::create([
            'first_name'    => $formData['first_name'],
            'last_name'   => $formData['last_name'],
            'company_id' => $formData['company_id'],
            'email' => $formData['email'],
            'phone' => $formData['phone'],
        ]);
    }

    public function update($formData,Employee $employee)
    {
        $employee->update([
            'first_name'    => $formData['first_name'],
            'last_name'   => $formData['last_name'],
            'company_id' => $formData['company_id'],
            'email' => $formData['email'],
            'phone' => $formData['phone'],
        ]);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
    }
}
