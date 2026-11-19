# Architecture Decision Records

An Architecture Decision Record (ADR) captures one decision that affects the whole suite, such as repository structure, module boundaries, naming or compatibility.

## Propose a decision

1. Copy `0000-template.md` to `NNNN-short-title.md`, using the next free number.
2. Fill it in with the status `Proposed` and a review deadline.
3. Open a pull request with the `adr` label. Link the Discussion that led to it.
4. Reviewers comment on specific lines. The author updates the file.
5. When the deadline passes without unresolved objections, the author sets the status to `Accepted` and a code owner merges the pull request.

A rejected proposal is merged with the status `Rejected` when the reasoning is worth keeping. Otherwise the pull request is closed.

## Change a decision

Do not rewrite an accepted ADR. Open a new ADR that supersedes it, and change the old status to `Superseded by NNNN`.

## Index

| ADR | Title | Status |
| --- | --- | --- |
