<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Form\PersonneType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonneController extends AbstractController
{
    /**
     * @Route("/admin", name="app_dashboard")
     */
    public function index(): Response
    {
        $personnes = $this->getDoctrine()
            ->getManager()
            ->getRepository('App\Entity\Personne')->findAll();

        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
            'personnes' => $personnes,
            'title' => 'Inscription du Personne'
        ]);
    }

    /**
     * @Route("/admin/ajout", name="app_dashboard_admin_create")
     */
    public function create(Request $request)
    {

        $personne = new Personne();

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
            'controller_name' => 'PersonneController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/edit/{id}", name="app_dashboard_admin_edit")
     */
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

    /**
     * @Route("/admin/delete/{id}", name="app_dashboard_admin_delete")
     */
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
    
    }
}
