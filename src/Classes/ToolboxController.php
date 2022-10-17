<?php

namespace App\Classes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ToolboxController extends AbstractController
{

    
    public function __construct()
    {
    }

    public function generateStatArray()
    {
        return [
            "vitality" => ["Vitalité", "vitality"],
            "phyAtk"   => ["Attaque physique", "physical-atk"], 
            "phyDef"   => ["Défense physique", "physical-def"], 
            "magicAtk" => ["Attaque magique", "magical-atk"], 
            "macifDef" => ["Défense magique", "magical-def"], 
            "agility"  => ["Agilité", "agility"]
        ];
    }

    // public function ifUserIsNotLogWithRedirect(){
    //     if (!$this->getUser()) {
    //         return $this->redirectToRoute('disconnected_home');
    //     }
    // }
}