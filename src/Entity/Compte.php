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
    private $client_id;

    /**
     * @ORM\ManyToOne(targetEntity=Typecompte::class, inversedBy="comptes")
     */
    private $type_compte_id;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="comptes")
     */
    private $agence_id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $num_compte;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cle_rip;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=0, nullable=true)
     */
    private $frais_ouverture;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=0, nullable=true)
     */
    private $agio;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $date_ouverture;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $date_fermuture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getTypeCompteId(): ?int
    {
        return $this->type_compte_id;
    }

    public function setTypeCompteId(?int $type_compte_id): self
    {
        $this->type_compte_id = $type_compte_id;

        return $this;
    }

    public function getAgenceId(): ?Agence
    {
        return $this->agence_id;
    }

    public function setAgenceId(?Agence $agence_id): self
    {
        $this->agence_id = $agence_id;

        return $this;
    }

    public function getNumCompte(): ?string
    {
        return $this->num_compte;
    }

    public function setNumCompte(string $num_compte): self
    {
        $this->num_compte = $num_compte;

        return $this;
    }

    public function getCleRip(): ?string
    {
        return $this->cle_rip;
    }

    public function setCleRip(string $cle_rip): self
    {
        $this->cle_rip = $cle_rip;

        return $this;
    }

    public function getFraisOuverture(): ?string
    {
        return $this->frais_ouverture;
    }

    public function setFraisOuverture(?string $frais_ouverture): self
    {
        $this->frais_ouverture = $frais_ouverture;

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

    public function getDateOuverture(): ?string
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(string $date_ouverture): self
    {
        $this->date_ouverture = $date_ouverture;

        return $this;
    }

    public function getDateFermuture(): ?string
    {
        return $this->date_fermuture;
    }

    public function setDateFermuture(?string $date_fermuture): self
    {
        $this->date_fermuture = $date_fermuture;

        return $this;
    }
}
