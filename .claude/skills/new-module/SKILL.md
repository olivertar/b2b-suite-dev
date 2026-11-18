---
name: new-module
description: Add a new Magento module to the MageOS B2B Suite monorepo. Use when the developer asks to create a module.
---

# New module

Confirm the module name and its dependencies with the developer. Use this naming pattern:

| Item | Pattern |
| --- | --- |
| Directory | `packages/module-b2b-<name>/` |
| Composer package | Same vendor as existing packages, with `module-b2b-<name>` |
| Magento module | `MageOS_B2B<Name>` |
| PHP namespace | `MageOS\B2B<Name>` |

1. Create the branch `feature/<issue>-add-<name>-module`.
2. Create `composer.json`, `registration.php` and `etc/module.xml`, following an existing module.
3. Set `branch-alias` to the same value as existing modules, and do not add a `version` field.
4. Add sibling dependencies with `self.version` to `composer.json`, and add them to the `<sequence>` in `etc/module.xml`.
5. Add the namespace to `autoload-dev` in the root `composer.json`.
6. Add the package to `packages/b2b-suite/composer.json` with `self.version`.
7. Add behavior with the `tdd-change` skill.
8. Run `composer analyse`, `composer cs`, `composer test` and `bin/verify-install.sh`.

Tell the developer that a maintainer must create the read-only package repository, give `SPLIT_TOKEN` write access to it and register it on Packagist before the module is published. Do not run `bin/setup-github.sh`.
