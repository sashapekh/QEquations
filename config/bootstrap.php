<?php

require __DIR__ . "/../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../App/config.php';

/**
 * setting up cache
 */
$isDevMode = true;
/**
 * path to the Entities
 */
$paths = array(__DIR__ . "/../App/Entities");

/**
 * Create a configuration with an annotation metadata driver.
 */
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

/**
 * create Entity Manager for database that set with $app
 */
$entityManager = EntityManager::create($app['db.options'], $config);
