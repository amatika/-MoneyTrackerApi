# Money Tracker API (Laravel)

## Overview

This is a backend-only RESTful API built with Laravel.\
It allows users to manage multiple wallets and track income and expense
transactions.

The API supports: - Creating users (no authentication required) -
Creating multiple wallets per user - Adding income and expense
transactions - Viewing user profile with wallet balances - Viewing a
specific wallet with its transactions

------------------------------------------------------------------------

## System Requirements

-   PHP \>= 8.2
-   Composer
-   MySQL or Sqlite
-   Laravel \>= 12
-   Postman or any API testing tool

------------------------------------------------------------------------

## Project Setup Guide

### 1. Clone the Repository

``` bash
git clone <repository-url>
cd MoneyTrackerApi
```

------------------------------------------------------------------------

### 2. Install Dependencies

``` bash
composer install
```

------------------------------------------------------------------------

### 3. Configure Environment

Copy the example environment file:

``` bash
cp .env.example .env
```

Generate application key:

``` bash
php artisan key:generate
```

Update your `.env` file with your database credentials:

    DB_CONNECTION=sqlite

------------------------------------------------------------------------

### 4. Run Migrations

``` bash
php artisan migrate
```

This will create: - users table - wallets table - transactions table

------------------------------------------------------------------------

### 5. Start Development Server

``` bash
php artisan serve
```

API will run at:

    http://127.0.0.1:8000

------------------------------------------------------------------------

# API Testing Guide

All routes are prefixed with:

    /api

Base URL:

    http://127.0.0.1:8000/api

------------------------------------------------------------------------

## 1. Create User

POST `/api/users`

Body (JSON):

``` json
{
  "name": "Kelvin",
  "email": "kelvin@example.com"
}
```

------------------------------------------------------------------------

## 2. Create Wallet

POST `/api/wallets`

``` json
{
  "user_id": 1,
  "name": "Business Wallet"
}
```

------------------------------------------------------------------------

## 3. Add Income Transaction

POST `/api/transactions`

``` json
{
  "wallet_id": 1,
  "type": "income",
  "amount": 5000,
  "description": "Client payment"
}
```

------------------------------------------------------------------------

## 4. Add Expense Transaction

POST `/api/transactions`

``` json
{
  "wallet_id": 1,
  "type": "expense",
  "amount": 1500,
  "description": "Office supplies"
}
```

------------------------------------------------------------------------

## 5. View Wallet Details

GET `/api/wallets/1`

Response includes: - Wallet balance - All transactions

------------------------------------------------------------------------

## 6. View User Profile

GET `/api/users/1`

Response includes: - All wallets - Each wallet balance - Total balance
across wallets

------------------------------------------------------------------------

# Validation Rules Implemented

-   Required fields enforced
-   Email must be unique
-   Transaction type must be either:
    -   income
    -   expense
-   Amount must be positive (minimum 0.01)
-   Foreign keys must exist

------------------------------------------------------------------------

# Balance Logic

Wallet Balance =

Total Income - Total Expense

User Total Balance =

Sum of all wallet balances

------------------------------------------------------------------------


# Testing Tips

Use Postman or curl.

Example curl command:

``` bash
curl -X GET http://127.0.0.1:8000/api/users/1
```

------------------------------------------------------------------------

# Project Structure Overview

app/ - Models - Http/Controllers/Api

database/ - migrations

routes/ - api.php

