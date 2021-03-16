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
     * @ORM\OneToOne(targetEntity=Personne::class)
     */
    private $enfant;

    /**
     * @ORM\OneToOne(targetEntity=Femme::class)
     */
    private $parent;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getParent(): ?Femme
    {
        return $this->parent;
    }

    public function setParent(?Femme $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
    
}
