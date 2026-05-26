# Grace Fellowship Church Website

A small PHP church website starter built for a XAMPP-style environment.

## Pages

- `index.php` - home page
- `about.php` - church story and values
- `ministries.php` - ministry list
- `events.php` - upcoming events
- `sermons.php` - recent sermons
- `contact.php` - contact page with a demo form response

## Run with PHP

From this folder:

```powershell
php -S 127.0.0.1:8000 -t .
```

Open:

```text
http://127.0.0.1:8000
```

## Run with XAMPP

Copy or move this project folder into:

```text
C:\xampp\htdocs\
```

Then start Apache in the XAMPP Control Panel and open:

```text
http://localhost/so-i-have-a-php-environment
```

## Update Church Content

Most demo text lives in:

```text
includes/data.php
```

That file is the easiest place to update the church name, address, service times, ministries, events, and sermons before we connect MySQL.
