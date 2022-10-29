<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Classes\LocaleClass;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    private $entityManager;
    
    public function __construct(private ManagerRegistry $doctrine)
    {
        $this->entityManager = $this->doctrine->getManager();
    }

    #[Route('/{_locale}/home', name: 'home')]
    #[IsGranted("ROLE_USER")]
    public function index(): Response
    {
        if($this->getUser()){
            $personnage = new Personnage();
            $personnageList = $this->doctrine->getRepository(Personnage::class)->findBy(['user_personnage' => $this->getUser()]);

            if(count($personnageList) > 0){
                // On renvoie vers une page temporaire pour le moment, qui servira de page de jeu plus tard
                // Il faudra traiter differents cas tel que le choix du personnage par exemple (on complètera plus tard)

                // On créera tout cela un peu plus tard (Penser à donner un vrai nom à la route et à supprimer la route de test un peu plus bas)
                return $this->redirectToRoute('game');
            } else {
                return $this->redirectToRoute('characterCreation');
            }
        } else{
            return $this->redirectToRoute('disconnected_home');
        }


        // Verifier le nombre de personnage
            // Si 0 redirigier vers création de personnage
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/{_locale}/game', name: 'game')]
    #[IsGranted("ROLE_USER")]
    public function game(): Response
    {
        return $this->render('main/game.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
