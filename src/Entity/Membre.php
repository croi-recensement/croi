<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MembreRepository::class)
 */
class Membre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    /**
     * @ORM\OneToOne(targetEntity=Femme::class, cascade={"persist", "remove"})
     */
    private $femme;

    /**
     * @ORM\OneToOne(targetEntity=Enfants::class, cascade={"persist", "remove"})
     */
    private $enfant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getFemme(): ?Femme
    {
        return $this->femme;
    }

    public function setFemme(?Femme $femme): self
    {
        $this->femme = $femme;

        return $this;
    }

    public function getEnfant(): ?Enfants
    {
        return $this->enfant;
    }

    public function setEnfant(?Enfants $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }
}
