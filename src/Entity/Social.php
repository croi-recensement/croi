<?php

namespace App\Entity;

use App\Repository\SocialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocialRepository::class)
 */
class Social
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
    private $aideEducation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aideNouriture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aideFinance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aideSante;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aideVisa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aideSport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aideTravail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aideSocial;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="socials")
     */
    private $personne;

    public function getAideEducation(): ?string
    {
        return $this->aideEducation;
    }

    public function setAideEducation(string $aideEducation): self
    {
        $this->aideEducation = $aideEducation;

        return $this;
    }

    public function getAideNouriture(): ?string
    {
        return $this->aideNouriture;
    }

    public function setAideNouriture(string $aideNouriture): self
    {
        $this->aideNouriture = $aideNouriture;

        return $this;
    }

    public function getAideFinance(): ?string
    {
        return $this->aideFinance;
    }

    public function setAideFinance(string $aideFinance): self
    {
        $this->aideFinance = $aideFinance;

        return $this;
    }

    public function getAideSante(): ?string
    {
        return $this->aideSante;
    }

    public function setAideSante(string $aideSante): self
    {
        $this->aideSante = $aideSante;

        return $this;
    }

    public function getAideVisa(): ?string
    {
        return $this->aideVisa;
    }

    public function setAideVisa(string $aideVisa): self
    {
        $this->aideVisa = $aideVisa;

        return $this;
    }

    public function getAideSport(): ?string
    {
        return $this->aideSport;
    }

    public function setAideSport(string $aideSport): self
    {
        $this->aideSport = $aideSport;

        return $this;
    }

    public function getAideTravail(): ?string
    {
        return $this->aideTravail;
    }

    public function setAideTravail(string $aideTravail): self
    {
        $this->aideTravail = $aideTravail;

        return $this;
    }

    public function getAideSocial(): ?string
    {
        return $this->aideSocial;
    }

    public function setAideSocial(string $aideSocial): self
    {
        $this->aideSocial = $aideSocial;

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
