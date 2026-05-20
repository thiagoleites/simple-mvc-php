![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-PSR--4-885630?logo=composer&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-green)
![Status](https://img.shields.io/badge/status-learning%20project-blue)

# Simple PHP MVC Application

A lightweight PHP MVC skeleton built with pure PHP and PSR-4 autoloading. This project demonstrates a clean separation between routes, controllers, views, authentication, and environment configuration. It was designed as a minimal learning foundation that can evolve into a complete production-ready application.

---

## Features

✔ Simple MVC architecture with Controllers, Views and Core classes  
✔ Custom routing system using `routes/web.php`  
✔ Front Controller pattern via `public/index.php`  
✔ Session-based authentication system  
✔ Route protection with authorization levels  
✔ PSR-4 autoloading via Composer  
✔ Native `.env` support without external libraries  
✔ Environment example file included (`.env.example`)  
✔ Lightweight and beginner-friendly structure  

---

## Project Structure

```text
/
├── app/
│   ├── Controllers/     # Request handling and page logic
│   ├── Core/            # Router, Controller, Auth, Env
│   └── Views/           # View templates and layouts
│
├── public/
│   └── index.php        # Application entry point
│
├── routes/
│   └── web.php          # Route definitions
│
├── .env.example         # Environment configuration example
├── composer.json        # PSR-4 autoload configuration
├── vendor/              # Composer dependencies
```

---

## Routes

Current routes:

```text
GET    /mvc/             -> HomeController@index
GET    /mvc/login        -> AuthController@login
POST   /mvc/login        -> AuthController@authenticate
GET    /mvc/logout       -> AuthController@logout
GET    /mvc/usuarios     -> UserController@index
```

---

## Authentication

The application currently uses a simple session-based authentication flow.

Workflow:

- Login page rendered at:

```text
/mvc/login
```

- Credentials validated by:

```php
AuthController::authenticate()
```

- User data stored in:

```php
$_SESSION['usuario']
```

- Protected pages require authorization:

```php
Auth::requireLevel()
```

Current demo credentials:

```text
Email: admin@email.com
Password: 123456
```

---

## Environment Configuration

The project includes native `.env` loading without requiring external packages.

Create your local environment file:

```bash
cp .env.example .env
```

Example:

```env
APP_NAME='MINI MVC'

APP_ENV=development
APP_KEY=base
APP_DEBUG=true
APP_URL=http://localhost/mvc

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Environment values can be accessed using:

```php
Env::get('DB_HOST');
```

or:

```php
getenv('DB_HOST');
```

---

## Installation

Install Composer dependencies:

```bash
composer install
```

Run the PHP development server:

```bash
php -S localhost:8000 -t public
```

Open:

```text
http://localhost:8000/mvc/
```

If your project runs inside a subdirectory such as `/mvc`, make sure the router base path matches your application folder.

---

## Future Improvements

Planned evolution:

- Models
- Database abstraction
- Repository pattern
- Middleware
- Validation
- Flash messages
- Dependency Injection
- PDO database layer
- Migration system
- Role permissions
- API support

---

## Extending with MySQL

Example PDO configuration:

```php
$pdo = new PDO(
    'mysql:host=localhost;dbname=your_db;charset=utf8',
    'user',
    'password'
);

$pdo->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
```

Suggested future structure:

```text
app/
├── Models/
├── Repositories/
├── Services/
```

---

## Notes

This project intentionally keeps the structure small and easy to understand. Its goal is to provide a practical way to learn PHP MVC concepts and progressively evolve into a larger application architecture.

---

## Support The Project ⭐

If you're following this project, using it in your own applications, or learning from it, consider giving it a star.

Your support helps the project grow and motivates future improvements.

⭐ Star the repository and follow the journey.