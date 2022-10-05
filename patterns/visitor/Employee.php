<?php

namespace Patters\Visitor;

class Employee
{
    private string $name, $department;

    private int $salary;

    public function __construct(string $name, string $department, int $salary)
    {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }
}