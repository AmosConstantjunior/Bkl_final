<?php

namespace App\Entity;

use App\Repository\TechniciensRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TechniciensRepository::class)
 */
class Techniciens extends User
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
    private $NomTechnicien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomTechnicien;

    /**
     * @ORM\OneToMany(targetEntity=FicheMaintenance::class, mappedBy="Technicien")
     */
    private $ficheMaintenances;

    public function __construct()
    {
        $this->ficheMaintenances = new ArrayCollection();
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNomTechnicien(): ?string
    {
        return $this->NomTechnicien;
    }

    public function setNomTechnicien(string $NomTechnicien): self
    {
        $this->NomTechnicien = $NomTechnicien;

        return $this;
    }

    public function getPrenomTechnicien(): ?string
    {
        return $this->PrenomTechnicien;
    }

    public function setPrenomTechnicien(string $PrenomTechnicien): self
    {
        $this->PrenomTechnicien = $PrenomTechnicien;

        return $this;
    }

    /**
     * @return Collection|FicheMaintenance[]
     */
    public function getFicheMaintenances(): Collection
    {
        return $this->ficheMaintenances;
    }

    public function addFicheMaintenance(FicheMaintenance $ficheMaintenance): self
    {
        if (!$this->ficheMaintenances->contains($ficheMaintenance)) {
            $this->ficheMaintenances[] = $ficheMaintenance;
            $ficheMaintenance->setTechnicien($this);
        }

        return $this;
    }

    public function removeFicheMaintenance(FicheMaintenance $ficheMaintenance): self
    {
        if ($this->ficheMaintenances->contains($ficheMaintenance)) {
            $this->ficheMaintenances->removeElement($ficheMaintenance);
            // set the owning side to null (unless already changed)
            if ($ficheMaintenance->getTechnicien() === $this) {
                $ficheMaintenance->setTechnicien(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->NomTechnicien;
    }
}
