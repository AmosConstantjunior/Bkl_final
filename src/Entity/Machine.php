<?php

namespace App\Entity;

use App\Repository\MachineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MachineRepository::class)
 */
class Machine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="machines")
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity=Ateliers::class, inversedBy="machines")
     */
    private $atelier;

    /**
     * @ORM\ManyToMany(targetEntity=FicheMaintenance::class, mappedBy="machine")
     */
    private $ficheMaintenances;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumSerie;

    public function __construct()
    {
        $this->ficheMaintenances = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getAtelier(): ?Ateliers
    {
        return $this->atelier;
    }

    public function setAtelier(?Ateliers $atelier): self
    {
        $this->atelier = $atelier;

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
            $ficheMaintenance->addMachine($this);
        }

        return $this;
    }

    public function removeFicheMaintenance(FicheMaintenance $ficheMaintenance): self
    {
        if ($this->ficheMaintenances->contains($ficheMaintenance)) {
            $this->ficheMaintenances->removeElement($ficheMaintenance);
            $ficheMaintenance->removeMachine($this);
        }

        return $this;
    }

    public function getNumSerie(): ?string
    {
        return $this->NumSerie;
    }

    public function setNumSerie(string $NumSerie): self
    {
        $this->NumSerie = $NumSerie;

        return $this;
    }

   
}
