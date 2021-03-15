<?php

namespace App\Entity;

use App\Repository\FinanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FinanceRepository::class)
 */
class Finance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $salaire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $loyer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $primeGratification;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class)
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(?int $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getLoyer(): ?int
    {
        return $this->loyer;
    }

    public function setLoyer(?int $loyer): self
    {
        $this->loyer = $loyer;

        return $this;
    }

    public function getPrimeGratification(): ?int
    {
        return $this->primeGratification;
    }

    public function setPrimeGratification(?int $primeGratification): self
    {
        $this->primeGratification = $primeGratification;

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
