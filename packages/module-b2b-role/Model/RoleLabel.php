<?php

declare(strict_types=1);

namespace MageOS\B2BRole\Model;

use MageOS\B2BCompany\Api\CompanyProviderInterface;

class RoleLabel
{
    public function __construct(private readonly CompanyProviderInterface $companyProvider)
    {
    }

    public function forRole(string $role): string
    {
        return sprintf('%s at %s', $role, $this->companyProvider->getName());
    }
}
