<?php
namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController extends FOSRestController
{
    protected function handleData($data, int $statusCode = Response::HTTP_OK)
    {
        $view = $this->view($data, $statusCode);

        return $this->handleView($view);
    }
}
