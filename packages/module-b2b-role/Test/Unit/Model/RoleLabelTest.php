<?php

declare(strict_types=1);

namespace MageOS\B2BRole\Test\Unit\Model;

use MageOS\B2BCompany\Model\CompanyProvider;
use MageOS\B2BRole\Model\RoleLabel;
use PHPUnit\Framework\TestCase;

class RoleLabelTest extends TestCase
{
    public function testItNamesTheRoleWithinTheCompany(): void
    {
        $label = new RoleLabel(new CompanyProvider('Acme'));

        self::assertSame('Buyer at Acme', $label->forRole('Buyer'));
    }
}
