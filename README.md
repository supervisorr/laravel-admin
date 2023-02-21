
# Installation

Clone the repo locally:

```sh
git clone git@github.com:supervisorr/laravel-admin.git laravel-admin

cd laravel-admin

git checkout develop
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm ci
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Clear All caches:

```sh
php artisan cache:clear && php artisan route:clear && php artisan config:clear && php artisan view:clear && php artisan optimize:clear
```

Before create an SQLite database, modify the following line in the ".env" file, defining the absolute path to the SQLite database, e.g: 

```sh
DB_DATABASE=/Users/akorotkov/projects/laravel/laravel-admin/database/database.sqlite
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
rm -f database/database.sqlite && touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
npm run rst
```

You're ready to go! Visit Ping CRM in your browser, and login with:

- **Username:** johndoe@example.com
- **Password:** secret

## Running tests

To run the Ping CRM tests, run:

```
php artisan test
```

**Testing documentation:**

[Laravel testing](https://laravel.com/docs/10.x/testing) 

---

## Clone a repository

Use these steps to clone from SourceTree, our client for using the repository command-line free. Cloning allows you to work on your files locally. If you don't yet have SourceTree, [download and install first](https://www.sourcetreeapp.com/). If you prefer to clone from the command line, see [Clone a repository](https://confluence.atlassian.com/x/4whODQ).

1. You’ll see the clone button under the **Source** heading. Click that button.
2. Now click **Check out in SourceTree**. You may need to create a SourceTree account or log in.
3. When you see the **Clone New** dialog in SourceTree, update the destination path and name if you’d like to and then click **Clone**.
4. Open the directory you just created to see your repository’s files.

Now that you're more familiar with your Bitbucket repository, go ahead and add a new file locally. You can [push your change back to Bitbucket with SourceTree](https://confluence.atlassian.com/x/iqyBMg), or you can [add, commit,](https://confluence.atlassian.com/x/8QhODQ) and [push from the command line](https://confluence.atlassian.com/x/NQ0zDQ).

---

# Ping CRM

A demo application to illustrate how Inertia.js works.

![](https://raw.githubusercontent.com/inertiajs/pingcrm/master/screenshot.png)

