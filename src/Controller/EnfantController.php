<?php

namespace App\Controller;
use App\Entity\Enfants;
use App\Form\EnfantsType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class EnfantController extends AbstractController
{
    /**
     * @Route("/enfant", name="app_dashboard_enfant")
     */
    public function index(): Response
    {
        $enfants = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Enfants')->findAll();

        return $this->render('enfant/index.html.twig', [
            'controller_name' => 'EnfantController',
            'enfants' => $enfants,
            'title' => 'Enfant du membre'
        ]);
    }

    /**
     * @Route("/enfant/create", name="app_dashboard_enfant_create")
     */
    public function create(Request $request)
    {
        $enfant = new Enfants();

       
        $form = $this->createForm(EnfantsType::class, $enfant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();
            $this->addFlash('success', 'Ajout Enfant avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_enfant');
        }
        return $this->render('enfant/create.html.twig', [
            'controller_name' => 'EnfantController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/enfant/{id}", name="app_dashboard_enfant_id")
     */
    public function show(Request $request): Response
    {

        if($request->isXMLHttpRequest()){
            $id = $request->request->get('id');
            $enfant = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Enfants')->find((int)$id);
                                
            //return $this->json($jsonContent, 200);
            return new JsonResponse($enfant);
        }
        return new Response('ok');
    }

    /**
     * @Route("/enfant/edit/{id}", name="app_dashboard_enfant_edit")
     */
    public function edit(Enfants $enfant, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(EnfantsType::class, $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();
            $this->addFlash('success', 'Editer Enfant succèss!!!');
            return $this->redirectToRoute('app_dashboard_enfant');
        }

        return $this->render('enfant/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/enfant/delete/{id}", name="app_dashboard_enfant_delete")
     */
    public function delete($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $enfantRepo = $em->getRepository('App\Entity\Personne');
        $enfant = $enfantRepo->find($id);
        
        if($enfant){
            $em->remove($enfant);
            $em->flush();
            $this->addFlash('success', 'Enfant supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_enfant');
        }
        return new Response(null, 204);
    
    }
}

?>