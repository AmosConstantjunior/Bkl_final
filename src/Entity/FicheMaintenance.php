<?php

namespace App\Entity;

use App\Repository\FicheMaintenanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheMaintenanceRepository::class)
 */
class FicheMaintenance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateIntervention;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CommandeEBP;

    /**
     * @ORM\Column(type="float")
     */
    private $montantHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $montantConsommable;

    /**
     * @ORM\Column(type="integer")
     */
    private $station;

    /**
     * @ORM\Column(type="integer")
     */
    private $formation;

    /**
     * @ORM\Column(type="integer")
     */
    private $maint;

    /**
     * @ORM\Column(type="integer")
     */
    private $process;

    /**
     * @ORM\Column(type="boolean")
     */
    private $valiseCNOMO;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cuproBrasage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $besoinFormation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sondageMonoFace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $QualiteElectrique;

    /**
     * @ORM\ManyToOne(targetEntity=Techniciens::class, inversedBy="ficheMaintenances")
     */
    private $Technicien;

    /**
     * @ORM\ManyToOne(targetEntity=Ateliers::class, inversedBy="ficheMaintenances")
     */
    private $atelier;

    

    /**
     * @ORM\Column(type="date")
     */
    private $dateProchaine;

    /**
     * @ORM\ManyToMany(targetEntity=Machine::class, inversedBy="ficheMaintenances")
     */
    private $machine;

    public function __construct()
    {
        $this->machines = new ArrayCollection();
        $this->machine = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIntervention(): ?\DateTimeInterface
    {
        return $this->dateIntervention;
    }

    public function setDateIntervention(\DateTimeInterface $dateIntervention): self
    {
        $this->dateIntervention = $dateIntervention;

        return $this;
    }

    public function getCommandeEBP(): ?string
    {
        return $this->CommandeEBP;
    }

    public function setCommandeEBP(?string $CommandeEBP): self
    {
        $this->CommandeEBP = $CommandeEBP;

        return $this;
    }

    public function getMontantHT(): ?float
    {
        return $this->montantHT;
    }

    public function setMontantHT(float $montantHT): self
    {
        $this->montantHT = $montantHT;

        return $this;
    }

    public function getMontantConsommable(): ?float
    {
        return $this->montantConsommable;
    }

    public function setMontantConsommable(?float $montantConsommable): self
    {
        $this->montantConsommable = $montantConsommable;

        return $this;
    }

    public function getStation(): ?int
    {
        return $this->station;
    }

    public function setStation(int $station): self
    {
        $this->station = $station;

        return $this;
    }

    public function getFormation(): ?int
    {
        return $this->formation;
    }

    public function setFormation(int $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getMaint(): ?int
    {
        return $this->maint;
    }

    public function setMaint(int $maint): self
    {
        $this->maint = $maint;

        return $this;
    }

    public function getProcess(): ?int
    {
        return $this->process;
    }

    public function setProcess(int $process): self
    {
        $this->process = $process;

        return $this;
    }

    public function getValiseCNOMO(): ?bool
    {
        return $this->valiseCNOMO;
    }

    public function setValiseCNOMO(bool $valiseCNOMO): self
    {
        $this->valiseCNOMO = $valiseCNOMO;

        return $this;
    }

    public function getCuproBrasage(): ?bool
    {
        return $this->cuproBrasage;
    }

    public function setCuproBrasage(bool $cuproBrasage): self
    {
        $this->cuproBrasage = $cuproBrasage;

        return $this;
    }

    public function getBesoinFormation(): ?bool
    {
        return $this->besoinFormation;
    }

    public function setBesoinFormation(bool $besoinFormation): self
    {
        $this->besoinFormation = $besoinFormation;

        return $this;
    }

    public function getSondageMonoFace(): ?bool
    {
        return $this->sondageMonoFace;
    }

    public function setSondageMonoFace(bool $sondageMonoFace): self
    {
        $this->sondageMonoFace = $sondageMonoFace;

        return $this;
    }

    public function getQualiteElectrique(): ?string
    {
        return $this->QualiteElectrique;
    }

    public function setQualiteElectrique(string $QualiteElectrique): self
    {
        $this->QualiteElectrique = $QualiteElectrique;

        return $this;
    }

    public function getTechnicien(): ?Techniciens
    {
        return $this->Technicien;
    }

    public function setTechnicien(?Techniciens $Technicien): self
    {
        $this->Technicien = $Technicien;

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


    public function getDateProchaine(): ?\DateTimeInterface
    {
        return $this->dateProchaine;
    }

    public function setDateProchaine(\DateTimeInterface $dateProchaine): self
    {
        $this->dateProchaine = $dateProchaine;

        return $this;
    }

    /**
     * @return Collection|Machine[]
     */
    public function getMachine(): Collection
    {
        return $this->machine;
    }

    public function addMachine(Machine $machine): self
    {
        if (!$this->machine->contains($machine)) {
            $this->machine[] = $machine;
        }

        return $this;
    }

    public function removeMachine(Machine $machine): self
    {
        if ($this->machine->contains($machine)) {
            $this->machine->removeElement($machine);
        }

        return $this;
    }
}
