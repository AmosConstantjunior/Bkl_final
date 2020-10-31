<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactsRepository::class)
 */
class Contacts
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
    private $NomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TelContact;

    /**
     * @ORM\ManyToOne(targetEntity=Ateliers::class, inversedBy="contacts")
     */
    private $atelier;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="contacts")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Poste::class, inversedBy="contacts")
     */
    private $poste;

    /**
     * @ORM\OneToMany(targetEntity=FicheMaintenance::class, mappedBy="Contact")
     */
    private $ficheMaintenances;

    public function __construct()
    {
        $this->ficheMaintenances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->NomContact;
    }

    public function setNomContact(string $NomContact): self
    {
        $this->NomContact = $NomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->PrenomContact;
    }

    public function setPrenomContact(string $PrenomContact): self
    {
        $this->PrenomContact = $PrenomContact;

        return $this;
    }

    public function getTelContact(): ?string
    {
        return $this->TelContact;
    }

    public function setTelContact(string $TelContact): self
    {
        $this->TelContact = $TelContact;

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

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPoste(): ?Poste
    {
        return $this->poste;
    }

    public function setPoste(?Poste $poste): self
    {
        $this->poste = $poste;

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
            $ficheMaintenance->setContact($this);
        }

        return $this;
    }

    public function removeFicheMaintenance(FicheMaintenance $ficheMaintenance): self
    {
        if ($this->ficheMaintenances->contains($ficheMaintenance)) {
            $this->ficheMaintenances->removeElement($ficheMaintenance);
            // set the owning side to null (unless already changed)
            if ($ficheMaintenance->getContact() === $this) {
                $ficheMaintenance->setContact(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->PrenomContact;
        
    }
}
