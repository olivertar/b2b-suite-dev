<?php

declare(strict_types=1);

namespace MageOS\B2BPrices\Test\Unit\Model;

use MageOS\B2BCompany\Model\CompanyProvider;
use MageOS\B2BPrices\Model\CompanyPrice;
use PHPUnit\Framework\TestCase;

class CompanyPriceTest extends TestCase
{
    public function testItAppliesTheCompanyDiscount(): void
    {
        $price = new CompanyPrice(new CompanyProvider('Acme', 10.0));

        self::assertSame(90.0, $price->apply(100.0));
    }

    public function testItReturnsTheCompanyDiscountAmount(): void
    {
        $price = new CompanyPrice(new CompanyProvider('Acme', 10.0));

        self::assertSame(111.11, $price->apply(123.45));
        self::assertSame(12.34, $price->discountAmount(123.45));
    }
}
