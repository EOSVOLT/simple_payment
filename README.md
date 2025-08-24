# Interview Coding Test - {full name} / {email}

To accomplish test please clone this repository on your local. Finish a task explained in email and push changes to your private repository.
Then give access to that repository for developer pointed in email, so we can review developed code.

# Important

- **DO NOT make any your changes available publicly (like public forks, public clones of repository with solved test).**
- New created repository should have initial push as cloned test repository, and following commits as your progress on assigned task.
- If you need comment anything in code use English for that.
- Please use gitflow to create proper PR in GitHub which we will be able to review and add comments.
- Edit first header in this README file by adding your name and email used in job application.

# Preparation

Project has its own docker image to assure all compatibility, tests must be run and work in docker.

# Expectations

As an expected result of test we need to see passing tests in project by calling command:
```
docker compose exec eosvolt_interview ./vendor/bin/phpunit ./tests --testdox
```