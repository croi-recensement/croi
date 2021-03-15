<?php

namespace App\Controller;

use App\Entity\Maladie;
use App\Form\SanteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class SanterController extends AbstractController
{
    /**
     * @Route("/sante", name="app_dashboard_santer")
     */
    public function index(): Response
    {
        $maladies = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Maladie')->findAll();

        return $this->render('sante/index.html.twig', [
            'controller_name' => 'SanterController',
            'maladies' => $maladies,
            'title' => 'Département Santé'
        ]);
    }

    /**
     * @Route("/sante/{id}", name="app_dashboard_sante_id")
     */
    public function show(Request $request): Response
    {
        if($request->isXMLHttpRequest()){
            $id = $request->request->get('id');
            $personne = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Personne')->find((int)$id);
                            
            return $this->json($personne, 200);
           
        }
        return new Response('ok');
    }

    /**
     * @Route("/santer/create", name="app_dashboard_sante_create")
     */
    public function create(Request $request){
        
        $maladie = new Maladie();

        $form = $this->createForm(SanteType::class, $maladie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($maladie);
            $em->flush();
            $this->addFlash('success', 'Ajout Maladie avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_santer');
        }
        return $this->render('sante/create.html.twig', [
            'controller_name' => 'SanterController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/sante/edit/{id}", name="app_dashboard_sante_edit")
     */
    public function edit(Maladie $maladie, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(SanteType::class, $maladie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            $this->addFlash('success', 'Edition succèss!!!');
        }

        return $this->render('sante/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/sante/delete/{id}", name="app_dashboard_sante_delete")
     */
    public function delete($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $maladieRepo = $em->getRepository('App\Entity\Maladie');
        $maladie = $maladieRepo->find($id);
        
        if($maladie){
            $em->remove($maladie);
            $em->flush();
            $this->addFlash('success', 'Maladie supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_santer');
        }
        return new Response(null, 204);
    }
}