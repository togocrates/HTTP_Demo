# Laravel 12 HTTP Status Codes Demo

## Features
- Routes and controller methods for common HTTP status codes: 200, 201, 204, 301, 400, 401, 403, 404, 422, 500
- Blade view with buttons for each status code
- Shows response, status code, explanation, and curl example
- Uses Laravel 12 response helpers and exception handling
- Pest/PHPUnit feature test for all routes

## Usage
- Visit `/status-demo` in your browser
- Click a button to trigger a status code and see the result

## Example curl commands
```
curl -i -X GET 'http://localhost/status/ok'           # 200 OK
curl -i -X GET 'http://localhost/status/created'      # 201 Created
curl -i -X GET 'http://localhost/status/nocontent'    # 204 No Content
curl -i -L -X GET 'http://localhost/status/moved'     # 301 Moved Permanently
curl -i -X GET 'http://localhost/status/bad'          # 400 Bad Request
curl -i -X GET 'http://localhost/status/unauthorized' # 401 Unauthorized
curl -i -X GET 'http://localhost/status/forbidden'    # 403 Forbidden
curl -i -X GET 'http://localhost/status/notfound'     # 404 Not Found
curl -i -X GET 'http://localhost/status/unprocessable'# 422 Unprocessable Entity
curl -i -X GET 'http://localhost/status/error'        # 500 Internal Server Error
```

## Test
Run:
```
php artisan test --filter=StatusCodeDemoTest
```
