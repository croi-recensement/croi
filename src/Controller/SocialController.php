<?php

namespace App\Controller;

use App\Entity\Social;
use App\Form\SocialType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/** 
* @Route("/admin")
*/
class SocialController extends AbstractController
{
    /**
     * @Route("/social", name="app_dashboard_social_read")
     */
    public function index(): Response
    {

        $socials = $this->getDoctrine()
                          ->getManager()
                          ->getRepository('App\Entity\Social')->findAll();
        
        return $this->render('social/index.html.twig', [
            'controller_name' => 'SocialController',
            'socials' => $socials,
            'title' => 'DEPARTEMENT SOCIAL'
        ]);
    }

    /**
    * @Route("/social/create", name="app_dashboard_social_create") 
    */

    public function create(Request $request)
    {
        $social = new Social();
        $form = $this->createForm(SocialType::class, $social);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($social);
            $em->flush();
            return $this->redirectToRoute('app_dashboard_social');
        }
        return $this->render('social/ajouter.html.twig', [
            'controller_name' => 'SocialController',
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/social/edit/{id}", name="app_dashboard_social_edit") 
    */

    public function edit(Social $social, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(SocialType::class, $social);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            $this->addFlash('success', 'Edition succèss!!!');
            return $this->redirectToRoute('app_dashboard_social');
        }

        return $this->render('social/modifier.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/social/{id}", name="app_dashboard_social_get")
    */
    
    public function show(Request $request): Response
    {
        if($request->isXMLHttpRequest()){
            $id = $request->request->get('id');
            $socials = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Social')->find((int)$id);
            dd($socials);
            return $this->json($socials, 200);
           
        }
        return new Response('ok');
    }

    /**
    * @Route("/social/delete/{id}", name="app_dashboard_social_delete")
    */
    public function delete($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $socialRepo = $em->getRepository('App\Entity\Social');
        $social = $socialRepo->find($id);
        
        if($social){
            $em->remove($social);
            $em->flush();
            return $this->redirectToRoute('app_dashboard_social_read');
        }
        return new Response(null, 204);
    }

    
}