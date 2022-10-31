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
    
    /**
     * Check if the username wanted by the user is unic or not
     *
     * @return bool
     */
    private function checkUnicName():bool
    {
        // Le nom est unique mais ne dépend pas du serveur, c'est une amélioration à faire, plus tard
        $nameExist = $this->characterRepo->findOneByName($this->name);
        // Return false if the name already exist in database
        return $nameExist ? false:true;
    }
    
    /**
     * Check if the name of the personnage is valid
     *
     * @return bool
     */
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
    
    /**
     * Check if the Race wanted by the user exists
     *
     * @return bool
     */
    private function checkRace():bool
    {
        $racesExist = $this->racesRepo->findOneById($this->raceId);
        return $racesExist ? true:false;
    }
    
    /**
     * Check if the gender selected exists
     *
     * @return bool
     */
    private function checkGender():bool
    {
        return ($this->gender == "female" OR $this->gender == "male") ? true : false;
    }
    
    /**
     * Check if the values of the stats are good or not
     *
     * @param  mixed $statsList
     * @return bool
     */
    private function checkStats($statsList):bool
    {
        $statCount = 0;
        $sum = 0;
        $maxSumPossible = 10;

        foreach ($statsList as $key => $data) {
            $statCount++;
            $data = intval($data);
            if(is_int($data) && $data >= 5 && $data <= 20){
                $sum += $data;
                $maxSumPossible += 10;
                $isValid = true;
            } else {
                $isValid = false;
                break;
            }
        }
        // if("LE NOMBRE TOTAL DE POINTS DES STATS != DU NOMBRE TOTAL DE POINTS POSSIBLE"){
        //     $isValid = false;
        // } else {

        if($sum != $maxSumPossible){
            $isValid = false;
        }

        return $isValid;
    }
    
    /**
     * Check if the stats exists and the points that the user give to them are good or not
     *
     * @param  mixed $formData
     * @return array|bool
     */
    private function createStatList($formData):array|bool
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
    
    /**
     * Check if the form sent by the user for create a new Personnage is good or not
     *
     * @param  mixed $formData
     * @return bool
     */
    public function checkData(array $formData):bool
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