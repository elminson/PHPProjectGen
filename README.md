# PHPProjectGen
[![Build Status](https://travis-ci.org/elminson/PHPProjectGen.svg?branch=master)](https://travis-ci.org/elminson/PHPProjectGen)

#### Objective
Create a package to generate php skeleton for package (composer) 

#### Usage:
After download run 
```php
composer install
```
Configure your package (config.json)
```json 
{
  "name": "Elminson",
  "projectname": "NewProject",
  "description": "Project description",
  "phpunit": true,
  "developer": "Elminson De Oleo Baez",
  "email": "edeoleo@gmail.com",
  "license": "MIT",
  "minimum-stability": "dev",
  "type": "project"
}
```

#### Execute 
```php
php generate.php
```
this will generate a zip file (projectname.zip) with this structure and the correct namespace

```
src/NewProject.php
tests/testNewProject.php
composer.json
README.md
```
After unzip the file you have to run 
```php
composer install
```
and you will have your project up and running in 5 minutes or less.

