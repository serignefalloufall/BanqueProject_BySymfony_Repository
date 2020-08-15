<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="comptes")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Typecompte::class, inversedBy="comptes")
     */
    private $typecompte;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="numcompte")
     */
    private $agence;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $numcompte;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $clerip;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $fraisouverture;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $agio;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $dateouverture;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $datefermuture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTypecompte(): ?Typecompte
    {
        return $this->typecompte;
    }

    public function setTypecompte(?Typecompte $typecompte): self
    {
        $this->typecompte = $typecompte;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getNumcompte(): ?string
    {
        return $this->numcompte;
    }

    public function setNumcompte(?string $numcompte): self
    {
        $this->numcompte = $numcompte;

        return $this;
    }

    public function getClerip(): ?string
    {
        return $this->clerip;
    }

    public function setClerip(?string $clerip): self
    {
        $this->clerip = $clerip;

        return $this;
    }

    public function getFraisouverture(): ?string
    {
        return $this->fraisouverture;
    }

    public function setFraisouverture(?string $fraisouverture): self
    {
        $this->fraisouverture = $fraisouverture;

        return $this;
    }

    public function getAgio(): ?string
    {
        return $this->agio;
    }

    public function setAgio(?string $agio): self
    {
        $this->agio = $agio;

        return $this;
    }

    public function getDateouverture(): ?string
    {
        return $this->dateouverture;
    }

    public function setDateouverture(?string $dateouverture): self
    {
        $this->dateouverture = $dateouverture;

        return $this;
    }

    public function getDatefermuture(): ?string
    {
        return $this->datefermuture;
    }

    public function setDatefermuture(?string $datefermuture): self
    {
        $this->datefermuture = $datefermuture;

        return $this;
    }

  

}
