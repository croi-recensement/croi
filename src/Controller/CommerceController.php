<?php

namespace App\Controller;

use App\Entity\Commerce;
use App\Form\CommerceType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CommerceController extends AbstractController
{
    /**
     * @Route("/commerce", name="app_dashboard_commerce")
     */
    public function commerce(): Response
    {
        $commerces = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Commerce')->findAll();

        return $this->render('commerce/index.html.twig', [
            'controller_name' => 'CommerceController',
            'commerces' => $commerces,
            'title' => 'Département Commerce'
        ]);
    }

    /**
     * @Route("/commerce/create", name="app_dashboard_commerce_create")
     */
    public function create(Request $request)
    {

        $societe = new Commerce();

        $form = $this->createForm(CommerceType::class, $societe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($societe);
            $em->flush();
            $this->addFlash('success', 'Ajout Commerce avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_commerce');
        }
        return $this->render('commerce/create.html.twig', [
            'controller_name' => 'CommerceController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/commerce/edit/{id}", name="app_dashboard_commerce_edit")
     */
    public function edit(Commerce $societe, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(CommerceType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();
            $this->addFlash('success', 'Editer Commerce succèss!!!');
            return $this->redirectToRoute('app_dashboard_commerce');
        }

        return $this->render('commerce/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/commerce/delete/{id}", name="app_dashboard_commerce_delete")
     */
    public function delete($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $commerceRepo = $em->getRepository('App\Entity\Societe');
        $commerce = $commerceRepo->find($id);
        
        if($commerce){
            $em->remove($commerce);
            $em->flush();
            $this->addFlash('success', 'Commerce supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_commerce');
        }
        return new Response(null, 204);
    
    }

}