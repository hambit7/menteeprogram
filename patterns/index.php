<?php

require __DIR__."/vendor/autoload.php";


use Patters\Visitor\Company;
use Patters\Visitor\Employee;
use Patters\Visitor\Reports\SalaryReport;
use Patters\Visitor\Reports\TotalNumberOfEmployeesReport;
use Patters\Visitor\Reports\AvarageSallaryReport;
use Patters\Visitor\Reports\NumberOfEmployeeperDepartmentReport;

$company = new Company("Web Dev", [
    new Employee("First", "designer", 100000),
    new Employee("Second", "programmer", 100000),
    new Employee("3", "programmer", 90000),
    new Employee("4", "QA engineer", 31000),
    new Employee("James Smith", "QA engineer", 30000),
    new Employee("James Smith", "QA engineer", 30002),
]);

$reportSalary = new SalaryReport();
$reportTotalWorkersCount = new TotalNumberOfEmployeesReport();
$AvarageSallaryReport = new AvarageSallaryReport();
$NumberOfEmployeeperDepartmentReport = new NumberOfEmployeeperDepartmentReport();

echo  $reportSalary->visitCompany($company);
echo  $reportTotalWorkersCount->visitCompany($company);
echo  $AvarageSallaryReport->visitCompany($company);
echo  $NumberOfEmployeeperDepartmentReport->visitCompany($company);
