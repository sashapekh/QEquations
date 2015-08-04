<?php

$loader = require __DIR__ . "/../vendor/autoload.php";

/**
 * include files which situated in directory App
 */
$loader->add('App', __DIR__ . '/../');


use Silex\Application;
use Silex\Provider\FormServiceProvider;

/**
 * create container
 */
$app = new Silex\Application();

/**
 * On debug
 */
$app['debug'] = true;

/**
 * register TranslationServiceProvider for include filter "trans"
 */
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.message' => array(),
));

/**
 * register twig
 */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . "/Resources/Views",
));

/*
 * register FormServiceProvider
 */
$app->register(new FormServiceProvider());

/**
 * register manager solution
 */
$app['solution'] = $app->share(
    function () {
        return new App\Models\SolvingEquation();
    });

/**
 * register ValidatorServiceProvider
 */
$app->register(new Silex\Provider\ValidatorServiceProvider());

/**
 *  register DoctrineServiceProvider(database)
 */
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbname' => 'equation',
        'host' => 'localhost',
        'user' => 'root',
        'charset' => 'utf8'
    ),
));

/**
 * register DoctrineORMServiceProvider
 */
$app->register(new \Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider(), array(
    'orm.em.options' => array(
        'mappings' => array(
            array(
                'type' => 'annotation',
                'namespace' => 'App\Entities',
                'path' => __DIR__ . "/../App/Entities/"
            )
        )
    )
));

/**
 * register doctrine manager
 */
$app['doctrine.manager'] = $app->share(
    function ($app) {
        return new App\Models\WorkDatabase($app);
    });

/**
 * include routes
 */
require_once __DIR__ . '/../App/route.php';

