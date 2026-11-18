#!/usr/bin/env bash
# Publishes every directory in packages/ to its own read-only repository.
# Usage: bin/split.sh <remote-base> [tag]
# Example: bin/split.sh https://github.com/olivertar v1.0.0
set -euo pipefail

remote_base="${1:?usage: bin/split.sh <remote-base> [tag]}"
tag="${2:-}"

for package_dir in packages/*/; do
    package="$(basename "$package_dir")"
    remote="${remote_base%/}/${package}.git"
    split_sha="$(git subtree split --quiet --prefix="packages/${package}" HEAD)"

    echo "Publishing ${package} at ${split_sha}"
    if [ -n "$tag" ]; then
        git push --quiet "$remote" "${split_sha}:refs/tags/${tag}"
        echo "Tagged ${package} ${tag}"
    else
        git push --quiet "$remote" "${split_sha}:refs/heads/main"
    fi
done
