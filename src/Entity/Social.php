<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\SocialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"social_read"}},
 *      denormalizationContext={"groups"={"social_write"}}
 * )
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
     * @Groups({"social_read","social_write", "membre_read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideNouriture;

    /**
     * @Groups({"social_read","social_write","membre_read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideEducation;

    /**
     * @Groups({"social_read","social_write","membre_read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideSante;

    /**
     * @Groups({"social_read","social_write","membre_read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideTravail;

    /**
     * @Groups({"social_read","social_write"})
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="avoirSocial")
     */
    private $membre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAideNouriture(): ?bool
    {
        return $this->aideNouriture;
    }

    public function setAideNouriture(?bool $aideNouriture): self
    {
        $this->aideNouriture = $aideNouriture;

        return $this;
    }

    public function getAideEducation(): ?bool
    {
        return $this->aideEducation;
    }

    public function setAideEducation(?bool $aideEducation): self
    {
        $this->aideEducation = $aideEducation;

        return $this;
    }

    public function getAideSante(): ?bool
    {
        return $this->aideSante;
    }

    public function setAideSante(?bool $aideSante): self
    {
        $this->aideSante = $aideSante;

        return $this;
    }

    public function getAideTravail(): ?bool
    {
        return $this->aideTravail;
    }

    public function setAideTravail(?bool $aideTravail): self
    {
        $this->aideTravail = $aideTravail;

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): self
    {
        $this->membre = $membre;

        return $this;
    }
}
