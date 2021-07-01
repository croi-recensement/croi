<?php

namespace App\Controller;

use App\Entity\Sport;
use App\Form\SportType;
use App\Services\ChartService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SportController extends AbstractController
{
    /**
     * @Route("/admin/sport", name="app_dashboard_sport")
     */
    public function sport(ChartService $chartService): Response
    {
        $sports = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Sport')->findAll();

        return $this->render('sport/index.html.twig', [
            'controller_name' => 'SportController',
            'sports' => $sports,
            'title' => 'DEPARTEMENT SPORT'
        ]);
    }

    /*
     @Route("/sport/create", name="app_dashboard_sport_create")
     
    public function create(Request $request)
    {
        $sport = new Sport();

        $form = $this->createForm(SportType::class, $sport);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sport);
            $em->flush();
            $this->addFlash('success', 'Ajout Sport avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_sport');
        }
        return $this->render('sport/create.html.twig', [
            'controller_name' => 'SportController',
            'form' => $form->createView(),
        ]);
    }

    
     @Route("/sport/edit/{id}", name="app_dashboard_sport_edit")
     
    public function edit(Sport $sport, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(SportType::class, $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            $this->addFlash('success', 'Edition succèss!!!');
            return $this->redirectToRoute('app_dashboard_sport');
        }

        return $this->render('sport/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    
     @Route("/sport/delete/{id}", name="app_dashboard_sport_delete")
     
    public function delete($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $sportRepo = $em->getRepository('App\Entity\Education');
        $sport = $sportRepo->find($id);
        
        if($sport){
            $em->remove($sport);
            $em->flush();
            $this->addFlash('success', 'Sport supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_sport');
        }
        return new Response(null, 204);
    }*/

}