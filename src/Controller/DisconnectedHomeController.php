<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    }

    #[Route('/{_locale}', name: 'disconnected_home')]
    public function disconnected_home(AuthenticationUtils $authenticationUtils): Response
    {
        // IL faut ajouter le login

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
