# Demo With CakePHP
This is a demo application using CakePHP

## Demo

To try a demo of the application, go to:

[cakephp.josephorellana.net](http://cakephp.josephorellana.net)

Use the credentials:

- Admin: **janne@fake.com**
- Normal user: **jperez@fake.com**

With the password **12345**

## Installation

### Requirements

This app is based on CakePHP 3.8 and needs the following requirements:

- **PHP:** >= 5.6.0.
- **PHP:** <= 7.4.x.
- **PHP extensions:** intl, mbstring.
- **Web Server:** rewrite module enabled.

### Database

The database model diagram is as follow

<p align="center" width="100%">
    <img src="https://lh3.googleusercontent.com/d/1CONv11bCtOgr5bdnH8EbfS6vvLKNUS70"> 
</p>

Install a **MariaDB** instance and follow de next steps:

- Login as database root user
```
$ mysql -u root -p
```

- Create a database

```
> CREATE DATABASE database_name;
```

- Create user and asign privileges

```
> CREATE USER 'new_username'@'localhost' IDENTIFIED BY 'secure_password';
> GRANT ALL PRIVILEGES ON database_name.* TO 'new_username'@'localhost';
> FLUSH PRIVILEGES;
> EXIT;
```

- Transfer the **db/demo_with_cakephp.sql** file to the server, this file contains preloaded data

- Import the database

```
$ mysql -u root -p database_name < /path/to/demo_with_cakephp.sql
```

### Application

- Rename app/config/app.default.php file to app/config/app.php

- In a terminal with an operating system with php installed, run the command

```
$ php -r "echo bin2hex(random_bytes(32)) . PHP_EOL;"
```

- Copy result_string and modify the app/config/app.php file by replacing

```
'salt' => env('SECURITY_SALT', '__SALT__'),
```

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;with

```
'salt' => env('SECURITY_SALT', 'result_string'),
```

- Modify the app/config/app.php file with the data from the previously created database

```
'username' => 'new_username',
'password' => 'secure_password',
'database' => 'database_name',
```

- (optional) Disable development mode if you want to install on a production server by editing the app/config/app.php replacing

```
'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),
```

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;with

```
'debug' => filter_var(env('DEBUG', false), FILTER_VALIDATE_BOOLEAN),
```

- Transfer the contents of the app folder to the web server

- In your favorite web server application, set the application startup path to the **webroot** directory

```
/path/to/app/webroot
```

- In the web server application, configure AllowOverride in the webroot directory

Finally, enjoy ;-)