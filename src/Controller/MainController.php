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

    #[Route('/{_locale}/choice', name: 'choiceCharacter')]
    #[IsGranted("ROLE_USER")]
    public function index(): Response
    {
        if($this->getUser()){
            $personnage = new Personnage();
            $personnageList = $this->doctrine->getRepository(Personnage::class)->findBy(['user_personnage' => $this->getUser()]);

            if(count($personnageList) > 0){
                // Il faut choisir le personnage
                return $this->redirectToRoute('home');
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


    #[Route('/{_locale}/home', name: 'home')]
    #[IsGranted("ROLE_USER")]
    public function home(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
