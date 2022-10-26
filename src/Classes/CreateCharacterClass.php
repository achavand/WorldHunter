<?php

namespace App\Classes;

use App\Entity\Personnage;
use App\Entity\Races;
use App\Entity\UserRace;
use App\Entity\Wallet;
use App\Repository\RacesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateCharacterClass extends AbstractController
{
    public function __construct()
    {
    }

    public function walletInit()
    {
        $wallet = new Wallet();
        $wallet->setGold(100)
               ->setSilver(1000);
        return $wallet;
    }

    public function personnageInit($data)
    {
        // Il y'a plusieurs valeur par défaut qui seront importé plus tard, mais mise en dure actuellement pour que le code soit fonctionnel / Des améliorations viendront
        $personnage = new Personnage();
        $personnage->setName($data["name"])
                   ->setServeur(1)  // Pas encore de système de serveur
                   ->setlevel(1)
                   ->setCurrentXp(0)
                   ->setTotalXp(100)
                   ->setCurrentLP(100)
                   ->setTotalLP(100)
                   ->setCurrentPM(50)
                   ->setTotalPM(50)
                   ->setPhysicalAtk($data["physical_atk"])
                   ->setMagicalAtk($data["magical_atk"])
                   ->setPhysicalDef($data["physical_def"])
                   ->setMagicalDef($data["magical_def"])
                   ->setAgility($data["agility"])
                   ->setVitality($data["vitality"])
                   ->setStatPoint(0);
        return $personnage;
    }

    private function userRaceUrlImg(mixed $race, mixed $gender)
    {
        if($gender == "female"){
            $url = $race->getUrlImageFemale();
        } else if($gender == "male"){
            $url = $race->getUrlImageMale();
        }
        return $url;
    }

    private function userRaceName(mixed $race, mixed $gender)
    {
        if($gender == 'female'){
            $name = [
                $race->getNameFemale(),
                $race->getNameFemaleEn(),
            ];
        } else if ($gender == 'male'){
            $name = [
                $race->getNameMale(),
                $race->getNameMaleEn()
            ];
        }
        return $name;
    }

    public function userRaceInit($data, $doctrine)
    {
        $race     = $doctrine->getRepository(Races::class)->findOneById($data["race"]);
        $urlImg   = $this->userRaceUrlImg($race, $data["gender"]);
        $name     = $this->userRaceName($race, $data["gender"]);
        $userRace = new UserRace();
        $userRace->setUrlImg($urlImg)
                 ->setNameRaceFr($name[0])
                 ->setNameRaceEn($name[1])
                 ->setDescriptionFr($race->getDescription())
                 ->setDescriptionEn($race->getDescriptionEn());
        return $userRace;
    }



}