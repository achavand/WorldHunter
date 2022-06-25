<?php

namespace App\DataFixtures;

use App\Entity\Personnage;
use App\Entity\Talent;
use App\Entity\User;
use App\Entity\Wallet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function statByLevel(int $multiplicator, int $level)
    {
        $faker = Factory::create();
        return ($level * $multiplicator)/$faker->randomElement([2,3,4]);
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($u = 0; $u < 15; $u++){
            $user = new User();
            $personnage = new Personnage();
            $talent = new Talent();
            $wallet = new Wallet();

            $level = rand(1,100);
            $hash = $this->hasher->hashPassword($user, "password");

            $user->setEmail($faker->email())
                 ->setRoles(["ROLE_USER"])
                 ->setPassword($hash)
                 ->setRegisterDate($faker->dateTime())
                 ->setIsBanned($faker->randomElement([0,0,1]))
                 ->setUsername($faker->username());
            $manager->persist($user);

            $talent->setname("talent de test")
                   ->setDescription($faker->text())
                   ->setStatToChange(["Magical_atk"])
                   ->setValueToChange([+10]);

            $personnage->setUserPersonnage($user)
                       ->setTalent($talent)
                       ->setServeur(1)
                       ->setName($faker->username())
                       ->setLevel($level)
                       ->setCurrentXp($this->statByLevel(100, $level))
                       ->setTotalXp($level * 100)
                       ->setCurrentLP($this->statByLevel(50, $level))
                       ->setTotalLP($level * 50)
                       ->setCurrentPM($this->statByLevel(50, $level))
                       ->setTotalPM($level * 50)
                       ->setPhysicalAtk($this->statByLevel(20, $level))
                       ->setMagicalAtk($level * 20)
                       ->setPhysicalDef($this->statByLevel(20, $level))
                       ->setMagicalDef($level * 20)
                       ->setAgility($level * 25)
                       ->setVitality($level * 15)
                       ->setStatPoint(0);

            $manager->persist($talent);
            $wallet->setGold(rand(100,1000000))
                   ->setSilver(rand(100, 1000000));
            $manager->persist($wallet);

            $personnage->setWallet($wallet);
            $manager->persist($personnage);
        }


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
