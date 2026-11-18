# MageOS B2B agent instructions

- Work in `packages/<module>/` and keep each change inside the module that owns the behavior.
- Run `composer test` and `bin/verify-install.sh` before opening a pull request.
- Use Conventional Commits with the module as the scope, such as `feat(prices): add tier price`.
- Add new module dependencies to both `composer.json` and `etc/module.xml`.
- Ask a maintainer before changing `Api/`, database schema, events, configuration paths, ACL resources or layout handles.
- Never read, print or commit credentials, `.env`, `env.php` or customer data.
