### Properties Management Portal
 
## Table of Contents
 - Introduction
 - Features
 - Installation
 - Configuration
 - Contact


## Introduction
This is a Laravel project for the Advocate Case Dairy  Management Portal. It's a web application that allows Advocates to manage their cases efficiently. 

## Features

- Advocates can create, update, and delete cases.
- Advocates can view the details of a case.
- Advocates can add comments to a case.
- This will help advocate to get list of their cases date wise.\
- Thy can filter cases by date, name and number.


## Installation

To get a local copy up and running, follow these steps.

# Prerequisites

 - PHP version 7.4 or higher
 - Composer
 - MySQL
 - Node.js & NPM

# Installation

## Steps
1. Clone the repository:
```bash
git clone https://github.com/creativesaiful/Advocate-diary.git
```

2. Navigate to the project directory:
```bash
cd Advocate-diary
```

3. Install dependencies:
```bash
composer install
```


4. Copy .env.example to .env:
5. Create a database on your phpmyadmin or mysql server with any name. Paste the database name in .env file and configure it.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

6. Install NPM packages:
```bash
npm install 
npm run build
```
7. Run migrations:

```bash
php artisan migrate
```

8. Seed the database

```bash
php artisan db:seed
```

9. Generate application key:

```bash
php artisan key:generate
```

10.  Link the storage folder:

```bash
php artisan storage:link
```

11. Run the server:

```bash 
php artisan serve
```

12. Access the application at http://localhost:8000
13. Visit http://localhost:8000/admin/login in your browser to login as admin.



