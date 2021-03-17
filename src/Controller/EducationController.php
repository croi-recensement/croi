<?php

namespace App\Controller;

use App\Entity\Education;
use App\Entity\Personne;
use App\Form\EducationType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function ArrayHelpers\array_get;

class EducationController extends AbstractController
{
    /**
     * @Route("/education", name="app_dashboard_education")
     */
    public function index(): Response
    {
        $conn = $this->getDoctrine()->getManager()->getConnection();

        $educations = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('App\Entity\Education')->findBy([], ['id' => 'DESC']);

        $personnes = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('App\Entity\Personne')->findAll();
        //EDUQUER
        foreach($educations as $education){
            $tabs[] = $education->getAnneeScolaire();
        }
        $datasLabels =  isset($tabs) ? $tabs : [];
        sort($datasLabels);
        $getValues = array_count_values($datasLabels);

        $nbr_pers = count($personnes);
        $nbr_educs = count($educations);       

       foreach($getValues as $getValue){
           $datasNonEduquer[] = (($nbr_educs - $getValue) * 100) / $nbr_pers;
           $datasEduquer[] = ($getValue * 100) / $nbr_pers;
       }

       $datasData1 =  isset($datasEduquer) ? $datasEduquer : [];
       $datasData2 =  isset($datasNonEduquer) ? $datasNonEduquer : [];
  
       //NON EDUQUER

        return $this->render('education/index.html.twig', [
            'controller_name' => 'EducationController',
            'educations' => $educations,
            'labels' => array_unique($datasLabels),
            'datasOne' => $datasData1,
            'datasTwo' => $datasData2,
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
     * @Route("/education/{id}", name="app_dashboard_education_id")
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