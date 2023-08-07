# PHPProjectGen
Set all necessary components to create a skeleton project in PHP (composer) with PHPunit test cases.
PHP Classes <br>
[![PHP Classes]](https://www.phpclasses.org/package/10938-PHP-Generate-files-for-a-Composer-skeleton-project.html)


Packagist <br>
[![Packagist](https://img.shields.io/packagist/v/elminson/PHPProjectGen.svg)](https://packagist.org/packages/elminson/PHPProjectGen)
[![Packagist](https://img.shields.io/packagist/l/elminson/PHPProjectGen.svg)](https://packagist.org/packages/elminson/PHPProjectGen) 
[![Packagist](https://img.shields.io/packagist/dm/elminson/PHPProjectGen.svg)](https://packagist.org/packages/elminson/PHPProjectGen) 

Codacy<br>
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b2b0c7845281438bafdfce10445a7da5)](https://app.codacy.com/app/elminson/PHPProjectGen?utm_source=github.com&utm_medium=referral&utm_content=elminson/PHPProjectGen&utm_campaign=Badge_Grade_Dashboard)

Scrutinizer <br>
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/elminson/PHPProjectGen/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/elminson/PHPProjectGen/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/elminson/PHPProjectGen/badges/build.png?b=master)](https://scrutinizer-ci.com/g/elminson/PHPProjectGen/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/elminson/PHPProjectGen/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Travis <br>
[![Build Status](https://travis-ci.org/elminson/PHPProjectGen.svg?branch=master)](https://travis-ci.org/elminson/PHPProjectGen)

***Objective***
Create a package to generate php skeleton for package (composer) 

***Usage***
After download run 
```php
composer install
```
or via packagist
```php
composer create-project elminson/phpprojectgen
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

***Execute***
```php
php generate.php
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
