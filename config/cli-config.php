<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'bootstrap.php';

/**
 * register Entity Manager for use command line tools
 */
return ConsoleRunner::createHelperSet($entityManager);