<?php

/**
 * create main routes
 */

$app->mount("/", new App\Controller\IndexController);

$app->mount("/solution", new App\Controller\SolutionController);

