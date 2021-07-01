<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MembreController extends AbstractController
{
    /**
     * @Route("/admin", name="app_membre")
     */
    public function index(): Response
    {
        $personnes = $this->getDoctrine()
            ->getManager()
            ->getRepository('App\Entity\Membre')->findAll();

        return $this->render('membre/index.html.twig', [
            'controller_name' => 'MembreController',
            'membres' => $personnes,
            'title' => 'Ajouter des Membres'
        ]);
    }

    /*
    @Route("/admin/ajout", name="app_dashboard")
     
    public function create(Request $request)
    {

        $pere = new Pere();

        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();
            $this->addFlash('success', 'Ajout personne avec succèss!!!');
            return $this->redirectToRoute('app_dashboard');
        }
        
        return $this->render('personne/create.html.twig', [
            'controller_name' => 'MembreController',
            'form' => $form->createView(),
        ]);
    }

    
     @Route("/admin/edit/{id}", name="app_dashboard_admin_edit")
     
    public function edit(Personne $personne, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();
            $this->addFlash('success', 'Editer Personne succèss!!!');
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('personne/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
    @Route("/admin/delete/{id}", name="app_dashboard_admin_delete")
     
    public function delete($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $personneRepo = $em->getRepository('App\Entity\Personne');
        $personne = $personneRepo->find($id);
        
        if($personne){
            $em->remove($personne);
            $em->flush();
            $this->addFlash('success', 'Personne supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard');
        }
        return new Response(null, 204);
    
    } */
}
