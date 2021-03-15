<?php

namespace App\Controller;

use App\Entity\Education;
use App\Form\EducationType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EducationController extends AbstractController
{
    /**
     * @Route("/education", name="app_dashboard_education")
     */
    public function index(): Response
    {
        $educations = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Education')->findAll();

        return $this->render('education/index.html.twig', [
            'controller_name' => 'EducationController',
            'educations' => $educations,
            'title' => 'Département Education'
        ]);
    }

    /**
     * @Route("/education/create", name="app_dashboard_education_create")
     */
    public function create(Request $request)
    {
        $education = new Education();

        $form = $this->createForm(EducationType::class, $education);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($education);
            $em->flush();
            $this->addFlash('success', 'Ajout Education avec succèss!!!');
            return $this->redirectToRoute('app_dashboard_education');
        }
        return $this->render('education/create.html.twig', [
            'controller_name' => 'EducationController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/education/edit/{id}", name="app_dashboard_education_edit")
     */
    public function edit(Education $education, Request $request, EntityManagerInterface $em):Response
    {
        $form = $this->createForm(EducationType::class, $education);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $em->flush();
            $this->addFlash('success', 'Edition succèss!!!');
            return $this->redirectToRoute('app_dashboard_education');
        }

        return $this->render('education/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/education/delete/{id}", name="app_dashboard_education_delete")
     */
    public function delete($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $educationRepo = $em->getRepository('App\Entity\Education');
        $education = $educationRepo->find($id);
        
        if($education){
            $em->remove($education);
            $em->flush();
            $this->addFlash('success', 'Education supprimer avec success !!!');
            return $this->redirectToRoute('app_dashboard_education');
        }
        return new Response(null, 204);
    }

}