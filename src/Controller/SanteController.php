<?php

namespace App\Controller;
use App\Entity\Sante;
use App\Form\SanteType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/admin")
 */
class SanteController extends AbstractController
{
    /**
     * @Route("/sante", name="app_dashboard_read_sante")
     */
    public function index(): Response
    {
        $santes = $this->getDoctrine()->getManager()
                          ->getRepository('App\Entity\Sante')->findAll();

        return $this->render('sante/index.html.twig', [
            'controller_name' => 'SanterController',
            'santes' => $santes,
            'title' => 'DEPARTEMENT SANTE'
        ]);
    }

    /*
    * @Route("/sante/get/{id}", name="app_dashboard_get_sante")
    */

    /*public function editById(Request $request): Response
    {
        if($request->isXMLHttpRequest()){
            $id = $request->request->get('id');
            $personne = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Personne')->find((int)$id);
                            
            return $this->json($personne, 200);
           
        }
        return new Response('ok');
    }*/

    /**
    * @Route("/sante/ajout", name="app_dashboard_create_sante") 
    */
    public function create(Request $request){
        
        $sante = new Sante();

        $form = $this->createForm(SanteType::class, $sante);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sante);
            $em->flush();
            //$this->addFlash('success', 'Ajout Maladie avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_read_sante');
        }
        return $this->render('sante/ajouter.html.twig', [
            'controller_name' => 'SanteController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/sante/edit/{id}", name="app_dashboard_edit_sante")
     */
    public function edit(Sante $sante, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(SanteType::class, $sante);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            //$this->addFlash('success', 'Edition succèss!!!');
            return $this->redirectToRoute('app_dashboard_read_sante');
        }
        return $this->render('sante/modifier.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/sante/delete/{id}", name="app_dashboard_delete_sante")
    */
    public function delete($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $santes = $em->getRepository('App\Entity\Sante');
        $sante = $santes->find($id);
        
        if($sante){
            $em->remove($sante);
            $em->flush();
            //$this->addFlash('success', 'Maladie supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_read_sante');
        }
        return new Response(null, 204);
    }
}