<?php

namespace Patters\Visitor;

use Patters\Visitor\Company;

interface Visitor
{
    public function visitCompany(Company $company): string;
}