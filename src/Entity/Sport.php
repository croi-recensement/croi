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
     * @Groups({"sport_read","sport_write", "membre_read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pratiqueSportounon;

    /**
     * @Groups({"sport_read","sport_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $frequenceSport;

    /**
     * @Groups({"sport_read","sport_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomSport;

    /**
     * @Groups({"sport_read","sport_write"})
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="pratique")
     */
    private $membre;

    /**
     * @Groups({"sport_read","sport_write", "membre_read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pratiqueLoisirouinon;

    /**
     * @Groups({"sport_read","sport_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomLoisir;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPratiqueSportounon(): ?bool
    {
        return $this->pratiqueSportounon;
    }

    public function setPratiqueSportounon(?bool $pratiqueSportounon): self
    {
        $this->pratiqueSportounon = $pratiqueSportounon;

        return $this;
    }

    public function getFrequenceSport(): ?string
    {
        return $this->frequenceSport;
    }

    public function setFrequenceSport(?string $frequenceSport): self
    {
        $this->frequenceSport = $frequenceSport;

        return $this;
    }

    public function getNomSport(): ?string
    {
        return $this->nomSport;
    }

    public function setNomSport(?string $nomSport): self
    {
        $this->nomSport = $nomSport;

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

    public function getPratiqueLoisirouinon(): ?bool
    {
        return $this->pratiqueLoisirouinon;
    }

    public function setPratiqueLoisirouinon(?bool $pratiqueLoisirouinon): self
    {
        $this->pratiqueLoisirouinon = $pratiqueLoisirouinon;

        return $this;
    }

    public function getNomLoisir(): ?string
    {
        return $this->nomLoisir;
    }

    public function setNomLoisir(?string $nomLoisir): self
    {
        $this->nomLoisir = $nomLoisir;

        return $this;
    }
}
