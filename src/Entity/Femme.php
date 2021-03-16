<?php

namespace App\Entity;

use App\Repository\FemmeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FemmeRepository::class)
 */
class Femme
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
    private $coinjoint;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist"})
     */
    private $coinjointe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoinjoint(): ?Personne
    {
        return $this->coinjoint;
    }

    public function setCoinjoint(?Personne $coinjoint): self
    {
        $this->coinjoint = $coinjoint;

        return $this;
    }

    public function getCoinjointe(): ?Personne
    {
        return $this->coinjointe;
    }

    public function setCoinjointe(?Personne $coinjointe): self
    {
        $this->coinjointe = $coinjointe;

        return $this;
    }

}
