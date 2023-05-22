## Laravel Livewire

This repository contains the source code for Category and Service CRUD operation.


## Features

The Laravel Livewire offers the following features:

- **Category CRUD:** Users will be able to create, update and delete category.
- **Service CRUD:** Users will be able to create, update and delete service. Also They can filter for services based on category selection.



## Installation

To set up the Social Post API on your local machine, follow these steps:

- Clone the repository using the following command:

```
git clone https://github.com/saanchita-paul/laravel-liverwire
```

- Navigate to the cloned directory:

```
cd laravel-liverwire
```
- Install dependencies:

```
composer install
```

- Copy the .env.example file to .env:

```
cp .env.example .env
```
- Generate an application key:

```
php artisan key:generate
```

- Configure the database in the .env file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
- Migrate the database:

```
php artisan migrate
```

- Run the following command to seed the database:

```
php artisan db:seed
```

- Start the development server:

```
php artisan serve
```

- Visit [localhost](http://localhost:8000) in your web browser to use the application.

