# Bouncer [issue 430](https://github.com/JosephSilber/bouncer/issues/430) reproduction

This repository shows the queries executed when the cache is disabled.

To test this:

1. Clone the project.

2. Create the `.env` file by running this in your console:

    ```
    php -r "file_exists('.env') || copy('.env.example', '.env');"
    ```

3. Update the `.env` file's database settings to point to an empty table in your database.

4. Run `php artisan migrate:fresh --seed`

5. Run `php artisan inspect:bouncer-query`

You should see a dump of the queries that were executed.
