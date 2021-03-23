<?php

namespace App\Controller;

use App\Form\ExcelType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExcelController extends AbstractController
{
    /**
     * @Route("/import", name="app_import_excel")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(ExcelType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) { 
            $data = $form->getData();
            if($data['file']->getMimeType() == 'application/csv'){

            }else{
                $this->addFlash('error', 'Ce genre de fichier ne peux pas UPLOADER, veuillez inserer un fichier de type CSV');
            }

        }

        return $this->render('excel/index.html.twig', ['form' => $form->createView()]);

    }

}