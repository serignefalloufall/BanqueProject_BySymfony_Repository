<?php

namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenceRepository::class)
 */
class Agence
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
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="agences")
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity=Compte::class, mappedBy="agence")
     */
    private $numcompte;

    public function __construct()
    {
        $this->numcompte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getNumcompte(): Collection
    {
        return $this->numcompte;
    }

    public function addNumcompte(Compte $numcompte): self
    {
        if (!$this->numcompte->contains($numcompte)) {
            $this->numcompte[] = $numcompte;
            $numcompte->setAgence($this);
        }

        return $this;
    }

    public function removeNumcompte(Compte $numcompte): self
    {
        if ($this->numcompte->contains($numcompte)) {
            $this->numcompte->removeElement($numcompte);
            // set the owning side to null (unless already changed)
            if ($numcompte->getAgence() === $this) {
                $numcompte->setAgence(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
