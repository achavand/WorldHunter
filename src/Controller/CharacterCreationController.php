<?php

namespace App\Controller;

use App\Classes\CharacterCreationCheckClass;
use App\Classes\CreateCharacterClass;
use App\Classes\LocaleClass;
use App\Classes\ToolboxController;
use App\Entity\Personnage;
use App\Entity\Races;
use App\Entity\RacialAdvantage;
use App\Entity\Talent;
use App\Entity\UserRace;
use App\Entity\Wallet;
use App\Form\CreateCharacterType;
use App\Repository\RacesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterCreationController extends AbstractController
{
    private $entityManager;
    
    public function __construct(private ManagerRegistry $doctrine)
    {
        $this->entityManager = $this->doctrine->getManager();
    }

    #[Route('/{_locale}/character-creation', name: 'characterCreation')]
    public function characterCreation(Request $request, CharacterCreationCheckClass $charCreation, ToolboxController $toolboxController, CreateCharacterClass $createCharacter): Response
    {
        $locale = new LocaleClass($request);
        $personnage = new Personnage();
        $createCharacterForm = $this->createForm(CreateCharacterType::class, $personnage);

        $createCharacterForm->handleRequest($request);
        if($createCharacterForm->isSubmitted() && $createCharacterForm->isValid()){
            if (!$this->getUser()) {
                return $this->redirectToRoute('disconnected_home');
            }

            $data = $request->get("create_character");
            $formValid = $charCreation->checkData($data);
            if($formValid){
                $wallet = $createCharacter->walletInit();
                $personnage = $createCharacter->personnageInit($data);
                $userRace = $createCharacter->userRaceInit($data, $this->doctrine);
                $personnage->setUserPersonnage($this->getUser())
                           ->setWallet($wallet)
                           ->setUserRace($userRace);
                $wallet->setPersonnage($personnage);

                $this->entityManager->persist($personnage);
                $this->entityManager->persist($wallet);
                $this->entityManager->persist($userRace);
                $this->entityManager->flush();
                return $this->redirectToRoute('game');
            } else {
                // Je crois qu'il n'est pas appelé dans le template
                $this->addFlash("warning", "Echec");
            }
        }

        $personnageList = $this->doctrine->getRepository(Personnage::class)->findBy(['user_personnage' => $this->getUser()]);
        $races = $this->doctrine->getRepository(Races::class)->findAll();
        $racialAdvantage = $this->doctrine->getRepository(RacialAdvantage::class)->findAll();
        $stats = $createCharacter->generateStatArray();

        
        if(count($personnageList) > 0){
            return $this->redirectToRoute('home');
        }

        return $this->render('main/create.html.twig', [
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams(),
            "races" => $races,
            "advantages" => $racialAdvantage,
            "stats" => $stats,
            "characterForm" => $createCharacterForm->createView(),
            "statPoints" => 10
        ]);
    }
}
