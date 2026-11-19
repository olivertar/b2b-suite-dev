# 0001. Repository structure, packaging and versioning

- **Status:** Proposed
- **Author:** @olivertar
- **Review deadline:** 2026-11-26
- **Discussion:** this pull request

## Context

The B2B Suite contains several Magento modules, such as Company, Role and Prices, that depend on each other and change together. The team develops all of them at the same time.

Merchants must be able to install the complete suite or a single module with its dependencies through Composer. Packagist and Composer expect one package per repository root.

External contributors must be able to fork, change several modules and open one pull request.

## Options

### Option A: one repository per module

Each module lives in its own repository and has its own version.

- A change across modules needs several coordinated pull requests.
- Version compatibility between modules must be managed by hand.
- Each repository needs its own CI, protection rules and code owners.

### Option B: monorepo with Git submodules

A parent repository includes each module repository as a submodule.

- Contributors still open pull requests in several repositories.
- Submodule pointers are easy to break and confusing for new contributors.

### Option C: development monorepo with read-only package repositories

All modules are developed in one repository. CI publishes each package directory to its own read-only repository with `git subtree split`.

- One pull request, one CI run and one review cover a change across modules.
- Composer and Packagist still receive one package per repository.
- The split step needs a token with write access to the package repositories.

## Decision

Use Option C, with these rules:

1. **Development repository:** `b2b-suite-dev` holds every module in `packages/module-b2b-<name>/` and the `b2b-suite` metapackage in `packages/b2b-suite/`.
2. **Package repositories:** CI publishes `b2b-suite`, `module-b2b-company`, `module-b2b-role` and so on after every push to `main` and every tag. They are read-only. Pull requests sent to them are closed with a pointer to `b2b-suite-dev`.
3. **Names:** Composer packages are `mage-os/module-b2b-<name>`, Magento modules are `MageOS_B2B<Name>` and PHP namespaces are `MageOS\B2B<Name>`.
4. **Lockstep versions:** one tag `vX.Y.Z` releases every package with the same version, including packages that did not change. Semantic Versioning applies to the suite as a whole.
5. **Internal dependencies:** suite modules require each other with `self.version`. Core dependencies use `magento/*` package names, which Mage-OS packages replace.
6. **Development branches:** `composer.json` files have no `version` field and declare the branch alias `dev-main: 1.x-dev`.
7. **Protection:** `main` requires a pull request, a passing `test` check and one code owner approval. Direct pushes are not allowed.

## Consequences

- Merchants run `composer require mage-os/b2b-suite` or require a single module.
- A release always contains a consistent set of modules, so there is no compatibility matrix.
- A patch release of one module produces new versions of every package.
- Maintainers keep one CI workflow and one set of code owners.
- Creating a new module also requires creating its package repository and adding it to the split list.
- The current example uses the `olivertar` vendor. The Mage-OS Lab setup replaces it with `mage-os-lab` repositories and the `mage-os` vendor.
