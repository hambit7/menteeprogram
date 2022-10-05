<?php

namespace  Patters\Visitor\Reports;

use Patters\Visitor\Visitor;
use Patters\Visitor\Company;

class AvarageSallaryReport implements Visitor
{
    public function visitCompany(Company $company, string  $output = "", int $total = 0): string
    {
        foreach ($company->getEmployees() as $employee) {
            $total += $employee->getSalary();
        }
        $TotalNumberOfEmployees = count($company->getEmployees());
        $output = $company->getName()." (" . $total/$TotalNumberOfEmployees .")\n".$output . ' ;';

        return $output;
    }
}