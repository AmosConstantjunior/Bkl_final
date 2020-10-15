<?php

namespace App\Entity;

use App\Repository\AteliersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AteliersRepository::class)
 */
class Ateliers
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
    private $NomAtelier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AdresseLieu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumAtelier;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Certification;

    /**
     * @ORM\OneToMany(targetEntity=Contacts::class, mappedBy="atelier")
     */
    private $contacts;

    /**
     * @ORM\ManyToOne(targetEntity=Contrats::class, inversedBy="ateliers")
     */
    private $contrat;

    /**
     * @ORM\OneToMany(targetEntity=Machine::class, mappedBy="atelier")
     */
    private $machines;

    /**
     * @ORM\OneToMany(targetEntity=FicheMaintenance::class, mappedBy="atelier")
     */
    private $ficheMaintenances;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="ateliers")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=AttestationCqs::class, mappedBy="atelier")
     */
    private $attestationCqs;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->machines = new ArrayCollection();
        $this->ficheMaintenances = new ArrayCollection();
        $this->attestationCqs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAtelier(): ?string
    {
        return $this->NomAtelier;
    }

    public function setNomAtelier(string $NomAtelier): self
    {
        $this->NomAtelier = $NomAtelier;

        return $this;
    }

    public function getAdresseLieu(): ?string
    {
        return $this->AdresseLieu;
    }

    public function setAdresseLieu(string $AdresseLieu): self
    {
        $this->AdresseLieu = $AdresseLieu;

        return $this;
    }

    public function getNumAtelier(): ?string
    {
        return $this->NumAtelier;
    }

    public function setNumAtelier(string $NumAtelier): self
    {
        $this->NumAtelier = $NumAtelier;

        return $this;
    }

    public function getCertification(): ?bool
    {
        return $this->Certification;
    }

    public function setCertification(?bool $Certification): self
    {
        $this->Certification = $Certification;

        return $this;
    }

    /**
     * @return Collection|Contacts[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contacts $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setAtelier($this);
        }

        return $this;
    }

    public function removeContact(Contacts $contact): self
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getAtelier() === $this) {
                $contact->setAtelier(null);
            }
        }

        return $this;
    }

    public function getContrat(): ?Contrats
    {
        return $this->contrat;
    }

    public function setContrat(?Contrats $contrat): self
    {
        $this->contrat = $contrat;

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
            $machine->setAtelier($this);
        }

        return $this;
    }

    public function removeMachine(Machine $machine): self
    {
        if ($this->machines->contains($machine)) {
            $this->machines->removeElement($machine);
            // set the owning side to null (unless already changed)
            if ($machine->getAtelier() === $this) {
                $machine->setAtelier(null);
            }
        }

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
            $ficheMaintenance->setAtelier($this);
        }

        return $this;
    }

    public function removeFicheMaintenance(FicheMaintenance $ficheMaintenance): self
    {
        if ($this->ficheMaintenances->contains($ficheMaintenance)) {
            $this->ficheMaintenances->removeElement($ficheMaintenance);
            // set the owning side to null (unless already changed)
            if ($ficheMaintenance->getAtelier() === $this) {
                $ficheMaintenance->setAtelier(null);
            }
        }

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }
    public function __toString(): string
    {
        return $this->NomAtelier;
    }

    /**
     * @return Collection|AttestationCqs[]
     */
    public function getAttestationCqs(): Collection
    {
        return $this->attestationCqs;
    }

    public function addAttestationCq(AttestationCqs $attestationCq): self
    {
        if (!$this->attestationCqs->contains($attestationCq)) {
            $this->attestationCqs[] = $attestationCq;
            $attestationCq->setAtelier($this);
        }

        return $this;
    }

    public function removeAttestationCq(AttestationCqs $attestationCq): self
    {
        if ($this->attestationCqs->contains($attestationCq)) {
            $this->attestationCqs->removeElement($attestationCq);
            // set the owning side to null (unless already changed)
            if ($attestationCq->getAtelier() === $this) {
                $attestationCq->setAtelier(null);
            }
        }

        return $this;
    }
}
