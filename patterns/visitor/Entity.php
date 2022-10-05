<?php
namespace Patters\Visitor;

use Patters\Visitor;

interface Entity
{
    public function accept(Visitor $visitor): string;
}
