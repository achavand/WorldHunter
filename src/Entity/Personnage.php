<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageRepository::class)]
class Personnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $serveur;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $level;

    #[ORM\Column(type: 'integer')]
    private $current_xp;

    #[ORM\Column(type: 'integer')]
    private $total_xp;

    #[ORM\Column(type: 'integer')]
    private $current_LP;

    #[ORM\Column(type: 'integer')]
    private $total_LP;

    #[ORM\Column(type: 'integer')]
    private $current_PM;

    #[ORM\Column(type: 'integer')]
    private $total_PM;

    #[ORM\Column(type: 'integer')]
    private $physical_atk;

    #[ORM\Column(type: 'integer')]
    private $magical_atk;

    #[ORM\Column(type: 'integer')]
    private $physical_def;

    #[ORM\Column(type: 'integer')]
    private $magical_def;

    #[ORM\Column(type: 'integer')]
    private $agility;

    #[ORM\Column(type: 'integer')]
    private $vitality;

    #[ORM\Column(type: 'integer')]
    private $stat_point;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'Personnage')]
    #[ORM\JoinColumn(nullable: false)]
    private $user_personnage;

    #[ORM\OneToOne(inversedBy: 'personnage', targetEntity: Wallet::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $Wallet;

    #[ORM\ManyToOne(targetEntity: Talent::class, inversedBy: 'personnages')]
    #[ORM\JoinColumn(nullable: false)]
    private $Talent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServeur(): ?int
    {
        return $this->serveur;
    }

    public function setServeur(int $serveur): self
    {
        $this->serveur = $serveur;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getCurrentXp(): ?int
    {
        return $this->current_xp;
    }

    public function setCurrentXp(int $current_xp): self
    {
        $this->current_xp = $current_xp;

        return $this;
    }

    public function getTotalXp(): ?int
    {
        return $this->total_xp;
    }

    public function setTotalXp(int $total_xp): self
    {
        $this->total_xp = $total_xp;

        return $this;
    }

    public function getCurrentLP(): ?int
    {
        return $this->current_LP;
    }

    public function setCurrentLP(int $current_LP): self
    {
        $this->current_LP = $current_LP;

        return $this;
    }

    public function getTotalLP(): ?int
    {
        return $this->total_LP;
    }

    public function setTotalLP(int $total_LP): self
    {
        $this->total_LP = $total_LP;

        return $this;
    }

    public function getCurrentPM(): ?int
    {
        return $this->current_PM;
    }

    public function setCurrentPM(int $current_PM): self
    {
        $this->current_PM = $current_PM;

        return $this;
    }

    public function getTotalPM(): ?int
    {
        return $this->total_PM;
    }

    public function setTotalPM(int $total_PM): self
    {
        $this->total_PM = $total_PM;

        return $this;
    }

    public function getPhysicalAtk(): ?int
    {
        return $this->physical_atk;
    }

    public function setPhysicalAtk(int $physical_atk): self
    {
        $this->physical_atk = $physical_atk;

        return $this;
    }

    public function getMagicalAtk(): ?int
    {
        return $this->magical_atk;
    }

    public function setMagicalAtk(int $magical_atk): self
    {
        $this->magical_atk = $magical_atk;

        return $this;
    }

    public function getPhysicalDef(): ?int
    {
        return $this->physical_def;
    }

    public function setPhysicalDef(int $physical_def): self
    {
        $this->physical_def = $physical_def;

        return $this;
    }

    public function getMagicalDef(): ?int
    {
        return $this->magical_def;
    }

    public function setMagicalDef(int $magical_def): self
    {
        $this->magical_def = $magical_def;

        return $this;
    }

    public function getAgility(): ?int
    {
        return $this->agility;
    }

    public function setAgility(int $agility): self
    {
        $this->agility = $agility;

        return $this;
    }

    public function getVitality(): ?int
    {
        return $this->vitality;
    }

    public function setVitality(int $vitality): self
    {
        $this->vitality = $vitality;

        return $this;
    }

    public function getStatPoint(): ?int
    {
        return $this->stat_point;
    }

    public function setStatPoint(int $stat_point): self
    {
        $this->stat_point = $stat_point;

        return $this;
    }

    public function getUserPersonnage(): ?User
    {
        return $this->user_personnage;
    }

    public function setUserPersonnage(?User $user_personnage): self
    {
        $this->user_personnage = $user_personnage;

        return $this;
    }

    public function getWallet(): ?Wallet
    {
        return $this->Wallet;
    }

    public function setWallet(Wallet $Wallet): self
    {
        $this->Wallet = $Wallet;

        return $this;
    }

    public function getTalent(): ?Talent
    {
        return $this->Talent;
    }

    public function setTalent(?Talent $Talent): self
    {
        $this->Talent = $Talent;

        return $this;
    }
}
