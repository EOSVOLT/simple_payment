# Interview Coding Test

To accomplish test please clone this repository on your local. Finish a task explained in email and push changes to your private repository.
Then give access to that repository for developer pointed in email, so we can review developed code.

# Important

Do NOT push any changes as PRs to this repository or DO NOT make any your changes available publicly (like public forks, public clones of repository with solved test).

# Preparation

Project has its own docker image to assure all compatibility, tests must be run and work in docker.

# Expectations

As an expected result of test we need to see passing tests in project by calling command:
```
docker compose exec eosvolt_interview ./vendor/bin/phpunit ./tests --testdox
```