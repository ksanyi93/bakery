# Bakery project

## Installation Guide

Follow the steps below to set up the project:

### 1. Clone the repository

```bash
git clone https://github.com/your-repository.git
cd your-repository
```

### 2. Composer install

- Run the following command in the terminal:

```bash
composer install
```

### 3. Create the `.env` file and generate key

- Run the following commands in the order below:

```bash
cp .env.example .env

php artisan key:generate
```

### 4. Set up the environment variables

- Edit the `.env` file to configure your database:

```bash
# Database configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bakery
DB_USERNAME=username
DB_PASSWORD=password
```

### 5. Run migrations

The project uses a database, run migrations to set up the necessary tables:

```bash
php artisan migrate
```

### 6. Run seeder

This seeder will load data to bakery database:

```bash
php artisan db:seed --class=BakerySeeder
```

### 7. Run server

Run the server and enjoy the result:

```bash
php artisan serve
```

---

This guide should help you get the project up and running quickly. If you encounter any issues, please refer to the documentation or contact the maintainer.