<?php

namespace App\Entity;
use App\Entity\Personne;

use App\Repository\EnfantsRepository;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnfantsRepository::class)
 */
class Enfants
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist"})
     */
    private $pere;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist"})
     */
    private $mere;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist"})
     */
    private $enfant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPere(): ?Personne
    {
        return $this->pere;
    }

    public function setPere(?Personne $pere): self
    {
        $this->pere = $pere;

        return $this;
    }

    public function getMere(): ?Personne
    {
        return $this->mere;
    }

    public function setMere(?Personne $mere): self
    {
        $this->mere = $mere;

        return $this;
    }

    public function getEnfant(): ?Personne
    {
        return $this->enfant;
    }

    public function setEnfant(?Personne $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }
    
}
