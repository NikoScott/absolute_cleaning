<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{

    private $security; 
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        // si pas admin -> home sinon back office
        if (!$this->security->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_home');
        } else {
            return $this->redirectToRoute('admin');
        }


        /////// FORMULAIRE POUR CREER L'ADMIN UNE FOIS //////
        // pour créer un nouvel id dé-commenter et commenter la redirection


        // $user = new User();
        // $form = $this->createForm(RegistrationFormType::class, $user);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     // encode the plain password
        //     $user->setPassword(
        //         $userPasswordHasher->hashPassword(
        //             $user,
        //             $form->get('plainPassword')->getData()
        //         )
        //     );

        //     $entityManager->persist($user);
        //     $entityManager->flush();
        //     // do anything else you need here, like send an email

        //     // Redirect to another route after successful registration
        //     return $this->redirectToRoute('app_home');   
        
        // }

        // return $this->render('registration/register.html.twig', [
        //     'registrationForm' => $form->createView(),
        // ]);
    }
}
