---
name: tdd-change
description: Implement a feature or bug fix in a MageOS B2B module with test-driven development. Use for every change to module behavior.
---

# TDD change

1. Confirm the expected behavior and the module that owns it. Ask the developer if either is unclear.
2. Update `main` and create the branch `feature/<issue>-<description>` or `fix/<issue>-<description>`.
3. Choose the test level. Use an integration test for framework behavior and a unit test for business logic.
4. Write one test for the behavior.
5. Run that test and confirm that it fails because the behavior is missing. A syntax, setup or autoload error does not count.
6. Commit only the test as `test(<scope>): <description>`.
7. Write the minimum production code that makes the test pass.
8. Run the test again and commit as `feat(<scope>): <description>` or `fix(<scope>): <description>`.
9. Refactor if needed, keeping the tests green.
10. Run `composer analyse`, `composer cs`, `composer test` and `bin/verify-install.sh`.
11. Show the developer the commands you ran and their results.
12. Open a pull request against `main` only when the developer asks. Include the failing test commit, the checks and any risk.

Never change a test only to make it pass. If the test appears wrong, stop and explain the problem.
