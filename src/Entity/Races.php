<?php

namespace App\Entity;

use App\Repository\RacesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RacesRepository::class)]
class Races
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $url_image_male;

    #[ORM\Column(type: 'string', length: 255)]
    private $url_image_female;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_male;

    #[ORM\Column(type: 'string', length: 255)]
    private $name_female;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'array')]
    private $racial_advantages = [];

    #[ORM\OneToMany(mappedBy: 'Races', targetEntity: RacialAdvantage::class)]
    private $racialAdvantages;

    public function __construct()
    {
        $this->racialAdvantages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlImageMale(): ?string
    {
        return $this->url_image_male;
    }

    public function setUrlImageMale(string $url_image_male): self
    {
        $this->url_image_male = $url_image_male;

        return $this;
    }

    public function getUrlImageFemale(): ?string
    {
        return $this->url_image_female;
    }

    public function setUrlImageFemale(string $url_image_female): self
    {
        $this->url_image_female = $url_image_female;

        return $this;
    }

    public function getNameMale(): ?string
    {
        return $this->name_male;
    }

    public function setNameMale(string $name_male): self
    {
        $this->name_male = $name_male;

        return $this;
    }

    public function getNameFemale(): ?string
    {
        return $this->name_female;
    }

    public function setNameFemale(string $name_female): self
    {
        $this->name_female = $name_female;

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

    public function getRacialAdvantages(): ?array
    {
        return $this->racial_advantages;
    }

    public function setRacialAdvantages(array $racial_advantages): self
    {
        $this->racial_advantages = $racial_advantages;

        return $this;
    }

    public function addRacialAdvantage(RacialAdvantage $racialAdvantage): self
    {
        if (!$this->racialAdvantages->contains($racialAdvantage)) {
            $this->racialAdvantages[] = $racialAdvantage;
            $racialAdvantage->setRaces($this);
        }

        return $this;
    }

    public function removeRacialAdvantage(RacialAdvantage $racialAdvantage): self
    {
        if ($this->racialAdvantages->removeElement($racialAdvantage)) {
            // set the owning side to null (unless already changed)
            if ($racialAdvantage->getRaces() === $this) {
                $racialAdvantage->setRaces(null);
            }
        }

        return $this;
    }
}
