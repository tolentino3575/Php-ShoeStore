#Shoes Code Review
PHP week 4 code review: Database Extended

##Author

This project was created by Erik Tolentino

##Description

This page will allow the user to add store names and brand names to the page. The user has the ability to add brands to stores, or add stores to brands. The user has the ability to update the name of the store, as well as delete the store individually, or delete all the stores at once.

##Known Bugs
The function to update the name of the store does not work completely. The user can edit the name, and it will display the edited name on the following page, but no where else.

#Setup

To View:
* Git clone this repository

* From terminal, enter "mysql.server start" to start the MySQL servers and enter mysql shell
* Next enter "mysql -uroot -proot" to set username and password for PhpMyAdmin

* From bash terminal, enter "apachectl start" to start PhpMyAdmin
* In browser, type "localhost:8080/phpmyadmin"
* If prompted, both your username and password are "root"

* From PhpMyAdmin, import "shoes" and "shoes_test" databases included in php-shoestore-cr folder

* From mysql shell in terminal, enter "USE shoes;" to enter database

* From bash terminal, run "composer install" while in project root folder

* From bash terminal, enter "php -S localhost:8000" while in the web folder

* To view, type "localhost:8000" in browser

#Technologies Used:

* Php
* PhpMyAdmin
* Apache
* MySQL
* PHPUnit
* Silex
* Twig
* Atom
* Terminal
* GitHub
* Bootstrap
* HTML

#Legal

* MIT Licensed
* Copyright (c) 2016 Erik Tolentino
