<?php

namespace App\Controller;

use App\Entity\Mere;
use App\Form\MereType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
* @Route("/admin")
*/
class MereController extends AbstractController
{
    /**
     * @Route("/mere", name="app_dashboard_read_mere")
     */
    public function index(): Response
    {
        $meres = $this->getDoctrine()
            ->getManager()
            ->getRepository('App\Entity\Mere')->findAll();

        return $this->render('mere/index.html.twig', [
            'controller_name' => 'MereController',
            'meres' => $meres,
            'title' => "FEMME DU MEMBRE"
        ]);
    }

    /** 
    *  @Route("/mere/ajout", name="app_dashboard_create_mere")
    */
    public function create(Request $request)
    {
        $mere = new Mere();
        $form = $this->createForm(MereType::class, $mere);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mere);
            $em->flush();
            return $this->redirectToRoute('app_dashboard_read_mere');
        }
        
        return $this->render('mere/ajouter.html.twig', [
            'controller_name' => 'MereController',
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/mere/edit/{id}", name="app_dashboard_edit_dad")
    */
    public function edit(Mere $mere, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(MereType::class, $mere);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            //$this->addFlash('success', 'Editer Personne succèss!!!');
            return $this->redirectToRoute('app_dashboard_create_mere');
        }
        return $this->render('mere/modifier.html.twig', [
            'form' => $form->createView()
        ]);
    }
    

    /**
     * @Route("/mere/delete/{id}", name="app_dashboard_delete_mere")
     */
    public function delete($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $mere = $em->getRepository('App\Entity\Mere');
        $mere = $mere->find($id);
        
        if($mere){
            $em->remove($mere);
            $em->flush();
        }
        return new Response(null, 204);
    }
}
