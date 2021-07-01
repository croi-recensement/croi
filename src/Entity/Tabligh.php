<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\TablighRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=TablighRepository::class)
 */
class Tabligh
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $questionCroyant;

    /**
     * @ORM\OneToOne(targetEntity=Membre::class, inversedBy="tabligh", cascade={"persist", "remove"})
     */
    private $croyance;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionCroyant(): ?bool
    {
        return $this->questionCroyant;
    }

    public function setQuestionCroyant(?bool $questionCroyant): self
    {
        $this->questionCroyant = $questionCroyant;

        return $this;
    }

    public function getCroyance(): ?Membre
    {
        return $this->croyance;
    }

    public function setCroyance(?Membre $croyance): self
    {
        $this->croyance = $croyance;

        return $this;
    }
}
