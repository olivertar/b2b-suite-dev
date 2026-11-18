#!/usr/bin/env bash
# Creates the development repository and the read-only package repositories.
# Usage: bin/setup-github.sh <github-owner>
set -euo pipefail

owner="${1:?usage: bin/setup-github.sh <github-owner>}"

gh repo create "${owner}/b2b-suite-dev" --public \
    --description "Development monorepo for the MageOS B2B example suite"

for package_dir in packages/*/; do
    package="$(basename "$package_dir")"
    gh repo create "${owner}/${package}" --public --disable-issues --disable-wiki \
        --description "[READ ONLY] Generated from ${owner}/b2b-suite-dev. Open issues and pull requests there."
done
