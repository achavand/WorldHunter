<?php

namespace App\Entity;

use App\Repository\WalletRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WalletRepository::class)]
class Wallet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $gold;

    #[ORM\Column(type: 'integer')]
    private $silver;

    #[ORM\OneToOne(mappedBy: 'Wallet', targetEntity: Personnage::class, cascade: ['persist', 'remove'])]
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(int $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    public function getSilver(): ?int
    {
        return $this->silver;
    }

    public function setSilver(int $silver): self
    {
        $this->silver = $silver;

        return $this;
    }

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(Personnage $personnage): self
    {
        // set the owning side of the relation if necessary
        if ($personnage->getWallet() !== $this) {
            $personnage->setWallet($this);
        }

        $this->personnage = $personnage;

        return $this;
    }
}
