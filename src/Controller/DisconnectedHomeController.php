<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class DisconnectedHomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        if($this->getUser() == null){
            return $this->redirectToRoute("disconnected_home");
        }
        return $this->redirectToRoute("disconnected_home");
    }

    #[Route(path: '/logout', name: 'logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/{_locale}', name: 'disconnected_home')]
    public function disconnected_home(AuthenticationUtils $authenticationUtils, Request $request,  UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginFormAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        // Redirection si l'utilisateur est connecté
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        
        //dd($form->isSubmitted());
        //dd($form->handleRequest($request));
        if($form->isSubmitted() && $form->isValid()) {
            dd("Local");
            $user->setRoles(["ROLE_USER"]);
            $user->setRegisterDate(new \DateTime());
            $user->setPassword($userPasswordHasher->hashPassword( $user, $form->get('password')->getData()));   
            $entityManager->persist($user);
            $entityManager->flush();

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }     

        // Un utilisateur non connecté arrive sur cette page
        return $this->render('disconnectedHome/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'registrationForm' => $form->createView()
        ]);
    }


    #[Route('/{_locale}#Inscription', name: 'registerHome')]
    public function registerHome(AuthenticationUtils $authenticationUtils, Request $request,  UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginFormAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        // Redirection si l'utilisateur est connecté
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        
        //dd($form->isSubmitted());
        //dd($form->handleRequest($request));
        if($form->isSubmitted() && $form->isValid()) {
            dd("Local");
            $user->setRoles(["ROLE_USER"]);
            $user->setRegisterDate(new \DateTime());
            $user->setPassword($userPasswordHasher->hashPassword( $user, $form->get('password')->getData()));   
            $entityManager->persist($user);
            $entityManager->flush();

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }     

        // Un utilisateur non connecté arrive sur cette page
        return $this->render('disconnectedHome/index.html.twig', [
            'registrationForm' => $form->createView()
        ]);
    }

}
