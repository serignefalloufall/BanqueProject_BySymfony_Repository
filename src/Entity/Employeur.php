<?php

namespace App\Entity;

use App\Repository\EmployeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeurRepository::class)
 */
class Employeur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $numIdentification;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $raisonSocial;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nom_employeur;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adresse_employeur;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="employeur_id")
     */
    private $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumIdentification(): ?string
    {
        return $this->numIdentification;
    }

    public function setNumIdentification(?string $numIdentification): self
    {
        $this->numIdentification = $numIdentification;

        return $this;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(?string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->nom_employeur;
    }

    public function setNomEmployeur(?string $nom_employeur): self
    {
        $this->nom_employeur = $nom_employeur;

        return $this;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->adresse_employeur;
    }

    public function setAdresseEmployeur(?string $adresse_employeur): self
    {
        $this->adresse_employeur = $adresse_employeur;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setEmployeurId($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
            // set the owning side to null (unless already changed)
            if ($client->getEmployeurId() === $this) {
                $client->setEmployeurId(null);
            }
        }

        return $this;
    }
}
