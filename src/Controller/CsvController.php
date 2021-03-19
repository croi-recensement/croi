<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CsvController extends AbstractController
{

    /**
    * @Route("/import", name="app_dashboard_import")
    */
    public function import(){

        return $this->render('csv/index.html.twig', [
            'controller_name' => 'CsvController',
            'title' => 'IMPORTATION DATA'
        ]);
    }
}

?>