<?php

namespace App\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;


class SolutionController implements ControllerProviderInterface
{
    /**
     * Find for solutions to the quadratic equation
     * @param Application $app
     * @param Request $request
     * @return twig template Solutions/solution.twig
     */

    public function solution(Application $app, $id)
    {
        /**
         * get data from a database record id
         */
        $data = $app['doctrine.manager']->fetchingData($id)->getCoefficient();
        /**
         * deleting data from a database record id
         */
        $app['doctrine.manager']->deletingData($id);

        /**
         * find solutions
         */
        $result = $app['solution']->evaluate($data[0], $data[1], $data[2]);

        return $app['twig']->render('Solutions/solution.twig', array(
            'a' => $data['0'],
            'b' => $data['1'],
            'c' => $data['2'],
            'result' => $result
        ));
    }

    /**
     * Create route for url: projects/project_1/Web/solution/{id}
     * @param Application $app
     * @return instance of ControllerCollection
     */

    public function connect(Application $app)
    {
        $solution = $app['controllers_factory'];

        /**
         *  Setting route and call function solutions
         */
        $solution->get('/{id}', 'App\Controller\SolutionController::solution');

        return $solution;
    }
}

