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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideNourriture;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideEducation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideSocial;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideSante;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aideTravail;

    /**
     * @ORM\ManyToOne(targetEntity=Commity::class, inversedBy="social")
     */
    private $commity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAideNourriture(): ?bool
    {
        return $this->aideNourriture;
    }

    public function setAideNourriture(?bool $aideNourriture): self
    {
        $this->aideNourriture = $aideNourriture;

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

    public function getAideSocial(): ?bool
    {
        return $this->aideSocial;
    }

    public function setAideSocial(?bool $aideSocial): self
    {
        $this->aideSocial = $aideSocial;

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

    public function getCommity(): ?Commity
    {
        return $this->commity;
    }

    public function setCommity(?Commity $commity): self
    {
        $this->commity = $commity;

        return $this;
    }
}
