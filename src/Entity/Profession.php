<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\ProfessionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"profession_read"}},
 *      denormalizationContext={"groups"={"profession_write"}}
 * )
 * @ORM\Entity(repositoryClass=ProfessionRepository::class)
 */
class Profession
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"profession_read","profession_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domaineActivite;

    /**
     * @Groups({"profession_read","profession_write", "membre_read"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $salaire;

    /**
     * @Groups({"profession_read","profession_write", "membre_read"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prime;

    /**
     * @Groups({"profession_read","profession_write", "membre_read"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $loyer;

    /**
     * @Groups({"profession_read","profession_write"})
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="travailleur")
     */
    private $membre;

    /**
     * @Groups({"profession_read","profession_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profession;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomaineActivite(): ?string
    {
        return $this->domaineActivite;
    }

    public function setDomaineActivite(?string $domaineActivite): self
    {
        $this->domaineActivite = $domaineActivite;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(?int $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getPrime(): ?int
    {
        return $this->prime;
    }

    public function setPrime(?int $prime): self
    {
        $this->prime = $prime;

        return $this;
    }

    public function getLoyer(): ?int
    {
        return $this->loyer;
    }

    public function setLoyer(?int $loyer): self
    {
        $this->loyer = $loyer;

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

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }
}
