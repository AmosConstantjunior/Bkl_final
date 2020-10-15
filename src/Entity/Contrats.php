<?php

namespace App\Entity;

use App\Repository\ContratsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratsRepository::class)
 */
class Contrats
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TypeContrat;

    /**
     * @ORM\OneToMany(targetEntity=Ateliers::class, mappedBy="contrat")
     */
    private $ateliers;

    public function __construct()
    {
        $this->ateliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeContrat(): ?string
    {
        return $this->TypeContrat;
    }

    public function setTypeContrat(string $TypeContrat): self
    {
        $this->TypeContrat = $TypeContrat;

        return $this;
    }

    /**
     * @return Collection|Ateliers[]
     */
    public function getAteliers(): Collection
    {
        return $this->ateliers;
    }

    public function addAtelier(Ateliers $atelier): self
    {
        if (!$this->ateliers->contains($atelier)) {
            $this->ateliers[] = $atelier;
            $atelier->setContrat($this);
        }

        return $this;
    }

    public function removeAtelier(Ateliers $atelier): self
    {
        if ($this->ateliers->contains($atelier)) {
            $this->ateliers->removeElement($atelier);
            // set the owning side to null (unless already changed)
            if ($atelier->getContrat() === $this) {
                $atelier->setContrat(null);
            }
        }

        return $this;
    }
}
