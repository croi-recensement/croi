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

class SocialController extends AbstractController
{
    /**
     * @Route("/social", name="app_dashboard_social")
     */
    public function index(): Response
    {
        $aideSocials = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Social')->findBy([], ['id' => 'ASC']);

        $personnes = $this->getDoctrine()
                          ->getManager()
                          ->getRepository('App\Entity\Personne')->findAll();

        foreach($aideSocials as $aideSocial){
            $tabsAideSocials[] = $aideSocial->getAnnee();
        }

        $datasLabels =  isset($tabsAideSocials) ? $tabsAideSocials : [];
        sort($datasLabels);
        $getValues = array_count_values($datasLabels);

        $nbr_pers = count($personnes);
        $nbr_pers_aide_social = count($aideSocials);
        $nbr_pers_non_aide_social = $nbr_pers - $nbr_pers_aide_social;

        foreach($getValues as $getValue){
            $datasNonAideSocials[] = ((($nbr_pers_aide_social - $getValue) + $nbr_pers_non_aide_social) * 100) / $nbr_pers;
            $datasAideSocials[] = ($getValue * 100) / $nbr_pers;
        }

        $datasData1 =  isset($datasNonAideSocials) ? $datasNonAideSocials : [];
        $datasData2 =  isset($datasAideSocials) ? $datasAideSocials : [];
        
        return $this->render('social/index.html.twig', [
            'controller_name' => 'SocialController',
            'socials' => $aideSocials,
            'labels' => array_unique($datasLabels),
            'datasData1' => $datasData1,
            'datasData2' => $datasData2,
            'title' => 'Département Social'
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
            $this->addFlash('success', 'Ajout Social avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_social');
        }
        return $this->render('social/create.html.twig', [
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

        return $this->render('social/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/social/{id}", name="app_dashboard_social_id")
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
            $this->addFlash('success', 'Social supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_social');
        }
        return new Response(null, 204);
    }

    
}