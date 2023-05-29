Documentation for Laravel Blog Project
=====================================

Introduction
------------
This documentation provides an overview of a Laravel blog project that has been developed using Jetstream, Filament, Mailer, and Laravel/ui packages. The project allows users to send messages, receive emails, create, update, and delete posts, and comment on other posts.

Installation
------------
To install the Laravel blog project, follow the below steps:

1. Clone the repository from the GitHub.

```
$ git clone https://github.com/<username>/laravel-blog.git
```

2. Install the dependencies using Composer.

```
$ composer install
```

3. Copy the `.env.example` file to `.env`.

```
$ cp .env.example .env
```

4. Generate a new application key.

```
$ php artisan key:generate
```

5. Configure the `.env` file with your database credentials.

6. Migrate the database.

```
$ php artisan migrate
```

7. Seed the database with sample data.

```
$ php artisan db:seed
```

8. Run the server.

```
$ php artisan serve
```

Usage
-----
Once the project is installed, you can access the application in your browser at `http://localhost:8000`.

Features
--------
The Laravel blog project has the following features:

1. User Authentication - Jetstream
   - The project uses Jetstream for user authentication, which includes registration, login, and logout functionality.
2. Messaging System - Filament
   - Users can send messages to other users using Filament messaging system. 
   - Users can view their received messages and reply to them.

3. Email Notifications - Mailer
   - Users receive email notifications when a new message or comment is posted on their blog.
   - Users can also receive email notifications when a new post is created.

4. CRUD Operations for Posts - Laravel/ui
   - Users can create, read, update, and delete their posts.
   - Users can view all posts and filter them by category.
   - Users can view their own posts on their profile page.

5. Comment System
   - Users can comment on other users' posts.
   - Users can view comments on their own posts.

Conclusion
----------
The Laravel blog project provides a comprehensive solution for creating a simple blog with messaging and email notification functionality. The project uses Jetstream, Filament, Mailer, and Laravel/ui packages to provide users with an easy-to-use interface for creating and managing their blog.
