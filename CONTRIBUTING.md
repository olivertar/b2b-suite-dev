# Contributing to the MageOS B2B Suite

This project is run in the open on GitHub. Every idea, decision and task has one home, so anyone can follow what was decided and why.

## Where each conversation happens

| You want to | Use | Closes when |
| --- | --- | --- |
| Share an idea, ask a question or debate options | [Discussions](https://github.com/olivertar/b2b-suite-dev/discussions) | The idea is accepted, rejected or turned into a proposal |
| Propose a new module | [Discussions > Module proposals](https://github.com/olivertar/b2b-suite-dev/discussions/categories/module-proposals) | The proposal becomes an ADR or is declined |
| Record a decision that affects the whole suite | Architecture Decision Record (ADR) pull request in `docs/adr/` | The pull request is merged or closed |
| Describe behavior a module must support | Issue with the **Use case** form | A pull request delivers it |
| Report a defect | Issue with the **Bug report** form | A pull request fixes it |
| Track technical work that is not a use case | Issue with the **Task** form | A pull request completes it |
| See priorities and progress | The [project board](https://github.com/users/olivertar/projects/1) | Never; it is the live plan |

Chat platforms such as Discord are fine for quick talk. A decision made in chat or in a call is not final until it is written in a Discussion or an ADR.

## From idea to code

```
Discussion  ->  ADR pull request  ->  Issues  ->  Pull requests
 (explore)       (decide)            (plan)      (build)
```

1. **Explore.** Open a Discussion. Describe the problem before the solution.
2. **Decide.** When a Discussion reaches a direction that affects the suite, a maintainer or the author opens an ADR pull request. Reviewers comment on specific lines.
3. **Plan.** Accepted decisions and module proposals are split into **Use case** and **Task** issues, and added to the project board.
4. **Build.** Each pull request links the issue it closes. Acceptance criteria in the use case become the tests that come first.

Small, uncontroversial changes, such as typo fixes, can go straight to a pull request.

## How decisions are made

- **Owner.** Every Discussion and ADR has one author who keeps it moving and writes the summary.
- **Deadline.** Proposals state a review deadline, by default 7 days after they are ready for review.
- **Lazy consensus.** If no maintainer objects before the deadline, the proposal is accepted. An objection must explain the problem and, when possible, suggest an alternative.
- **Tie-break.** If maintainers cannot agree, the code owners decide by simple majority in the pull request or Discussion.
- **Summary.** When a Discussion closes, its owner posts a final comment with the outcome and marks it as the answer.
- **Superseding.** Accepted ADRs are not edited to change a decision. A new ADR supersedes the old one.

## Labels

| Label | Meaning |
| --- | --- |
| `type:use-case`, `type:bug`, `type:task` | Kind of issue, set by the issue form |
| `module:<name>` | Module affected, such as `module:company` |
| `needs-triage` | Not reviewed by a maintainer yet |
| `ready` | Agreed, clear and ready for someone to pick up |
| `blocked` | Waiting on a decision or another issue |
| `adr` | Pull request that adds or changes a decision record |
| `good first issue` | Suitable for a new contributor |

## Code contributions

Read [AGENTS.md](AGENTS.md) for the development workflow, test-driven development and the checks that must pass. Fork the repository if you do not have write access, then open a pull request against `main`.
