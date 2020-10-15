<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
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
}
