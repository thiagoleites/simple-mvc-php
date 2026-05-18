# Simple PHP MVC Application

A simple PHP MVC skeleton built with pure PHP and PSR-4 autoloading. This project demonstrates a clean separation between routes, controllers, views, and basic session-based authentication. It is designed as a lightweight starting point for extending into a MySQL-backed application.

## Features

* Simple MVC structure with controllers and views
* Custom routing using `routes/web.php`
* Front controller entry point in `public/index.php`
* Session-based authentication guard with `App\Core\Auth`
* Basic admin-only route protection for user pages
* PSR-4 autoloading via Composer

## Project Structure

```text
/ app/
  / Controllers/   # Request handling and page logic
  / Core/          # Base controller, router, auth helper
  / Views/         # PHP view templates and layout
/public/
  index.php       # Application entry point
/routes/
  web.php         # Route definitions
/composer.json    # PSR-4 autoload configuration
/vendor/          # Composer dependencies and autoloader
```

## Routes

* `GET /mvc/` -> `App\Controllers\HomeController@index`
* `GET /mvc/login` -> `App\Controllers\AuthController@login`
* `POST /mvc/login` -> `App\Controllers\AuthController@authenticate`
* `GET /mvc/logout` -> `App\Controllers\AuthController@logout`
* `GET /mvc/usuarios` -> `App\Controllers\UserController@index`

## Authentication

The application uses a simple session-based login flow:

* Login form is rendered at `/mvc/login`
* Credentials are validated in `AuthController::authenticate`
* Successful login stores user data in `$_SESSION['usuario']`
* Access to `/mvc/usuarios` requires `admin` level via `Auth::requireLevel`

> Current demo credentials:
> * email: `admin@email.com`
> * password: `123456`

## How to Run

1. Install dependencies:

```bash
composer install
```

2. Start the PHP built-in server from the project root:

```bash
php -S localhost:8000 -t public
```

3. Open the browser:

```text
http://localhost:8000/mvc/
```

If your project is served from a subfolder like `/mvc`, make sure the router base path in `app/Core/Router.php` matches that folder.

## Extending with MySQL

This project is a good starting point for adding MySQL support:

* Add a `config/database.php` file for PDO connection settings
* Create `app/Models/` for data entities
* Add `app/Repositories/` or database classes for queries
* Replace the hardcoded login and user list with real database queries

Example PDO setup:

```php
$pdo = new PDO('mysql:host=localhost;dbname=your_db;charset=utf8', 'user', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

## Notes

This repository is intentionally small and easy to understand. It is intended as a learning base for PHP MVC concepts and can be expanded into a MySQL-powered application by adding models, repositories, and database configuration.
