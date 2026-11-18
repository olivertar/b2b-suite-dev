<?php

declare(strict_types=1);

namespace MageOS\B2BPrices\Model;

use MageOS\B2BCompany\Api\CompanyProviderInterface;

class CompanyPrice
{
    /**
     * Create the company price calculator.
     *
     * @param CompanyProviderInterface $companyProvider
     */
    public function __construct(private readonly CompanyProviderInterface $companyProvider)
    {
    }

    /**
     * Apply the company discount to a price.
     *
     * @param float $price
     * @return float
     */
    public function apply(float $price): float
    {
        return round($price * (1 - $this->companyProvider->getDiscountPercent() / 100), 2);
    }

    /**
     * Get the amount discounted from a price.
     *
     * @param float $price
     * @return float
     */
    public function discountAmount(float $price): float
    {
        return round($price - $this->apply($price), 2);
    }
}
