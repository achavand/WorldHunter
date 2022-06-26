<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        if($this->getUser() == null){
            return $this->redirectToRoute("disconnected_home");
        }
    }

    #[Route('/{_locale}', name: 'disconnected_home')]
    public function disconnected_home(): Response
    {
        // Un utilisateur non connecté arrive sur cette page
        return $this->render('home/index.html.twig');
    }
}
