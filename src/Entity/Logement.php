<?php

namespace App\Entity;

use App\Repository\LogementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogementRepository::class)
 */
class Logement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $proprietaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adressePermanente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseTemporaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $province;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="boolean")
     */
    private $maisonAllouer;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class)
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProprietaire(): ?bool
    {
        return $this->proprietaire;
    }

    public function setProprietaire(bool $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getAdressePermanente(): ?string
    {
        return $this->adressePermanente;
    }

    public function setAdressePermanente(?string $adressePermanente): self
    {
        $this->adressePermanente = $adressePermanente;

        return $this;
    }

    public function getAdresseTemporaire(): ?string
    {
        return $this->adresseTemporaire;
    }

    public function setAdresseTemporaire(?string $adresseTemporaire): self
    {
        $this->adresseTemporaire = $adresseTemporaire;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostale(): ?string
    {
        return $this->codePostale;
    }

    public function setCodePostale(?string $codePostale): self
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(?string $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

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

    public function getPropriete(): ?Personne
    {
        return $this->propriete;
    }

    public function setPropriete(?Personne $propriete): self
    {
        $this->propriete = $propriete;

        return $this;
    }

    public function getMaisonAllouer(): ?bool
    {
        return $this->maisonAllouer;
    }

    public function setMaisonAllouer(bool $maisonAllouer): self
    {
        $this->maisonAllouer = $maisonAllouer;

        return $this;
    }
}
