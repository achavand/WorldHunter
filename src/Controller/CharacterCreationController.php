<?php

namespace App\Controller;

use App\Entity\Races;
use App\Entity\Personnage;
use App\Classes\LocaleClass;
use App\Entity\RacialAdvantage;
use App\Form\CreateCharacterType;
use App\Classes\ToolboxController;
use App\Classes\CreateCharacterClass;
use Doctrine\Persistence\ManagerRegistry;
use App\Classes\CharacterCreationCheckClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CharacterCreationController extends AbstractController
{
    private $entityManager;
    
    public function __construct(private ManagerRegistry $doctrine)
    {
        $this->entityManager = $this->doctrine->getManager();
    }

    #[Route('/{_locale}/character-creation', name: 'characterCreation')]
    #[IsGranted("ROLE_USER")]
    public function characterCreation(Request $request, CharacterCreationCheckClass $charCreation, ToolboxController $toolboxController, CreateCharacterClass $createCharacter): Response
    {
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
                // Dans le template, le code est commenté
                $this->addFlash("warning", "Echec");
            }
        }

        $locale = new LocaleClass($request);
        $personnageList = $this->doctrine->getRepository(Personnage::class)->findBy(['user_personnage' => $this->getUser()]);
        $races = $this->doctrine->getRepository(Races::class)->findAll();
        $racialAdvantage = $this->doctrine->getRepository(RacialAdvantage::class)->findAll();
        
        if(count($personnageList) > 0){
            return $this->redirectToRoute('home');
        }

        return $this->render('main/create.html.twig', [
            "route" => $locale->setRoute(),
            "params" => $locale->setRouteParams(),
            "stats" => $createCharacter->generateStatArray(),
            "characterForm" => $createCharacterForm->createView(),
            "races" => $races,
            "advantages" => $racialAdvantage,
            "statPoints" => 10
        ]);
    }
}
