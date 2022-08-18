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

    #[ORM\Column(type: 'string', length: 255)]
    private $url_image;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_race;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\ManyToOne(targetEntity: RacialAdvantage::class, inversedBy: 'userRaces')]
    private $racial_advantage;

    #[ORM\OneToOne(mappedBy: 'race', targetEntity: Personnage::class, cascade: ['persist', 'remove'])]
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlImage(): ?string
    {
        return $this->url_image;
    }

    public function setUrlImage(string $url_image): self
    {
        $this->url_image = $url_image;

        return $this;
    }

    public function getNameRace(): ?string
    {
        return $this->name_race;
    }

    public function setNameRace(string $name_race): self
    {
        $this->name_race = $name_race;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRacialAdvantage(): ?RacialAdvantage
    {
        return $this->racial_advantage;
    }

    public function setRacialAdvantage(?RacialAdvantage $racial_advantage): self
    {
        $this->racial_advantage = $racial_advantage;

        return $this;
    }

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(Personnage $personnage): self
    {
        // set the owning side of the relation if necessary
        if ($personnage->getRace() !== $this) {
            $personnage->setRace($this);
        }

        $this->personnage = $personnage;

        return $this;
    }
}
