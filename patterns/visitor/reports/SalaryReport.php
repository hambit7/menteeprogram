<?php

namespace  Patters\Visitor\Reports;

use Patters\Visitor\Visitor;
use Patters\Visitor\Company;

class SalaryReport implements Visitor
{
    public function visitCompany(Company $company, string  $output = "", int $total = 0): string
    {
        foreach ($company->getEmployees() as $employee) {
            $total += $employee->getSalary();
        }
        $output = $company->getName().
            " (". $total .")\n".$output . ' ;';

        return $output;
    }
}