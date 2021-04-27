To start using app run
```
composer install
composer dump
```

To run tests ``./vendor/bin/phpunit``

Pass job candidates to employer. Only unique names are stored. Inexperienced candidates are stored in txt file, experienced in SQLite3 databse.

example:
``    new JobCandidate('Rokas la', 0),`` A candidate with 0 years of experience will end up in txt file