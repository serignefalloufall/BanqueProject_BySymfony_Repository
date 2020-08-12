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
    private $numidentification;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $raisonsocial;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $nomemployeur;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $adresseemployeur;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="employeur_id")
     */
    private $yes;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumidentification(): ?string
    {
        return $this->numidentification;
    }

    public function setNumidentification(?string $numidentification): self
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
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Client $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setEmployeurId($this);
        }

        return $this;
    }

    public function removeYe(Client $ye): self
    {
        if ($this->yes->contains($ye)) {
            $this->yes->removeElement($ye);
            // set the owning side to null (unless already changed)
            if ($ye->getEmployeurId() === $this) {
                $ye->setEmployeurId(null);
            }
        }

        return $this;
    }
}
