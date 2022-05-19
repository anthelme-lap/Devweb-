<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\EmailModel;
use App\Services\EmailServices;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    // #[Route('/contact', name: 'app_contact')]
    // public function index(): Response
    // {
    //     return $this->render('contact/index.html.twig');
    // }

    #[Route('/contact', name: 'app_contact', methods:['POST','GET'])]
    public function create(
        Request $request,
        EmailServices $emailServices,
        ContactRepository $contactRepository
        ): Response
    {
        $contact = new Contact();
        $user = $this->getUser();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        // dd($contact);
        if($form->isSubmitted() && $form->isValid())
        {
            $contactRepository->add($contact);

            // email du site et nom
            $user = (new User());
            $user->setEmail('aouekoffi88@gmail.com')
                 ->setName('DEVWEB');

            // On recupere les données du form contact dans emailModel
            $email = (new EmailModel());
            $email->setTitle('Bonjour '. $user->getName())
                  ->setSubject('Nouveau de massage de Votre Site')
                  ->setContent("<br> From: ".$contact->getEmail()
                                ."<br> Name: ".$contact->getName()
                                ."<br> Phone: ".$contact->getPhone()
                                ."<br> Subject: ".$contact->getSubject()
                                ."<br><br>".$contact->getContent());

            // Appel de notre service email
            $emailServices->sendEmail($user,$email);
            return $this->redirectToRoute('app_contact');
        }

        return $this->renderForm('contact/index.html.twig',[
            'form' => $form
        ]);
    }
}
