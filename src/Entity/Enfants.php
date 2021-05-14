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
     * @ORM\ManyToOne(targetEntity=Marie::class, inversedBy="enfants")
     */
    private $parent;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist", "remove"})
     */
    private $enfant;

    public function getParent(): ?Marie
    {
        return $this->parent;
    }

    public function setParent(?Marie $parent): self
    {
        $this->parent = $parent;

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
