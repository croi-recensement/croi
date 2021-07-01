<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\MereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"mere_read"}},
 *      denormalizationContext={"groups"={"mere_write"}}
 * )
 * @ORM\Entity(repositoryClass=MereRepository::class)
 */
class Mere
{
    /**
     * @Groups({"mere_read","membre_read"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomFamille;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomFamille;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $documentVoyage;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroPassport;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroCIN;

    /**
     *@Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationMarital;

    /**
     * @Groups({"mere_read","mere_write", "membre_read"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $numeroTelephone;

    /**
     * @Groups({"mere_read","mere_write"})
     * @ORM\OneToOne(targetEntity=Pere::class, inversedBy="femme", cascade={"persist", "remove"})
     */
    private $pere;

    /**
     * @Groups({"mere_read", "membre_read"})
     * @ORM\OneToMany(targetEntity=Enfant::class, mappedBy="mere")
     */
    private $enfant;

    /**
     * @Groups({"mere_read","mere_write"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $nombre;

    /**
     * @Groups({"mere_read"})
     * @ORM\OneToMany(targetEntity=Education::class, mappedBy="mere")
     */
    private $education;

    public function __construct()
    {
        $this->enfant = new ArrayCollection();
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

    public function getPere(): ?Pere
    {
        return $this->pere;
    }

    public function setPere(?Pere $pere): self
    {
        // unset the owning side of the relation if necessary
        if ($pere === null && $this->pere !== null) {
            $this->pere->setFemme(null);
        }

        // set the owning side of the relation if necessary
        if ($pere !== null && $pere->getFemme() !== $this) {
            $pere->setFemme($this);
        }

        $this->pere = $pere;

        return $this;
    }

    /**
     * @return Collection|Enfant[]
     */
    public function getEnfant(): Collection
    {
        return $this->enfant;
    }

    public function addEnfant(Enfant $enfant): self
    {
        if (!$this->enfant->contains($enfant)) {
            $this->enfant[] = $enfant;
            $enfant->setMere($this);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): self
    {
        if ($this->enfant->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getMere() === $this) {
                $enfant->setMere(null);
            }
        }

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

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
            $education->setMere($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->education->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getMere() === $this) {
                $education->setMere(null);
            }
        }

        return $this;
    }
}
