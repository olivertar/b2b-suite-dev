#!/usr/bin/env bash
# Checks that the whole suite resolves against Mage-OS, the way a store would install it.
set -euo pipefail

root="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
store="$(mktemp -d)"
trap 'rm -rf "$store"' EXIT

cat > "$store/composer.json" <<JSON
{
    "name": "example/verify-store",
    "minimum-stability": "dev",
    "prefer-stable": true,
    "repositories": [
        {"type": "path", "url": "${root}/packages/*", "options": {"symlink": true}},
        {"type": "composer", "url": "https://repo.mage-os.org/"}
    ],
    "require": {
        "olivertar/b2b-suite": "1.x-dev"
    },
    "config": {
        "allow-plugins": false
    }
}
JSON

COMPOSER_ROOT_VERSION=dev-main composer update --working-dir="$store" \
    --no-install --no-scripts --no-audit --no-interaction --ignore-platform-reqs
echo "The suite resolves against Mage-OS."
