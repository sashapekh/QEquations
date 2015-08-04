<?php

namespace App\Models;

use App\Entities\Coefficient;
use Symfony\Component\Config\Definition\Exception\Exception;


class WorkDatabase
{
    /**
     * @var
     * container of Silex
     */
    private $app;

    /**
     * @param $app
     * Container of Silex
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param array $data
     * @param int $id
     * @throws Exception
     */
    public function validateGetData($data, $id)
    {
        if (!$data) {
            throw new Exception('This object don"t exist  in database with id  = ' . $id);
        }
    }

    /**
     * @param array $data
     * @return int
     */
    public function insertData($data)
    {
        $newEquations = new Coefficient();
        $newEquations->setCoefficient($data['coefA'], $data['coefB'], $data['coefC']);
        $this->app['orm.em']->persist($newEquations);
        $this->app['orm.em']->flush();

        return $newEquations->getId();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function fetchingData($id)
    {
        $coeff = $this->app['orm.em']->getRepository('App\Entities\Coefficient')->findOneById($id);
        $this->validateGetData($coeff, $id);

        return $coeff;
    }

    /**
     * @param  int $id
     */
    public function updateData($id)
    {
        $post = $this->app['orm.em']->getRepository('App\Entities\Coefficient')->findOneById($id);
        $this->validateGetData($post, $id);
        $post->setValue(12);
        $this->app['orm.em']->flush();
    }

    /**
     * @param int $id
     */
    public function deletingData($id)
    {
        $post = $this->app['orm.em']->getRepository('App\Entities\Coefficient')->findOneById($id);
        $this->validateGetData($post, $id);
        $this->app['orm.em']->remove($post);
        $this->app['orm.em']->flush();
    }
}