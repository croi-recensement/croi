<?php

namespace App\Controller;

use App\Entity\Education;
use App\Form\EducationType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function ArrayHelpers\array_get;

/**
* @Route("/admin")
*/
class EducationController extends AbstractController
{
    /**
     * @Route("/education", name="app_dashboard_education_read")
     */
    public function index(): Response
    {
        $educations = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('App\Entity\Education')->findAll();

        return $this->render('education/index.html.twig', [
            'controller_name' => 'EducationController',
            'educations' => $educations,
            'title' => 'DEPARTEMENT EDUCATION'
        ]);
    }

    /**
    * @Route("/education/ajout", name="app_dashboard_education_create")
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
            return $this->redirectToRoute('app_dashboard_education_read');
        }
        return $this->render('education/ajouter.html.twig', [
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
            return $this->redirectToRoute('app_dashboard_education_read');
        }

        return $this->render('education/modifier.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/education/{id}", name="app_dashboard_education_get")
    */
    public function show(Request $request): Response
    {
        if($request->isXMLHttpRequest()){
            $id = $request->request->get('id');
            $education = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Education')->find((int)$id);
                            
            return $this->json($education, 200);
           
        }
        return new Response('ok');
    }

    /**
    * @Route("/education/delete/{id}", name="app_dashboard_education_delete")
    */
    public function delete($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $educations = $em->getRepository('App\Entity\Education');
        $education = $educations->find($id);
        if($education){
            $em->remove($education);
            $em->flush();
            return $this->redirectToRoute('app_dashboard_education_delete');
        }
        return new Response(null, 204);
    }

}