<?php

namespace App\Entity;

use App\Repository\EducationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EducationRepository::class)
 */
class Education
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomEcole;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomUniversite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carteEtudiant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseEcole;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseUniversite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diplome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anneeScolaire;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="education")
     */
    private $pays;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class)
     */
    private $personne;

    public function getNomEcole(): ?string
    {
        return $this->nomEcole;
    }

    public function setNomEcole(?string $nomEcole): self
    {
        $this->nomEcole = $nomEcole;

        return $this;
    }

    public function getNomUniversite(): ?string
    {
        return $this->nomUniversite;
    }

    public function setNomUniversite(?string $nomUniversite): self
    {
        $this->nomUniversite = $nomUniversite;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(?string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getCarteEtudiant(): ?string
    {
        return $this->carteEtudiant;
    }

    public function setCarteEtudiant(?string $carteEtudiant): self
    {
        $this->carteEtudiant = $carteEtudiant;

        return $this;
    }

    public function getAdresseEcole(): ?string
    {
        return $this->adresseEcole;
    }

    public function setAdresseEcole(?string $adresseEcole): self
    {
        $this->adresseEcole = $adresseEcole;

        return $this;
    }

    public function getAdresseUniversite(): ?string
    {
        return $this->adresseUniversite;
    }

    public function setAdresseUniversite(?string $adresseUniversite): self
    {
        $this->adresseUniversite = $adresseUniversite;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(?string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getAnneeScolaire(): ?string
    {
        return $this->anneeScolaire;
    }

    public function setAnneeScolaire(string $anneeScolaire): self
    {
        $this->anneeScolaire = $anneeScolaire;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

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
