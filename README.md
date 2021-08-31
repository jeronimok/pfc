# PFC - Plataforma web de participación ciudadana
Web platform for citizen participation.  
Developed as a final project for the degree in Informatics Engineering at "Universidad Nacional del Litoral".

## Technologies
Laravel, Bootstrap, php, javascript, mysql.

## Installation

### Notes
- The project was developed and tested using Ubuntu 16.04 LTS and Laravel 5.1.
- Correct functioning on other systems and software versions is not guaranteed.
- This installation guide also mentions the alternative steps to install the project on windows and mac in order to make it accessible to all users but it was not tested on those operating systems.

### Windows users:
- Download wamp: http://www.wampserver.com/en/
- Download and extract cmder mini: https://github.com/cmderdev/cmder/releases/download/v1.1.4.1/cmder_mini.zip
- Update windows environment variable path to point to your php install folder (inside wamp installation dir) (here is how you can do this http://stackoverflow.com/questions/17727436/how-to-properly-set-php-environment-variable-to-run-commands-in-git-bash)

### Ubuntu (Mac Os and Windows users also continue here):
- Create a database locally named `pfc` utf8_general_ci 
- Download composer https://getcomposer.org/download/
- Pull from master repo
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders, if any.
- Run `php artisan serve`
-  You can now access the project at https://localhost:8000

### If for some reason your project stops working do these:
- `composer install`
- `php artisan migrate`


## Contact 

- Jerónimo Calace Montú
- jeronimo.calace@gmail.com
