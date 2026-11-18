<?php

declare(strict_types=1);

namespace MageOS\B2BPrices\Model;

use MageOS\B2BCompany\Api\CompanyProviderInterface;

class CompanyPrice
{
    public function __construct(private readonly CompanyProviderInterface $companyProvider)
    {
    }

    public function apply(float $price): float
    {
        return round($price * (1 - $this->companyProvider->getDiscountPercent() / 100), 2);
    }

    public function discountAmount(float $price): float
    {
        return round($price - $this->apply($price), 2);
    }
}
