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
     * @ORM\Column(type="string", length=50)
     */
    private $numidentification;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $raisonsocial;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nomemployeur;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adresseemployeur;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="employeur")
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

    public function getNumidentification(): ?string
    {
        return $this->numidentification;
    }

    public function setNumidentification(string $numidentification): self
    {
        $this->numidentification = $numidentification;

        return $this;
    }

    public function getRaisonsocial(): ?string
    {
        return $this->raisonsocial;
    }

    public function setRaisonsocial(?string $raisonsocial): self
    {
        $this->raisonsocial = $raisonsocial;

        return $this;
    }

    public function getNomemployeur(): ?string
    {
        return $this->nomemployeur;
    }

    public function setNomemployeur(?string $nomemployeur): self
    {
        $this->nomemployeur = $nomemployeur;

        return $this;
    }

    public function getAdresseemployeur(): ?string
    {
        return $this->adresseemployeur;
    }

    public function setAdresseemployeur(?string $adresseemployeur): self
    {
        $this->adresseemployeur = $adresseemployeur;

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
            $client->setEmployeur($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
            // set the owning side to null (unless already changed)
            if ($client->getEmployeur() === $this) {
                $client->setEmployeur(null);
            }
        }

        return $this;
    }
}
