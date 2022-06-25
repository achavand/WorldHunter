<?php

namespace App\Entity;

use App\Repository\CellRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CellRepository::class)]
class Cell
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'array', nullable: true)]
    private $toChange = [];

    #[ORM\Column(type: 'array', nullable: true)]
    private $ValueToChange = [];

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

    public function getToChange(): ?array
    {
        return $this->toChange;
    }

    public function setToChange(?array $toChange): self
    {
        $this->toChange = $toChange;

        return $this;
    }

    public function getValueToChange(): ?array
    {
        return $this->ValueToChange;
    }

    public function setValueToChange(?array $ValueToChange): self
    {
        $this->ValueToChange = $ValueToChange;

        return $this;
    }
}
