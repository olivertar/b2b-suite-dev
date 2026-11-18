<?php

declare(strict_types=1);

namespace MageOS\B2BRole\Model;

use MageOS\B2BCompany\Api\CompanyProviderInterface;

class RoleLabel
{
    /**
     * Create the role label.
     *
     * @param CompanyProviderInterface $companyProvider
     */
    public function __construct(private readonly CompanyProviderInterface $companyProvider)
    {
    }

    /**
     * Build the label for a company role.
     *
     * @param string $role
     * @return string
     */
    public function forRole(string $role): string
    {
        return sprintf('%s at %s', $role, $this->companyProvider->getName());
    }
}
