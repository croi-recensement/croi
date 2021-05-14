<?php

namespace App\Controller;

use App\Entity\Marie;
use App\Form\MarieType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/communaute")
*/
class MarieController extends AbstractController
{
    /**
     * @Route("/index", name="app_dashboard_femme")
     */
    public function index(): Response
    {
        $maries = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Marie')->findAll();

        return $this->render('marie/index.html.twig', [
            'controller_name' => 'MarieController',
            'femmes' => $maries,
            'title' => 'Femme du membre'
        ]);
    }

    
    /**
     * @Route("/create", name="app_dashboard_femme_create")
     */
    public function create(Request $request)
    {
        $marie = new Marie();

       
        $form = $this->createForm(MarieType::class, $marie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($marie);
            $em->flush();
            $this->addFlash('success', 'Ajout Femme avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_femme');
        }
        return $this->render('marie/create.html.twig', [
            'controller_name' => 'MarieController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="app_dashboard_femme_edit")
     */
    public function edit(Marie $marie, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(MarieType::class, $marie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            $this->addFlash('success', 'Edition succèss!!!');
            return $this->redirectToRoute('app_dashboard_femme');
        }

        return $this->render('marie/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/delete/{id}", name="app_dashboard_femme_delete")
    */
    public function delete($id, Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();
        $marieRepo = $em->getRepository('App\Entity\Marie');
        $marie = $marieRepo->find($id);
        
        if($marie){

            $em->remove($marie);
            $em->flush();
            $this->addFlash('success', 'Femme supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_femme');
        }
        return new Response(null, 204);
    }

}

?>