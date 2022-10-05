<?php

namespace  Patters\Visitor\Reports;

use Patters\Visitor\Visitor;
use Patters\Visitor\Company;

class TotalNumberOfEmployeesReport implements Visitor
{
    public function visitCompany(Company $company): string
    {
        $TotalNumberOfEmployees = count($company->getEmployees());

        return $company->getName().' has '.$TotalNumberOfEmployees.' workers ;';
    }
}