# QEquations
Solving quadratic equation

1. composer install
2. create database:
 2.1. get Doctrine Console perfoming in cmd: php vendor/doctrine/orm/bin/doctrine
 2.2. in App directory config.php configuration DoctrineServiceProvider delete strine 'dbname' => 'equation'
 2.3. perfom php vendor/doctrine/orm/bin/doctrine dbal:run-sql "CREATE DATABASE NAME"
 2.4. in App directory config.php configuration DoctrineServiceProvider add strine 'dbname' => 'NAME'
 2.5. write correctly path to Entities in App directory config.php(DoctrineOrmServiceProvider()) and config directory bootstrap.php
 2.6. generate etities perfoming:  php vendor/doctrine/orm/bin/doctrine orm:schema-tool:create
