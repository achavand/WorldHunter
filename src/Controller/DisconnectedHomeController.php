<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
    public function disconnected_home(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // Redirection si l'utilisateur est connecté
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        

        // Un utilisateur non connecté arrive sur cette page
        return $this->render('disconnectedHome/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
}
