<?php
namespace Patters\Visitor;

use Patters\Visitor\Visitor;

interface Entity
{
    public function accept(Visitor $visitor): string;
}
