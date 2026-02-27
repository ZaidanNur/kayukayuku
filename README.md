# Project Kayukayuku

## Live Demo
Check out the live application at: [https://kayukayuku.zaidandev.site/](https://kayukayuku.zaidandev.site/)

### Testing Accounts

**Admin Account:**
- **Email:** `Admin@test.com`
- **Password:** `1234asdf`

**Customer Account:**
- **Email:** `Customer@test.com`
- **Password:** `1234asdf`

---

## About The Project

Kayukayuku is an e-commerce web application built specifically with Laravel, Livewire, and Midtrans integration for payment processing.

### Built With

* [Laravel 12](https://laravel.com)
* [Livewire](https://laravel-livewire.com/)
* [Midtrans PHP](https://docs.midtrans.com/)
* [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v6/introduction)

---

## Getting Started

To get a local copy up and running, follow these simple steps.

### Prerequisites

* PHP >= 8.2
* Composer
* Node.js & NPM
* Database (MySQL/PostgreSQL/SQLite)

### Installation

1. Clone the repository or download the source code.
2. Navigate to the project directory:
   ```bash
   cd kayukayuku
   ```
3. Install PHP dependencies via Composer:
   ```bash
   composer install
   ```
4. Install and compile frontend assets:
   ```bash
   npm install
   npm run build
   ```
5. Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```
6. Generate an application key:
   ```bash
   php artisan key:generate
   ```
7. Configure your database and Midtrans credentials in the `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kayukayuku
   DB_USERNAME=root
   DB_PASSWORD=

   MIDTRANS_SERVER_KEY=your_server_key
   MIDTRANS_CLIENT_KEY=your_client_key
   MIDTRANS_IS_PRODUCTION=false
   ```
8. Run the database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
9. Serve the application:
   ```bash
   php artisan serve
   ```
   *The application will be accessible at `http://localhost:8000`.*
