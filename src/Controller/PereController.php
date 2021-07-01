<?php

namespace App\Controller;
use App\Entity\Pere;
use App\Form\PereType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin")
 */
class PereController extends AbstractController
{
    /**
     * @Route("/pere", name="app_dashboard_read_dad")
     */
    public function index(): Response
    {
        $peres = $this->getDoctrine()
            ->getManager()
            ->getRepository('App\Entity\Pere')->findAll();

        return $this->render('pere/index.html.twig', [
            'controller_name' => 'PereController',
            'peres' => $peres,
            'title' => "PERE DE FAMILLE"
        ]);
    }

    /** 
    *   @Route("/pere/ajout", name="app_dashboard_create_dad")
    */
    public function create(Request $request)
    {

        $pere = new Pere();
        $form = $this->createForm(PereType::class, $pere);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($pere);
            $em->flush();
            return $this->redirectToRoute('app_dashboard_read_dad');
        }
        
        return $this->render('pere/ajouter.html.twig', [
            'controller_name' => 'PereController',
            'form' => $form->createView(),
        ]);
    }

    
    /**
    * @Route("/pere/edit/{id}", name="app_dashboard_edit_dad")
    */
    public function edit(Pere $pere, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(PereType::class, $pere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();
            //$this->addFlash('success', 'Editer Personne succèss!!!');
            return $this->redirectToRoute('app_dashboard_read_dad');
        }

        return $this->render('pere/modifier.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/pere/delete/{id}", name="app_dashboard_delete_dad")
     */
    public function delete($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $pere = $em->getRepository('App\Entity\Pere');
        $pere = $pere->find($id);
        
        if($pere){
            $em->remove($pere);
            $em->flush();
        }
        return new Response(null, 204);
    }
}
