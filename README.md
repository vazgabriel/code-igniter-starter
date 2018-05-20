# CODE IGNITER STARTER

A CodeIgniter starter template.
This is a simple "CRUD" of users using Bootstrap, Jquery and PHP.

### Pre Requisities

You need to use any apache server and use this folder as root.

#### Make sure you have a backup of root folders

* [WampServer](http://www.wampserver.com/) - Then put all files in "www" folder
* [XAMPP](https://www.apachefriends.org/download.html) - Then put all files in "htdocs" folder

#### Database

This template uses "code_igniter_starter" database, if you want to test, run "assets/database/configDatabase.sql" as MySQL script (you can use MySQL Workbench to do this).

If you want to alter database, just configure in "application/config/database.php".

If you get an error, probably you need to edit database settings, to reconfigure user/password in "application/config/database.php".

### Dev Running

Start the WampServer or XAMPP and access [LocalHost](http://localhost/)

### Prod Running

Put all the files in (www/htdocs) folder and update 'application/config/config.php'.

```
$config['base_url'] = 'http://localhost/';
```

to

```
$config['base_url'] = '...yournewhost.../';
```

### Observations

If you put this folder inside the "www" you need to edit config.php (like above), and update ".htaccess"

Where has
```
RewriteBase /
```

Put

```
RewriteBase /yourfolder/
```

## Author

* **Gabriel Vaz** - [GitHub](https://github.com/vazgabriel)
