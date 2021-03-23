<?php

namespace App\Controller;

use App\Form\MailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/email", name="send_email")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(MailType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $message = (new \Swift_Message('Nouveau contact'))
                        ->setFrom($contact['email'])
                        ->setTo('votre@adresse.fr')
                        ->setBody(
                            $this->renderView(
                                'email/email.html.twig', compact('contact')
                            ),
                            'text/html'
                        );

            $mailer->send($message);

            // Ici nous enverrons l'e-mail

            $this->addFlash('success', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
        }
        return $this->render('email/index.html.twig',['form' => $form->createView(), 'title' => 'email']);

    }

}