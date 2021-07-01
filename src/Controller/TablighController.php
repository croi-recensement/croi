<?php

namespace App\Controller;

use App\Entity\Tabligh;
use App\Form\TablighType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TablighController extends AbstractController
{
    /**
     * @Route("/admin/tabligh", name="app_dashboard_tabligh")
     */
    public function index(): Response
    {
        $tablighs = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Tabligh')->findAll();

        return $this->render('tabligh/index.html.twig', [
            'controller_name' => 'TablighController',
            'tablighs' => $tablighs,
            'title' => 'DEPARTEMENT TABLIGH'
        ]);
    }

}