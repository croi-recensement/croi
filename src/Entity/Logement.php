<?php

namespace App\Entity;

use App\Repository\LogementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="boolean")
     */
    private $maisonAllouer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $province;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $quartier;

    public function __toString()
    {
        return "";
    }

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

    public function getMaisonAllouer(): ?bool
    {
        return $this->maisonAllouer;
    }

    public function setMaisonAllouer(bool $maisonAllouer): self
    {
        $this->maisonAllouer = $maisonAllouer;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(string $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->quartier;
    }

    public function setQuartier(?string $quartier): self
    {
        $this->quartier = $quartier;

        return $this;
    }

}
