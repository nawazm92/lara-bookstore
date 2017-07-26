# lara-bookstore
Laravel based simple bookstore app

# Setup
* Clone repo
* Run ```composer install```
* Update your database configuration in .env
* Run ```php artisan migrate```
* Run ```php artisan serve```

# Usage
For web - Register / Login to manage books

For REST API, use Postman OR Advanced REST Client (Chrome Extenstions) to test

Note: REST API required HTTP Basic Authentication, so all your api routes needs Authorization header like following
```Authorization: Basic dXNlckBleGFtcGxlLmNvbTpwYXNzd29yZA==```

# REST API Routes
- GET: /books
- POST: /books
- PUT/PATCH: /books/{bookId}
- DELETE: /books/{bookId}
