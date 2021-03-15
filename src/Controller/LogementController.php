<?php

namespace App\Controller;

use App\Entity\Logement;
use App\Form\LogementType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogementController extends AbstractController
{
    /**
     * @Route("/logement", name="app_dashboard_logement")
     */
    public function index(): Response
    {
        $logements = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Logement')->findAll();

        return $this->render('logement/index.html.twig', [
            'controller_name' => 'LogementController',
            'logements' => $logements,
            'title' => 'Département Logement'
        ]);
    }

    /**
     * @Route("/logement/create", name="app_dashboard_logement_create")
     */
    public function create(Request $request){
        
        $logement = new Logement();

        $form = $this->createForm(LogementType::class, $logement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($logement);
            $em->flush();
            $this->addFlash('success', 'Ajout Logement avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_logement');
        }
        return $this->render('logement/create.html.twig', [
            'controller_name' => 'LogementController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/logement/edit/{id}", name="app_dashboard_logement_edit")
     */
    public function edit(Logement $logement, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(LogementType::class, $logement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            $this->addFlash('success', 'Edition succèss!!!');
            return $this->redirectToRoute('app_dashboard_logement');
        }

        return $this->render('logement/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/logement/delete/{id}", name="app_dashboard_logement_delete")
    */
    public function delete($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $logementRepo = $em->getRepository('App\Entity\Education');
        $logement = $logementRepo->find($id);
        
        if($logement){
            $em->remove($logement);
            $em->flush();
            $this->addFlash('success', 'Logement supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_logement');
        }
        return new Response(null, 204);
    }

}