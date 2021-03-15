<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocieteRepository::class)
 */
class Societe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class)
     */
    private $personne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domaineActivite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commerce;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getDomaineActivite(): ?string
    {
        return $this->domaineActivite;
    }

    public function setDomaineActivite(?string $domaineActivite): self
    {
        $this->domaineActivite = $domaineActivite;

        return $this;
    }

    public function getCommerce(): ?string
    {
        return $this->commerce;
    }

    public function setCommerce(?string $commerce): self
    {
        $this->commerce = $commerce;

        return $this;
    }
}
