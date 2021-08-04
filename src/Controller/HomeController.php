<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

    /**
     *@Route("/", name="api-dashboard")
     * @return Response
     */
    public function index():Response
    {
        return new Response('Salut les gens');
    }
}