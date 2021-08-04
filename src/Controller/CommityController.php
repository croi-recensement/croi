<?php

namespace App\Controller;

use App\Entity\Commity;
use App\Entity\Sante;
use App\Entity\Education;
use App\Entity\Social;
use App\Entity\Logement;
use App\Entity\Sport;
use App\Entity\Profession;
use App\Entity\Tabligh;

use App\Form\CommityType;
use App\Form\SanteType;
use App\Form\EducationType;
use App\Form\SocialType;
use App\Form\LogementType;
use App\Form\SportType;
use App\Form\ProfessionType;
use App\Form\TablighType;

use App\Repository\CommityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commity")
 */
class CommityController extends AbstractController
{
    /**
     * @Route("/", name="app_dashboard_commity_read", methods={"GET"})
     */
    public function index(CommityRepository $commityRepository): Response
    {
        return $this->render('commity/index.html.twig', [
            'commities' => $commityRepository->findAll(),
        ]);
    }

   /**
    * @Route("/situation/{situation}", name="app_dashboard_dad_read")
    */
    public function getCommityDad(CommityRepository $commityRepository, Request $request, $situation): Response
    {
        //pere sexe = masculin, situation = marié avoir = enfant
        $listes = $commityRepository->findBy(['situationFamiliale' => $situation]);
        return $this->render('commity/index.html.twig', [
            'commities' => $listes,
            'title' => $situation
        ]);
        
    } 


    /**
     * @Route("/new", name="app_dashboard_commity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        
        $commity = new Commity();
        $education = new Education();
        $social = new Social();
        $logement = new Logement();
        $profession = new Profession();

        $form = $this->createForm(CommityType::class, $commity);

        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            dd('test');
            $commity->addEducation($education);
            $commity->addSocial($social);
            $commity->addLogement($logement);
            $commity->addProfession($profession);
            

            $education->setCommity($commity);
            $social->setCommity($commity);
            $logement->setCommity($commity);
            $profession->setCommity($commity);

            $entityManager->persist($commity);
            $entityManager->persist($education);
            $entityManager->persist($social);
            $entityManager->persist($logement);
            $entityManager->persist($profession);


            $entityManager->flush();
            return $this->redirectToRoute('app_dashboard_commity_read', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commity/new.html.twig', [
            'commity' => $commity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_dashboard_commity_show", methods={"GET"})
     */
    public function show(Commity $commity): Response
    {
        return $this->render('commity/show.html.twig', [
            'commity' => $commity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_dashboard_commity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commity $commity): Response
    {
        $form = $this->createForm(CommityType::class, $commity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_dashboard_commity_read', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commity/edit.html.twig', [
            'commity' => $commity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_dashboard_commity_delete", methods={"POST"})
     */
    public function delete(Request $request, Commity $commity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dashboard_commity_read', [], Response::HTTP_SEE_OTHER);
    }
}
