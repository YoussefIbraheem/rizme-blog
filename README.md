Rizme Blog.
=====================================

Introduction
------------
Welcome to Rizme Blog, a dynamic and user-friendly blogging platform built on the powerful Laravel framework. With Rizme Blog, users can easily create, update, and delete posts, as well as engage with other users through comments. Our goal with this project was to provide a seamless user experience while giving administrators the tools they need to maintain a high standard of content quality. Whether you're a casual blogger or a dedicated content creator, Rizme Blog has everything you need to bring your ideas to life. So, let's dive in and explore what makes this project so special!

Requirements
------------

* PHP 8
* Composer
* XAMPP (or another web server software)
* Node.js (and npm)


Installation
------------
To install the Laravel blog project, follow the below steps:

1. Clone the repository from the GitHub.

```
$ git clone https://github.com/YoussefIbraheem/rizme-blog.git
```

2. Install the dependencies using Composer.

```
$ composer install
```

2. Install npm.

```
$ npm install
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
8. Run the npm.

```
$ npm run dev
```


Usage
-----
Once the project is installed, you can access the application in your browser at `http://localhost:8000`.

* The following commands needs to be run on separate terminals

1. Run the schedule:work command to ensure that the scheduled commands are operating.

```
$ php artisan schedule:work
```

2. Run the queue command to make sure that the queued functions are operating (this is important as the post function mainly relies on it!!).

```
$ php artisan queue:work
```
Configurations in .env file
-----
1.basics:
-
* inside the .env file, make sure these options are set correctly
1. APP_URL : make sure it's set on the correct local host displayed on you php artisan serve terminal (i.e: if your local host is on port http://localhost:8000 make sure it's set as same)
2. App_KEY : make sure it's present and if not get to step 4 in the Installation section 
3. FILESYSTEM_DISK: you'll mostly find it as "local" switch it to public 



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
