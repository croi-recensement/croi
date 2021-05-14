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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $education;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sante;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $logement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $nouriture;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $finance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $profession;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist", "remove"})
     */
    private $personne;

    public function getEducation(): ?bool
    {
        return $this->education;
    }

    public function setEducation(?bool $education): self
    {
        $this->education = $education;

        return $this;
    }

    public function getSante(): ?bool
    {
        return $this->sante;
    }

    public function setSante(?bool $sante): self
    {
        $this->sante = $sante;

        return $this;
    }

    public function getLogement(): ?bool
    {
        return $this->logement;
    }

    public function setLogement(?bool $logement): self
    {
        $this->logement = $logement;

        return $this;
    }

    public function getNouriture(): ?bool
    {
        return $this->nouriture;
    }

    public function setNouriture(?bool $nouriture): self
    {
        $this->nouriture = $nouriture;

        return $this;
    }

    public function getFinance(): ?bool
    {
        return $this->finance;
    }

    public function setFinance(?bool $finance): self
    {
        $this->finance = $finance;

        return $this;
    }

    public function getProfession(): ?bool
    {
        return $this->profession;
    }

    public function setProfession(?bool $profession): self
    {
        $this->profession = $profession;

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
