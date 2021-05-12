<?php

namespace App\Entity;

use App\Repository\CommerceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommerceRepository::class)
 */
class Commerce
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
    private $domaineActivite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCommerce;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prime;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="commerces")
     */
    private $personne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loyer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomaineActivite(): ?string
    {
        return $this->domaineActivite;
    }

    public function setDomaineActivite(string $domaineActivite): self
    {
        $this->domaineActivite = $domaineActivite;

        return $this;
    }

    public function getNomCommerce(): ?string
    {
        return $this->nomCommerce;
    }

    public function setNomCommerce(string $nomCommerce): self
    {
        $this->nomCommerce = $nomCommerce;

        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire(string $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getPrime(): ?string
    {
        return $this->prime;
    }

    public function setPrime(string $prime): self
    {
        $this->prime = $prime;

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

    public function getLoyer(): ?string
    {
        return $this->loyer;
    }

    public function setLoyer(string $loyer): self
    {
        $this->loyer = $loyer;

        return $this;
    }
}
