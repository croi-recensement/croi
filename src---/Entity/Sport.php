<?php

namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\SportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"sport_read"}},
 *      denormalizationContext={"groups"={"sport_write"}}
 * )
 * @ORM\Entity(repositoryClass=SportRepository::class)
 */
class Sport
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
    private $pratiqueSport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $quelSport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $quelFrequence;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pratiqueLoisir;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $quelLoisir;

    /**
     * @ORM\OneToOne(targetEntity=Commity::class, inversedBy="sport", cascade={"persist", "remove"})
     */
    private $commity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPratiqueSport(): ?bool
    {
        return $this->pratiqueSport;
    }

    public function setPratiqueSport(?bool $pratiqueSport): self
    {
        $this->pratiqueSport = $pratiqueSport;

        return $this;
    }

    public function getQuelSport(): ?string
    {
        return $this->quelSport;
    }

    public function setQuelSport(?string $quelSport): self
    {
        $this->quelSport = $quelSport;

        return $this;
    }

    public function getQuelFrequence(): ?string
    {
        return $this->quelFrequence;
    }

    public function setQuelFrequence(?string $quelFrequence): self
    {
        $this->quelFrequence = $quelFrequence;

        return $this;
    }

    public function getPratiqueLoisir(): ?bool
    {
        return $this->pratiqueLoisir;
    }

    public function setPratiqueLoisir(?bool $pratiqueLoisir): self
    {
        $this->pratiqueLoisir = $pratiqueLoisir;

        return $this;
    }

    public function getQuelLoisir(): ?string
    {
        return $this->quelLoisir;
    }

    public function setQuelLoisir(?string $quelLoisir): self
    {
        $this->quelLoisir = $quelLoisir;

        return $this;
    }

    public function getCommity(): ?Commity
    {
        return $this->commity;
    }

    public function setCommity(?Commity $commity): self
    {
        // unset the owning side of the relation if necessary
        if ($commity === null && $this->commity !== null) {
            $this->commity->setSport(null);
        }

        // set the owning side of the relation if necessary
        if ($commity !== null && $commity->getSport() !== $this) {
            $commity->setSport($this);
        }

        $this->commity = $commity;

        return $this;
    }
}
