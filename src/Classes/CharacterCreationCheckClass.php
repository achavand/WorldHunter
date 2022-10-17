<?php

namespace App\Classes;

use App\Repository\PersonnageRepository;
use App\Repository\RacesRepository;
use Symfony\Component\HttpFoundation\Request;

use function PHPUnit\Framework\isNan;

class CharacterCreationCheckClass
{
    private int $nameMinValue = 4;
    private int $nameMaxValue = 16;
    private string $name;
    private int $raceId;
    private string $gender;
    private $stat;

    private PersonnageRepository $characterRepo;
    private RacesRepository $racesRepo;

    
    public function __construct(PersonnageRepository $characterRepo, RacesRepository $racesRepo)
    {
        $this->characterRepo = $characterRepo;
        $this->racesRepo     = $racesRepo;
    }

    private function checkUnicName():bool
    {
        $nameExist = $this->characterRepo->findOneByName($this->name);
        // Le nom est unique mais ne dépend pas du serveur, c'est une amélioration à faire, plus tard
        // Return false if the name already exist in database
        return $nameExist ? false:true;
    }

    private function checkName():bool
    {        
        if(
            (strlen($this->name) <= $this->nameMaxValue && strlen($this->name) >= $this->nameMinValue)
            && $this->checkUnicName()
        ) {
            return true;
        } else {
            return false;
        }
    }

    private function checkRace():bool
    {
        $racesExist = $this->racesRepo->findOneById($this->raceId);
        // Return true if races exists in races table in database (not in user_races)
        return $racesExist ? true:false;
    }

    private function checkGender()
    {
        // Return  true if this->gender is one of the good names
        return ($this->gender == "female" OR $this->gender == "male") ? true : false;
    }

    private function checkStats($statsList)
    {
        foreach ($statsList as $key => $data) {
            $data = intval($data);
            if(is_int($data) && $data >= 5 && $data <= 20){
                $isValid = true;
            } else {
                $isValid = false;
                break;
            }
        }
        return $isValid;
    }

    private function createStatList($formData)
    {
        $validStat = ["physical_atk", "magical_atk", "physical_def", "magical_def", "agility", "vitality"];
        $statList = [];
        foreach ($formData as $key => $data) {
            if(in_array($key, $validStat)){
                $statList[$key] = $data;
            }
        }
        
        if(count($statList) == count($validStat)){
            return $statList;
        } else {
            return false;
        }
    }

    public function checkData(array $formData)
    {
        $this->name = trim($formData["name"]);
        $this->raceId = intval($formData["race"]);
        $this->gender = strtolower($formData["gender"]);
        $this->stat   = $this->createStatList($formData);
        
        $nameIsValid   = $this->checkName();
        $raceIsValid   = $this->checkRace();
        $genderIsValid = $this->checkGender();
        if($this->stat){
            $statIsValid   = $this->checkStats($this->createStatList($this->stat));
        } else {
            $statIsValid   = false;
        }

        return ($nameIsValid && $raceIsValid && $genderIsValid && $statIsValid) ? true : false;
    }
}