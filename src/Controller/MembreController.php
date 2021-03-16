<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Entity\Membre;
use App\Form\MembreType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class MembreController extends AbstractController
{
    /**
     * @Route("/membre", name="app_dashboard_membre")
     */
    public function index(): Response
    {
        //all of member
        $membres = $this->getDoctrine()
                          ->getRepository('App\Entity\Membre')->findAll();


        return $this->render('membre/index.html.twig', [
            'controller_name' => 'MembreController',
            'membres' => $membres,
            'title' => 'LES MEMBRES DU COMMUNAUTEE'
        ]);
        //findPersonneParent
    }

    /**
     * @Route("/membre/create", name="app_dashboard_create")
     */
    public function create(Request $request)
    {
       $membre = new Membre();


        $form = $this->createForm(MembreType::class, $membre);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();
            $this->addFlash('success', 'Ajout Membre avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_membre');
        }
        return $this->render('membre/create.html.twig', [
            'controller_name' => 'MembreController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/membre/{id}", name="app_dashboard_membre_id")
     */
    public function show(Request $request): Response
    {
        if($request->isXMLHttpRequest()){
            $id = $request->request->get('id');
            $membre = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Membre')->find((int)$id);
                            
            return $this->json($membre, 200);
           
        }
        return new Response('ok');
    }

    /**
     * @Route("/membre/edit/{id}", name="app_dashboard_membre_edit")
     */
    public function edit(Membre $membre, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            $this->addFlash('success', 'Edition succèss!!!');
            return $this->redirectToRoute('app_dashboard_membre');
        }

        return $this->render('membre/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/membre/delete/{id}", name="app_dashboard_membre_delete")
     */
    public function delete($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $membreRepo = $em->getRepository('App\Entity\Membre');
        $membre = $membreRepo->find($id);
        
        if($membre){
            $em->remove($membre);
            $em->flush();
            $this->addFlash('success', 'Membre supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_membre');
        }
        return new Response(null, 204);
    
    }


}