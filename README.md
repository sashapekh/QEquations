# QEquations
<h1>Solving quadratic equation</h1>

<h3>1. composer install</h3>
<h5?2. create database:<h5>
 <p>2.1. get Doctrine Console perfoming in cmd: php vendor/doctrine/orm/bin/doctrine</p>
 <p>2.2. in App directory config.php configuration DoctrineServiceProvider delete strine 'dbname' => 'equation'</p>
 <p>2.3. perfom php vendor/doctrine/orm/bin/doctrine dbal:run-sql "CREATE DATABASE NAME"</p>
 <p>2.4. in App directory config.php configuration DoctrineServiceProvider add strine 'dbname' => 'NAME'</p>
 <p>2.5. write correctly path to Entities in App directory config.php(DoctrineOrmServiceProvider()) and config directory bootstrap.php</p>
 <p>2.6. generate etities perfoming:  php vendor/doctrine/orm/bin/doctrine orm:schema-tool:create</p>
