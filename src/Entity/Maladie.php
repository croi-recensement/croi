<?php

namespace App\Entity;

use App\Repository\MaladieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaladieRepository::class)
 */
class Maladie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $evacuation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $chirurgie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomChirurgie;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $coutDiagnostique;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $coutEvacuation;


    /**
     * @ORM\ManyToOne(targetEntity=Personne::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateChirurgie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEvacuation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEvacuation(): ?bool
    {
        return $this->evacuation;
    }

    public function setEvacuation(bool $evacuation): self
    {
        $this->evacuation = $evacuation;

        return $this;
    }

    public function getChirurgie(): ?bool
    {
        return $this->chirurgie;
    }

    public function setChirurgie(bool $chirurgie): self
    {
        $this->chirurgie = $chirurgie;

        return $this;
    }

    public function getNomChirurgie(): ?string
    {
        return $this->nomChirurgie;
    }

    public function setNomChirurgie(?string $nom_chirurgie): self
    {
        $this->nomChirurgie = $nom_chirurgie;

        return $this;
    }

    public function getCoutDiagnostique(): ?float
    {
        return $this->coutDiagnostique;
    }

    public function setCoutDiagnostique(?float $cout_diagnostique): self
    {
        $this->coutDiagnostique = $cout_diagnostique;

        return $this;
    }

    public function getCoutEvacuation(): ?float
    {
        return $this->coutEvacuation;
    }

    public function setCoutEvacuation(?float $cout_evacuation): self
    {
        $this->coutEvacuation = $cout_evacuation;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDateChirurgie(): ?\DateTimeInterface
    {
        return $this->dateChirurgie;
    }

    public function setDateChirurgie(?\DateTimeInterface $dateChirurgie): self
    {
        $this->dateChirurgie = $dateChirurgie;

        return $this;
    }

    public function getDateEvacuation(): ?\DateTimeInterface
    {

        return $this->dateEvacuation;
    }

    public function setDateEvacuation(?\DateTimeInterface $dateEvacuation): self
    {
        
        $this->dateEvacuation = $dateEvacuation;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

}
