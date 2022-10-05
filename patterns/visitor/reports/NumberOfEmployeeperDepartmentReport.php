<?php

namespace Patters\Visitor\Reports;

use Patters\Visitor\Visitor;
use Patters\Visitor\Company;

class NumberOfEmployeeperDepartmentReport implements Visitor
{
    public function visitCompany(Company $company, array $departmentsCount = [], $output = ""): string
    {
        foreach ($company->getEmployees() as $employee) {
            $departmentsCount[$employee->getDepartment()] += 1;
        }
        $output = $company->getName();
        foreach ($departmentsCount as $key => $value) {
            $output .=  ': ' . $key.' : '.$value . ' ';

        }
        return $output;
    }
}
