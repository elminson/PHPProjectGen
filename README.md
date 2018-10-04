# PHPProjectGen

#### Objective
Create a package to generate skeleton for package 

####Usage:
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

Execute 
```php
php generate.php
```

This will generate this structure

```
src/NewProject.php
tests/testNewProject.php
composer.json
README.md
```
