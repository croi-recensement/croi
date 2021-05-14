<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SportRepository::class)
 */
class Sport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pratiqueSport;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aimeLoisir;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeSport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $frequenceSport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeLoisir;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anneeDebutSport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anneeDebutLoisir;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="sports")
     */
    private $personne;

    public function getPratiqueSport(): ?bool
    {
        return $this->pratiqueSport;
    }

    public function setPratiqueSport(?bool $pratiqueSport): self
    {
        $this->pratiqueSport = $pratiqueSport;

        return $this;
    }

    public function getAimeLoisir(): ?bool
    {
        return $this->aimeLoisir;
    }

    public function setAimeLoisir(?bool $aimeLoisir): self
    {
        $this->aimeLoisir = $aimeLoisir;

        return $this;
    }

    public function getTypeSport(): ?string
    {
        return $this->typeSport;
    }

    public function setTypeSport(?string $typeSport): self
    {
        $this->typeSport = $typeSport;

        return $this;
    }

    public function getFrequenceSport(): ?string
    {
        return $this->frequenceSport;
    }

    public function setFrequenceSport(?string $frequenceSport): self
    {
        $this->frequenceSport = $frequenceSport;

        return $this;
    }

    public function getTypeLoisir(): ?string
    {
        return $this->typeLoisir;
    }

    public function setTypeLoisir(?string $typeLoisir): self
    {
        $this->typeLoisir = $typeLoisir;

        return $this;
    }

    public function getAnneeDebutSport(): ?string
    {
        return $this->anneeDebutSport;
    }

    public function setAnneeDebutSport(?string $anneeDebutSport): self
    {
        $this->anneeDebutSport = $anneeDebutSport;

        return $this;
    }

    public function getAnneeDebutLoisir(): ?string
    {
        return $this->anneeDebutLoisir;
    }

    public function setAnneeDebutLoisir(?string $anneeDebutLoisir): self
    {
        $this->anneeDebutLoisir = $anneeDebutLoisir;

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
}
