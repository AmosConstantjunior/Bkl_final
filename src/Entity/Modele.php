<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModeleRepository::class)
 */
class Modele
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Marque::class, inversedBy="modeles")
     */
    private $marque;

    /**
     * @ORM\OneToMany(targetEntity=Machine::class, mappedBy="modele")
     */
    private $machines;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Intituler;

    public function __construct()
    {
        $this->machines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection|Machine[]
     */
    public function getMachines(): Collection
    {
        return $this->machines;
    }

    public function addMachine(Machine $machine): self
    {
        if (!$this->machines->contains($machine)) {
            $this->machines[] = $machine;
            $machine->setModele($this);
        }

        return $this;
    }

    public function removeMachine(Machine $machine): self
    {
        if ($this->machines->contains($machine)) {
            $this->machines->removeElement($machine);
            // set the owning side to null (unless already changed)
            if ($machine->getModele() === $this) {
                $machine->setModele(null);
            }
        }

        return $this;
    }

    public function getIntituler(): ?string
    {
        return $this->Intituler;
    }

    public function setIntituler(string $Intituler): self
    {
        $this->Intituler = $Intituler;

        return $this;
    }
}
