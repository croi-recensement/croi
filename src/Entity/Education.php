<?php

namespace App\Entity;

use App\Repository\EducationRepository;
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
    private $classe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diplome;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class)
     */
    private $personne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseEcole;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseUnivrs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomUnivrs;

    /**
     * @ORM\OneToOne(targetEntity=Pays::class, cascade={"persist", "remove"})
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cartEtud;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEcole(): ?string
    {
        return $this->nomEcole;
    }

    public function setNomEcole(?string $ecole): self
    {
        $this->nomEcole = $ecole;

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

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(?string $diplome): self
    {
        $this->diplome = $diplome;

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

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(?string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getAdresseEcole(): ?string
    {
        return $this->adresseEcole;
    }

    public function setAdresseEcole(string $adresseEcole): self
    {
        $this->adresseEcole = $adresseEcole;

        return $this;
    }

    public function getAdresseUnivrs(): ?string
    {
        return $this->adresseUnivrs;
    }

    public function setAdresseUnivrs(string $adresseUnivrs): self
    {
        $this->adresseUnivrs = $adresseUnivrs;

        return $this;
    }

    public function getNomUnivrs(): ?string
    {
        return $this->nomUnivrs;
    }

    public function setNomUnivrs(string $nomUnivrs): self
    {
        $this->nomUnivrs = $nomUnivrs;

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

    public function getCartEtud(): ?string
    {
        return $this->cartEtud;
    }

    public function setCartEtud(string $cartEtud): self
    {
        $this->cartEtud = $cartEtud;

        return $this;
    }
}
