<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $valeur1;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $valeur2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur1(): ?string
    {
        return $this->valeur1;
    }

    public function setValeur1(?string $valeur1): self
    {
        $this->valeur1 = $valeur1;

        return $this;
    }

    public function getValeur2(): ?string
    {
        return $this->valeur2;
    }

    public function setValeur2(?string $valeur2): self
    {
        $this->valeur2 = $valeur2;

        return $this;
    }
}
