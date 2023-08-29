<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Photos;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\MailService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailService $mailService, ValidatorInterface $validator): Response
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contact = $form->getData();
            $entityManager->persist($contact);
            $entityManager->flush();

            $mailService->sendMail(
                [
                'firstName' => $contact->getFirstName(),
                'lastname' => $contact->getLastName(),
                'message' => $contact->getMessage()
                ],
                $contact->getMail(),
                'Nouveau message !',
                'contact/index.html.twig'
            );

            $contact = new Contact();
            $form = $this->createForm(ContactType::class, $contact);

            $this->addFlash('confirmation', 'Votre email a bien été envoyé !');

        }

        $photo = $entityManager->getRepository(Photos::class)->findAll();

        return $this->render('base.html.twig', [
            'contact_form' => $form->createView(),
            'photo' => $photo,
        ]);
        
    }

}