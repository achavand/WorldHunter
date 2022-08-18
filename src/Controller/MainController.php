<?php

namespace App\Controller;

use App\Entity\Personnage;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    private $entityManager;
    
    public function __construct(private ManagerRegistry $doctrine)
    {
        $this->entityManager = $this->doctrine->getManager();
    }

    #[Route('/{_locale}/home', name: 'home')]
    public function index(): Response
    {
        if($this->getUser()){
            $personnage = new Personnage();
            $personnageList = $this->doctrine->getRepository(Personnage::class)->findBy(['user_personnage' => $this->getUser()]);

            if(count($personnageList) > 0){
                // On renvoie vers une page temporaire pour le moment, qui servira de page de jeu plus tard
                // Il faudra traiter differents cas tel que le choix du personnage par exemple (on complètera plus tard)

                // On créera tout cela un peu plus tard (Penser à donner un vrai nom à la route et à supprimer la route de test un peu plus bas)
                return $this->redirectToRoute('neSertARien');
            } else {
                // L'utilisateur ne possède pas de personnage, il doit pouvoir le créer sur cette page !
                return $this->redirectToRoute('characterCreation');
            }
        } else{
            // On pourrait faire pas mal de chose ici (renvoyer et afficher un message d'erreur par exemple)
            // Il faut verifier l'effet afin de voir ce que l'on va faire
            return $this->redirectToRoute('disconnected_home');
        }


        // Verifier le nombre de personnage
            // Si 0 redirigier vers création de personnage
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    // Pour tester en attendant
    #[Route('/{_locale}/useless', name: 'neSertARien')]
    public function neSertARien(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/{_locale}/character-creation', name: 'characterCreation')]
    public function characterCreation(): Response
    {
        $personnage = new Personnage();
        $personnageList = $this->doctrine->getRepository(Personnage::class)->findBy(['user_personnage' => $this->getUser()]);

        if(count($personnageList) > 0){
            // On renvoie vers une page temporaire pour le moment, qui servira de page de jeu plus tard
            // Il faudra traiter differents cas tel que le choix du personnage par exemple (on complètera plus tard)

            // On créera tout cela un peu plus tard (Penser à donner un vrai nom à la route et à supprimer la route de test un peu plus bas)
            // A voir si c'est lié à la fonction home
            return $this->redirectToRoute('neSertARien');
        }

        return $this->render('main/create.html.twig');
    }
}
