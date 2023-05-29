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

1. Clone the repository from GitHub.

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

* The following commands need to be run on separate terminals

1. Run the schedule:work command to ensure that the scheduled commands are operating.

```
$ php artisan schedule:work
```

2. Run the queue command to make sure that the queued functions are operating (this is important as the post function mainly relies on it!!).

```
$ php artisan queue:work
```

3. Once all the commands are run, a database will be created and an admin account will be created the credentials will be:

* Email : admin@rizme.com
* Password: password


**Note**: All Accounts password are "password", they can be changed from the profile tab

Configurations in .env file
-----
1.basics:
--
* inside the .env file, make sure these options are set correctly
3. APP_URL : make sure it's set on the correct local host displayed on your PHP artisan serve terminal (i.e: if your local host is on port http://localhost:8000 make sure it's set as same)
4. App_KEY : make sure it's present and if not get to step 4 in the Installation section 
5. FILESYSTEM_DISK: you'll mostly find it as "local" switch it to public 

2.Mail:
--
**This is really important to ensure that the mailer is operating**
* make sure that your email configuration is set as the following:
- MAIL_MAILER=smtp
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=587
- MAIL_USERNAME= {{YOUR EMAIL}}
- MAIL_PASSWORD= {{YOUR EMAIL PASSWORD}}
- MAIL_ENCRYPTION=ssl
- MAIL_FROM_ADDRESS= "{{YOUR EMAIL}}"
- MAIL_FROM_NAME=" From Rizme Blog"

* whether you're using google mail or mailtrap or any other mailing services, make sure to follow any of their instructions
- setting up google mailer requires an App password as your Gmail password will Not work for security purposes so please find the instructions in the video to generate an app password:
https://youtu.be/T0Op3Qzz6Ms

- setting up mailtrap
https://youtu.be/yIoKD8HF5rU

Features
--------
The Laravel blog project has the following features:

1. User Authentication - Jetstream
   - The project uses Jetstream for user authentication, which includes registration, login, and logout functionality.
   - Each of the 3 access types (admin, user, moderator) has its privileges and limitations. 
2. Dashboard - Filament
   - Only Admin and Moderators are allowed to access the dashboard.
   - Moderators are allowed to add update and delete posts or unpublish them till further notice.
   - Admins have more access as they have the same privileges and they have access to the users tab where they can change the access type to either moderators or users.
   - there're several status widgets to display the status of every table.

3. Email Notifications - Mailer
   - Users are allowed to send messages (no emails) as cases to be stored in the database.
   - once the user sends a message with a valid email address an automated email will be sent to provide the timeframe for the issue to be sorted.
   - Mods and admin can respond to users via email.
   - if the issue got sorted mods and admin can click on the sorted button and if it's correct it means it has been sorted and will scheduled to be removed from the database automatically.

4. CRUD Operations for Posts - Laravel/UI
   - Users can create, read, update, and delete their posts.
   - Users can view all posts and filter them by category.
   - Users can view their own posts on their profile page.
   - Users can send their complaints as messages and will get responded to via email.

5. Comment System
   - Users can comment on other users' posts.
   - Users can view comments on their own posts.
   - Users can delete their own comments.
   
Other Features
--------
* At the beginning of the day, a new post will automatically be added as a good morning
* Sorted messages will be automatically deleted to avoid memory overload or running out of space
* When the User creates a new post, the action will be set in a queue between 5 and 10 seconds to be created to enhance performance 
* When an email is being sent, the action will be set in a queue for 3 seconds to be sent to enhance performance 

Conclusion
----------
The Laravel blog project provides a comprehensive solution for creating a simple blog with messaging and email notification functionality. The project uses Jetstream, Filament, Mailer, and Laravel/ui packages to provide users with an easy-to-use interface for creating and managing their blogs.
