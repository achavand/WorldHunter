<?php

namespace App\Entity;

use App\Repository\RacialAdvantageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RacialAdvantageRepository::class)]
class RacialAdvantage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\ManyToOne(targetEntity: Races::class, inversedBy: 'racialAdvantages')]
    #[ORM\JoinColumn(nullable: false)]
    private $Races;

    #[ORM\OneToMany(mappedBy: 'racial_advantage', targetEntity: UserRace::class)]
    private $userRaces;

    public function __construct()
    {
        $this->userRaces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRaces(): ?Races
    {
        return $this->Races;
    }

    public function setRaces(?Races $Races): self
    {
        $this->Races = $Races;

        return $this;
    }

    /**
     * @return Collection<int, UserRace>
     */
    public function getUserRaces(): Collection
    {
        return $this->userRaces;
    }

    public function addUserRace(UserRace $userRace): self
    {
        if (!$this->userRaces->contains($userRace)) {
            $this->userRaces[] = $userRace;
            $userRace->setRacialAdvantage($this);
        }

        return $this;
    }

    public function removeUserRace(UserRace $userRace): self
    {
        if ($this->userRaces->removeElement($userRace)) {
            // set the owning side to null (unless already changed)
            if ($userRace->getRacialAdvantage() === $this) {
                $userRace->setRacialAdvantage(null);
            }
        }

        return $this;
    }
}
