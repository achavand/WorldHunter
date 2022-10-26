<?php

namespace App\Controller;

use App\Classes\LocaleClass;
use App\Entity\DisconnectedPresentation;
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
    public function index(Request $request): Response
    {
        if($this->getUser() == null){
            return $this->redirectToRoute("disconnected_home");
        }

        $locale = new LocaleClass($request);

        return $this->redirectToRoute("disconnected_home", [
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams()
        ]);
    }

    #[Route(path: '/logout', name: 'logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/{_locale}', name: 'disconnected_home')]
    public function disconnected_home(
        AuthenticationUtils $authenticationUtils, Request $request,  UserPasswordHasherInterface $userPasswordHasher, 
        UserAuthenticatorInterface $userAuthenticator, LoginFormAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $locale = new LocaleClass($request);
        $presentation = $entityManager->getRepository(DisconnectedPresentation::class)->findAll();
        // Redirection si l'utilisateur est connecté
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(["ROLE_USER"]);
            $user->setRegisterDate(new \DateTime());
            $user->setPassword($userPasswordHasher->hashPassword( $user, $form->get('password')->getData()));   
            $entityManager->persist($user);
            $entityManager->flush();
            dd("test");
            
            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }     

        return $this->render('disconnectedHome/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'registrationForm' => $form->createView(),
            "presentation" => $presentation,
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams()
        ]);
    }

}
