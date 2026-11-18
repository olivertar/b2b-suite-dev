<?php

declare(strict_types=1);

namespace MageOS\B2BCompany\Api;

interface CompanyProviderInterface
{
    /**
     * Get the company name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get the company discount percentage.
     *
     * @return float
     */
    public function getDiscountPercent(): float;
}
