# Saas Backend

# Overview

This is a [Larvel backend](https://github.com/Leping08/saas-template-back-end) template designed for use with a [Vue 3](https://vuejs.org/) [front end](https://github.com/Leping08/saas-template-front-end).

# Project setup
### Clone the repo
```
git clone https://github.com/Leping08/saas-template-back-end
```

### Composer install
```
composer install
```

### Env
Duplicate the .env.example file, rename it to .env and add the necessary credentials for stripe and a database.

### Generate a key
```
php artisan key::generate
```

### Serve
```
php artisan serve
```

# Features

### Auth

The authentication is a cookie based authentication handled using [Laravel Sanctum](https://laravel.com/docs/master/sanctum). The default Laravel user model is used.

### Cashier

[Laravel Cashier](https://laravel.com/docs/master/billing) handles all payment processing and subscription based payments.

### Products and Plans

When a user signs up they subscribe to a plan that is either monthly or yearly through Laravel Cashier. Each plan is associated with a product in the database and the user model has a plan relationship as well as a product relationship.

```php
$user = App\Models\User::first();

$user->plan();
$user->product();
```