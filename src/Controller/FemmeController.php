<?php

namespace App\Controller;

use App\Entity\Femme;
use App\Form\FemmesType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class FemmeController extends AbstractController
{
    /**
     * @Route("/femme", name="app_dashboard_femme")
     */
    public function index(): Response
    {
        $femmes = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Femme')->findAll();

        return $this->render('femme/index.html.twig', [
            'controller_name' => 'FemmeController',
            'femmes' => $femmes,
            'title' => 'Femme du membre'
        ]);
    }

    
    /**
     * @Route("/femme/create", name="app_dashboard_femme_create")
     */
    public function create(Request $request)
    {
        $femme = new Femme();

       
        $form = $this->createForm(FemmesType::class, $femme);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($femme);
            $em->flush();
            $this->addFlash('success', 'Ajout Femme avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_femme');
        }
        return $this->render('femme/create.html.twig', [
            'controller_name' => 'FemmeController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/femme/edit/{id}", name="app_dashboard_femme_edit")
     */
    public function edit(Femme $femme, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(FemmesType::class, $femme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            $this->addFlash('success', 'Edition succèss!!!');
            return $this->redirectToRoute('app_dashboard_femme');
        }

        return $this->render('femme/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/femme/delete/{id}", name="app_dashboard_femme_delete")
    */
    public function delete($id, Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();
        $femmeRepo = $em->getRepository('App\Entity\Femme');
        $femme = $femmeRepo->find($id);
        
        if($femme){

            $em->remove($femme);
            $em->flush();
            $this->addFlash('success', 'Femme supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_femme');
        }
        return new Response(null, 204);
    }

}

?>