<?php

namespace App\Entity;

use App\Repository\AttestationCqsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttestationCqsRepository::class)
 */
class AttestationCqs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteEquip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ConclEquip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ActionEquip;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteMaint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ConclMaint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ActionMaint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NoteForm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ConclForm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ActionForm;

    /**
     * @ORM\Column(type="integer")
     */
    private $NoteProcess;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ConclProcess;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ActionProcess;

    // /**
    //  * @ORM\Column(type="integer")
    //  */
    // private $NoteMoyen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ConclMoyen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ActionMoyen;

    /**
     * @ORM\ManyToOne(targetEntity=Ateliers::class, inversedBy="attestationCqs")
     */
    private $atelier;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoteEquip(): ?int
    {
        return $this->NoteEquip;
    }

    public function setNoteEquip(int $NoteEquip): self
    {
        $this->NoteEquip = $NoteEquip;

        return $this;
    }

    public function getConclEquip(): ?string
    {
        return $this->ConclEquip;
    }

    public function setConclEquip(string $ConclEquip): self
    {
        $this->ConclEquip = $ConclEquip;

        return $this;
    }

    public function getActionEquip(): ?string
    {
        return $this->ActionEquip;
    }

    public function setActionEquip(string $ActionEquip): self
    {
        $this->ActionEquip = $ActionEquip;

        return $this;
    }

    public function getNoteMaint(): ?int
    {
        return $this->NoteMaint;
    }

    public function setNoteMaint(int $NoteMaint): self
    {
        $this->NoteMaint = $NoteMaint;

        return $this;
    }

    public function getConclMaint(): ?string
    {
        return $this->ConclMaint;
    }

    public function setConclMaint(string $ConclMaint): self
    {
        $this->ConclMaint = $ConclMaint;

        return $this;
    }

    public function getActionMaint(): ?string
    {
        return $this->ActionMaint;
    }

    public function setActionMaint(string $ActionMaint): self
    {
        $this->ActionMaint = $ActionMaint;

        return $this;
    }

    public function getNoteForm(): ?string
    {
        return $this->NoteForm;
    }

    public function setNoteForm(string $NoteForm): self
    {
        $this->NoteForm = $NoteForm;

        return $this;
    }

    public function getConclForm(): ?string
    {
        return $this->ConclForm;
    }

    public function setConclForm(string $ConclForm): self
    {
        $this->ConclForm = $ConclForm;

        return $this;
    }

    public function getActionForm(): ?string
    {
        return $this->ActionForm;
    }

    public function setActionForm(string $ActionForm): self
    {
        $this->ActionForm = $ActionForm;

        return $this;
    }

    public function getNoteProcess(): ?int
    {
        return $this->NoteProcess;
    }

    public function setNoteProcess(int $NoteProcess): self
    {
        $this->NoteProcess = $NoteProcess;

        return $this;
    }

    public function getConclProcess(): ?string
    {
        return $this->ConclProcess;
    }

    public function setConclProcess(string $ConclProcess): self
    {
        $this->ConclProcess = $ConclProcess;

        return $this;
    }

    public function getActionProcess(): ?string
    {
        return $this->ActionProcess;
    }

    public function setActionProcess(string $ActionProcess): self
    {
        $this->ActionProcess = $ActionProcess;

        return $this;
    }

    // public function getNoteMoyen(): ?int
    // {
    //     return $this->NoteMoyen;
    // }

    // public function setNoteMoyen(int $NoteMoyen): self
    // {
    //     $this->NoteMoyen = $NoteMoyen;

    //     return $this;
    // }

    public function getConclMoyen(): ?string
    {
        return $this->ConclMoyen;
    }

    public function setConclMoyen(string $ConclMoyen): self
    {
        $this->ConclMoyen = $ConclMoyen;

        return $this;
    }

    public function getActionMoyen(): ?string
    {
        return $this->ActionMoyen;
    }

    public function setActionMoyen(string $ActionMoyen): self
    {
        $this->ActionMoyen = $ActionMoyen;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
