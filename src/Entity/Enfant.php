<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\EnfantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"enfant_read"}},
 *      denormalizationContext={"groups"={"enfant_write"}}
 * )
 * @ORM\Entity(repositoryClass=EnfantRepository::class)
 */
class Enfant
{
    /**
     *  @Groups({"enfant_read"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"enfant_read","enfant_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomFamille;

    /**
     * @Groups({"enfant_read","enfant_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomFamille;

    /**
     * @Groups({"enfant_read","enfant_write","membre_read"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @Groups({"enfant_read","enfant_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @Groups({"enfant_read","enfant_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @Groups({"enfant_read","enfant_write","membre_read"})
     * @ORM\Column(type="array", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @Groups({"enfant_read","enfant_write"})
     * @ORM\ManyToOne(targetEntity=Mere::class, inversedBy="enfant")
     */
    private $mere;

    /**
     * @Groups({"enfant_read","enfant_write","membre_read"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $situationMarital = [];

    /**
     * @ORM\OneToMany(targetEntity=Education::class, mappedBy="enfant")
     */
    private $education;

    public function __construct()
    {
        $this->education = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFamille(): ?string
    {
        return $this->nomFamille;
    }

    public function setNomFamille(?string $nomFamille): self
    {
        $this->nomFamille = $nomFamille;

        return $this;
    }

    public function getPrenomFamille(): ?string
    {
        return $this->prenomFamille;
    }

    public function setPrenomFamille(?string $prenomFamille): self
    {
        $this->prenomFamille = $prenomFamille;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNationalite(): ?array
    {
        return $this->nationalite;
    }

    public function setNationalite(?array $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getMere(): ?Mere
    {
        return $this->mere;
    }

    public function setMere(?Mere $mere): self
    {
        $this->mere = $mere;

        return $this;
    }
    
    public function getSituationMarital(): ?array
    {
        return $this->situationMarital;
    }

    public function setSituationMarital(?array $situationMarital): self
    {
        $this->situationMarital = $situationMarital;

        return $this;
    }

    /**
     * @return Collection|Education[]
     */
    public function getEducation(): Collection
    {
        return $this->education;
    }

    public function addEducation(Education $education): self
    {
        if (!$this->education->contains($education)) {
            $this->education[] = $education;
            $education->setEnfant($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->education->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getEnfant() === $this) {
                $education->setEnfant(null);
            }
        }

        return $this;
    }
}
