<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\PereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"pere_read"}},
 *      denormalizationContext={"groups"={"pere_write"}}
 * )
 * @ORM\Entity(repositoryClass=PereRepository::class)
 */
class Pere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *  @Groups({"pere_read"})
     */
    private $id;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomFamille;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomFamille;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $documentVoyage;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroPassport;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string",  length=255, nullable=true)
     */
    private $numeroCIN;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string",  length=255, nullable=true)
     */
    private $situationMarital;

    /**
     * @Groups({"pere_read","pere_write","membre_read"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $numeroTelephone;

    /**
     * @Groups({"pere_read"})
     * @ORM\OneToOne(targetEntity=Membre::class, mappedBy="pereFamille", cascade={"persist", "remove"})
     */
    private $membre;

    /**
     * @Groups({"pere_read", "membre_read"})
     * @ORM\OneToOne(targetEntity=Mere::class, mappedBy="pere", cascade={"persist", "remove"})
     */
    private $femme;

    /**
     * @ORM\OneToMany(targetEntity=Education::class, mappedBy="pere")
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

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getDocumentVoyage(): ?string
    {
        return $this->documentVoyage;
    }

    public function setDocumentVoyage(?string $documentVoyage): self
    {
        $this->documentVoyage = $documentVoyage;

        return $this;
    }

    public function getNumeroPassport(): ?string
    {
        return $this->numeroPassport;
    }

    public function setNumeroPassport(?string $numeroPassport): self
    {
        $this->numeroPassport = $numeroPassport;

        return $this;
    }

    public function getNumeroCIN(): ?string
    {
        return $this->numeroCIN;
    }

    public function setNumeroCIN(?string $numeroCIN): self
    {
        $this->numeroCIN = $numeroCIN;

        return $this;
    }

    public function getSituationMarital(): ?string
    {
        return $this->situationMarital;
    }

    public function setSituationMarital(?string $situationMarital): self
    {
        $this->situationMarital = $situationMarital;

        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(?string $numeroTelephone): self
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): self
    {
        // unset the owning side of the relation if necessary
        if ($membre === null && $this->membre !== null) {
            $this->membre->setPereFamille(null);
        }

        // set the owning side of the relation if necessary
        if ($membre !== null && $membre->getPereFamille() !== $this) {
            $membre->setPereFamille($this);
        }

        $this->membre = $membre;

        return $this;
    }

    public function getFemme(): ?Mere
    {
        return $this->femme;
    }

    public function setFemme(?Mere $femme): self
    {
        $this->femme = $femme;

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
            $education->setPere($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->education->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getPere() === $this) {
                $education->setPere(null);
            }
        }

        return $this;
    }
}
