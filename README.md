# PHPProjectGen
Set all necessary components to create a skeleton project in PHP (composer) with PHPunit test cases.
Based on the excellent work of [[Elminson De Oleo Baez](https://www.phpclasses.org/package/3698-PHP-MySQL-database-access-wrapper.html)]


## Usage
After the download run
```php
composer install
```
or if you want to install it via packagist
```php
composer create-project ricci69/phpprojectgen
```

Configure your package (config.json)
```json
{
  "name": "Company",
  "projectname": "NewProject",
  "description": "Project description",
  "phpunit": true,
  "phpunitversion": "~9",
  "developer": "author",
  "email": "author@email.com",
  "license": "MIT",
  "minimum-stability": "stable",
  "type": "project"
}
```

## Execute
Just type
```bash
php generate.php
```
or navigate to
```
http://127.0.0.1/PHPProjectGen/generate.php
```
this will generate a zip file (projectname.zip) with this structure and the correct namespace

```php
src/NewProject.php
tests/testNewProject.php
composer.json
README.md
```
After unzip the file you have to run
```php
composer install
```
and you will have your project up and running in 30 seconds or less.
