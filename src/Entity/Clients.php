<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 */
class Clients extends User
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
    private $NomClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AdresseLieu;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumClient;

    /**
     * @ORM\OneToMany(targetEntity=Contacts::class, mappedBy="client")
     */
    private $contacts;

    /**
     * @ORM\OneToMany(targetEntity=Ateliers::class, mappedBy="client")
     */
    private $ateliers;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->ateliers = new ArrayCollection();
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNomClient(): ?string
    {
        return $this->NomClient;
    }

    public function setNomClient(string $NomClient): self
    {
        $this->NomClient = $NomClient;

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


    public function getNumClient(): ?string
    {
        return $this->NumClient;
    }

    public function setNumClient(string $NumClient): self
    {
        $this->NumClient = $NumClient;

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
            $contact->setClient($this);
        }

        return $this;
    }

    public function removeContact(Contacts $contact): self
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getClient() === $this) {
                $contact->setClient(null);
            }
        }

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
            $atelier->setClient($this);
        }

        return $this;
    }

    public function removeAtelier(Ateliers $atelier): self
    {
        if ($this->ateliers->contains($atelier)) {
            $this->ateliers->removeElement($atelier);
            // set the owning side to null (unless already changed)
            if ($atelier->getClient() === $this) {
                $atelier->setClient(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->NomClient;
    }
}
