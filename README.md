# MageOS B2B example suite

This repository demonstrates one development monorepo that publishes separate Composer packages.

| Directory | Composer package | Magento module |
| --- | --- | --- |
| `packages/module-b2b-company` | `olivertar/module-b2b-company` | `MageOS_B2BCompany` |
| `packages/module-b2b-role` | `olivertar/module-b2b-role` | `MageOS_B2BRole` |
| `packages/module-b2b-prices` | `olivertar/module-b2b-prices` | `MageOS_B2BPrices` |
| `packages/b2b-suite` | `olivertar/b2b-suite` | Metapackage |

The real project would use the `mage-os-lab` GitHub organization and the `mage-os` Composer vendor.

## Try it on GitHub

You need `git`, the GitHub CLI (`gh auth login`) and Composer.

1. Create the first local commit.

   ```bash
   git init -b main
   git add .
   git commit -m "feat: add B2B example suite"
   ```

2. Create the five GitHub repositories.

   ```bash
   bin/setup-github.sh olivertar
   ```

3. Create a [fine-grained token](https://github.com/settings/personal-access-tokens/new).
   Give it access to `b2b-suite`, `module-b2b-company`, `module-b2b-role` and `module-b2b-prices`.
   Set **Repository permissions > Contents** to **Read and write**. Then store it:

   ```bash
   gh secret set SPLIT_TOKEN --repo olivertar/b2b-suite-dev
   ```

4. Push the monorepo. GitHub Actions tests it and fills the four package repositories.

   ```bash
   git remote add origin git@github.com:olivertar/b2b-suite-dev.git
   git push -u origin main
   gh run watch --repo olivertar/b2b-suite-dev
   ```

5. Release version 1.0.0.

   ```bash
   git tag v1.0.0
   git push origin v1.0.0
   gh run watch --repo olivertar/b2b-suite-dev
   ```

6. Check the Composer installation in an empty directory.

   ```bash
   mkdir /tmp/b2b-install-test && cd /tmp/b2b-install-test
   composer init --no-interaction --name example/store
   composer config repositories.b2b-suite vcs https://github.com/olivertar/b2b-suite
   composer config repositories.b2b-company vcs https://github.com/olivertar/module-b2b-company
   composer config repositories.b2b-role vcs https://github.com/olivertar/module-b2b-role
   composer config repositories.b2b-prices vcs https://github.com/olivertar/module-b2b-prices
   composer config repositories.mage-os composer https://repo.mage-os.org/
   composer require olivertar/b2b-suite:^1.0 --no-install --ignore-platform-reqs
   ```

   Composer should lock all four `olivertar/*` packages at `v1.0.0`.

## Develop a change

```bash
git switch -c feature/1-company-change
composer install
composer test
git commit -am "feat(company): describe the change"
git push -u origin feature/1-company-change
gh pr create --fill
```

Merge the pull request, then release from `main`:

```bash
git switch main
git pull
git tag v1.1.0
git push origin v1.1.0
```

Every package receives `v1.1.0`, including packages that did not change.

## Install in a Mage-OS store

Add the same `vcs` repositories to the store, then run:

```bash
composer require olivertar/b2b-suite:^1.0
bin/magento setup:upgrade
```

To install one module and its dependencies:

```bash
composer require olivertar/module-b2b-role:^1.0
```

## Remove the test repositories

```bash
for repo in b2b-suite-dev b2b-suite module-b2b-company module-b2b-role module-b2b-prices; do
    gh repo delete "olivertar/$repo"
done
```
