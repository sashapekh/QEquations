<?php

namespace App\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form;


class IndexController implements ControllerProviderInterface
{
    /**
     * Create Form for input data and obtaining them
     * @param Request $request
     * @param Application $app
     * @return twig template Index/index.twig
     */

    public function index(Request $request, Application $app)
    {
        /**
         * create instance of FormFactory
         */
        $form = $app['form.factory']->create(new \App\Form\InputValue);
        /**
         * when the form submit "handleRequest" write data into form properties
         */
        $form->handleRequest($request);

        /**
         *   check data for validity
         */
        if ($form->isValid()) {

            $data = $form->getData();

            /**
             * insert data to the database and return the record id
             */
            $id = $app['doctrine.manager']->insertData($data);

            return $app->redirect('solution/' . $id);
        }

        return $app['twig']->render('Index/index.twig', array('form' => $form->createView()));
    }


    /**
     * Create route for url: projects/project_1/Web
     * @param Application $app
     * @return instance of ControllerCollection
     */
    public function connect(Application $app)
    {
        $index = $app['controllers_factory'];
        /**
         *  Setting route and call function index
         */
        $index->match('/', 'App\Controller\IndexController::index');

        return $index;
    }
}
