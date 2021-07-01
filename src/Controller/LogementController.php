<?php

namespace App\Controller;

use App\Entity\Logement;
use App\Form\LogementType;
use App\Services\DataPays;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin")
 */
class LogementController extends AbstractController
{
    /**
     * @Route("/logement", name="app_dashboard_logement_read")
     */
    public function index(): Response
    {
        //tous les gens sans filter
        $logements = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Logement')->findAll();
        $countNombre = count($this->getProperty());     
        $countNbrTotal = count($logements);

        $resultatsProprietaire = 0;
        $resultatsAlloue = 0;

        if($countNombre != 0 && $countNbrTotal != 0){
            $resultatsProprietaire = (($countNombre * 100) / $countNbrTotal);
            $resultatsAlloue = (($countNbrTotal - $countNombre) * 100 / $countNbrTotal);
        }
        //les gens sans maison  avec filter

        return $this->render('logement/index.html.twig', [
            'controller_name' => 'LogementController',
            'logements' => $logements,
            'resProp' => $resultatsProprietaire,
            'resAll' => $resultatsAlloue,
            'title' => 'DEPARTEMENT LOGEMENT'
        ]);
    }

    /**
    * @Route("/logement/create", name="app_dashboard_logement_create")
    */
     
    public function create(Request $request, DataPays $datapays){
        $logement = new Logement();
        $form = $this->createForm(LogementType::class, $logement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$pays = $datapays->getProvince($request->get("nomPays"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($logement);
            $em->flush();
            return $this->redirectToRoute('app_dashboard_logement_read');
        }
        return $this->render('logement/ajouter.html.twig', [
            'controller_name' => 'LogementController',
            'form' => $form->createView(),
        ]);
    }

    /**
    *  @Route("/logement/edit/{id}", name="app_dashboard_logement_edit") 
    */
     
    public function edit(Logement $logement, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(LogementType::class, $logement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            return $this->redirectToRoute('app_dashboard_logement_read');
        }

        return $this->render('logement/modifier.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/logement/delete/{id}", name="app_dashboard_logement_delete") 
    */
    
    public function delete($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $logementRepo = $em->getRepository('App\Entity\Logement');
        $logement = $logementRepo->find($id);
        
        if($logement){
            $em->remove($logement);
            $em->flush();

            return new Response(null, 204);
        }
       
    }

    private function getProperty(): Array
    {
         return $property = $this->getDoctrine()
                ->getManager()
                ->getRepository('App\Entity\Logement')->findByOwner();
    }

}