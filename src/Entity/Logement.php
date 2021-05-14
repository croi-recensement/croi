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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adressePermanante;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseTemporaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $proprietaire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $maisonAlloue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $montantLoyer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $montantSyndic;

    /**
     * @ORM\OneToOne(targetEntity=Pays::class, cascade={"persist", "remove"})
     */
    private $pays;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist", "remove"})
     */
    private $personne;

    public function getAdressePermanante(): ?string
    {
        return $this->adressePermanante;
    }

    public function setAdressePermanante(?string $adressePermanante): self
    {
        $this->adressePermanante = $adressePermanante;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getProprietaire(): ?bool
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?bool $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getMaisonAlloue(): ?bool
    {
        return $this->maisonAlloue;
    }

    public function setMaisonAlloue(?bool $maisonAlloue): self
    {
        $this->maisonAlloue = $maisonAlloue;

        return $this;
    }

    public function getMontantLoyer(): ?string
    {
        return $this->montantLoyer;
    }

    public function setMontantLoyer(?string $montantLoyer): self
    {
        $this->montantLoyer = $montantLoyer;

        return $this;
    }

    public function getMontantSyndic(): ?string
    {
        return $this->montantSyndic;
    }

    public function setMontantSyndic(?string $montantSyndic): self
    {
        $this->montantSyndic = $montantSyndic;

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
