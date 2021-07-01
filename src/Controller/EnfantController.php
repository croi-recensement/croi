<?php

namespace App\Controller;
use App\Entity\Enfant;
use App\Form\EnfantType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/admin")
*/
class EnfantController extends AbstractController
{
    /**
     * @Route("/enfant", name="app_dashboard_read_child")
     */
    public function index(): Response
    {
        $enfants = $this->getDoctrine()
            ->getManager()
            ->getRepository('App\Entity\Enfant')->findAll();

        return $this->render('enfant/index.html.twig', [
            'controller_name' => 'EnfantController',
            'enfants' => $enfants,
            'title' => "ENFANT DU MEMBRE"
        ]);
    }

    /**
    * @Route("/enfant/ajout", name="app_dashboard_create_child")
    */
    public function create(Request $request)
    {
        $enfant = new Enfant();
        $form = $this->createForm(EnfantType::class, $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();
            return $this->redirectToRoute('app_dashboard_read_child');
        }
        
        return $this->render('enfant/ajouter.html.twig', [
            'controller_name' => 'EnfantController',
            'form' => $form->createView(),
        ]);
    }

    /*
    * @Route("/admin/edit/{id}", name="app_dashboard_admin_edit")
     
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
    }*/

    /**
    * @Route("/enfant/delete/{id}", name="app_dashboard_delete_child")
    */
    public function delete($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $enfants = $em->getRepository('App\Entity\Enfant');
        $enfant = $enfants->find($id);
        
        if($enfant){
            $em->remove($enfant);
            $em->flush();
            return $this->redirectToRoute('app_dashboard_read_child');
        }
        return new Response(null, 204);
    
    }
}
