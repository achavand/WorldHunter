<?php

namespace App\Classes;

use App\Entity\Personnage;
use App\Entity\Wallet;

class CreateCharacterClass
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

    public function userRaceInit()
    {
        
    }

}