# REST API Tutorial – Stage 1

## Overview

This project implements a **secure REST API** using PHP, MySQL, and JWT Bearer Tokens.  
It provides endpoints to manage users and items, with authentication required for certain actions.  

**Stack:**
- PHP 8.3
- MySQL
- JWT (firebase/php-jwt)
- NGINX (for deployment)
- Composer (for dependency management)

---

## Base URL
http://localhost:8000/api


> If using NGINX, base URL: `http://localhost/api`

---

## Authentication

- **Register:** `POST /auth/register`  
  Registers a new user.

- **Login:** `POST /auth/login`  
  Returns a JWT token for authenticated requests.

**JWT Token Usage:**
- Include in headers for protected endpoints:  

Authorization: Bearer <token>


---

## REST API Endpoints

| Endpoint                 | Method | Auth Required | Description                  |
|--------------------------|--------|---------------|------------------------------|
| `/auth/register`         | POST   | No            | Register a new user          |
| `/auth/login`            | POST   | No            | Login and receive JWT token  |
| `/items`                 | GET    | No            | List all items               |
| `/items/{id}`            | GET    | No            | Get single item by ID        |
| `/items`                 | POST   | Yes           | Create a new item            |
| `/items/{id}`            | PUT    | Yes           | Update an item fully         |
| `/items/{id}`            | PATCH  | Yes           | Partially update an item     |
| `/items/{id}`            | DELETE | Yes           | Delete an item               |

---

## Sample Request/Response

### Register

```bash
curl -X POST http://localhost:8000/api/auth/register \
-H "Content-Type: application/json" \
-d '{"name":"Alice","email":"alice@example.com","password":"secret123"}'
```

### Response:

{
  "id": 1,
  "name": "Alice",
  "email": "alice@example.com"
}

### Login

```bash
curl -X POST http://localhost:8000/api/auth/login \
-H "Content-Type: application/json" \
-d '{"email":"alice@example.com","password":"secret123"}'
```

### Response:

{
  "token": "eyJ0eXAiOiJKV1QiLCJh..."
}


### Create Item (Protected)

```bash
curl -X POST http://localhost:8000/api/items \
-H "Content-Type: application/json" \
-H "Authorization: Bearer <token>" \
-d '{"name":"Item A","description":"Sample item"}'
```
### Response:

{
  "id": 1,
  "name": "Item A",
  "description": "Sample item"
}


### List Items

```bash
curl -X GET http://localhost:8000/api/items
```

### Response:
[
  {
    "id": 1,
    "name": "Item A",
    "description": "Sample item"
  }
]


## Running the API (WSL / Local)

### Using PHP Built-in Server

```bash
cd ~/projects/rest-api-stage1/code/public
php -S localhost:8000 router.php
```