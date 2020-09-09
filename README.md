# php-task-list
My implementation of the Laravel Task List Quickstart.

I tried implementing a React frontend after finishing the intermediate tutorial, but there are so many changed required that it really makes sense to just [start from scratch](https://github.com/treytomes/php-react-task-list).

## How to run
All tasks should be run inside of the task-list subfolder.
1. `composer install`
2. `cp .env.example .env`
3. `cd database`
4. `sqlite3
5. `.open task-list.sqlite`
6. Ctrl+Z
7. Inside of .env:
    * `DB_CONNECTION=sqlite`
    * `DB_DATABASE={full path to your sqlite database}`.
9. `php artisan key:generate`
10. `php artisan serve`

## Troubleshooting
* No application encryption key has been specified.
    * `php artisan key:generate`

## References
* [Basic Task List](https://laravel.com/docs/5.2/quickstart)
* [Intermediate Task List](https://laravel.com/docs/5.2/quickstart-intermediate)
