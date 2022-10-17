<?php

namespace App\Entity;

use App\Repository\UserRaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRaceRepository::class)]
class UserRace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $url_img;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_race_fr;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_race_en;

    #[ORM\Column(type: 'text')]
    private $descriptionFr;

    #[ORM\Column(type: 'text')]
    private $descriptionEn;

    #[ORM\ManyToOne(targetEntity: RacialAdvantage::class, inversedBy: 'userRaces')]
    #[ORM\JoinColumn(nullable: false)]
    private $racialAdvantage;

    #[ORM\OneToOne(inversedBy: 'userRace', targetEntity: Personnage::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlImg(): ?string
    {
        return $this->url_img;
    }

    public function setUrlImg(string $url_img): self
    {
        $this->url_img = $url_img;

        return $this;
    }

    public function getNameRaceFr(): ?string
    {
        return $this->name_race_fr;
    }

    public function setNameRaceFr(string $name_race_fr): self
    {
        $this->name_race_fr = $name_race_fr;

        return $this;
    }

    public function getNameRaceEn(): ?string
    {
        return $this->name_race_en;
    }

    public function setNameRaceEn(string $name_race_en): self
    {
        $this->name_race_en = $name_race_en;

        return $this;
    }

    public function getDescriptionFr(): ?string
    {
        return $this->descriptionFr;
    }

    public function setDescriptionFr(string $descriptionFr): self
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->descriptionEn;
    }

    public function setDescriptionEn(string $descriptionEn): self
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    public function getRacialAdvantage(): ?RacialAdvantage
    {
        return $this->racialAdvantage;
    }

    public function setRacialAdvantage(?RacialAdvantage $racialAdvantage): self
    {
        $this->racialAdvantage = $racialAdvantage;

        return $this;
    }

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(Personnage $personnage): self
    {
        $this->personnage = $personnage;

        return $this;
    }
}
