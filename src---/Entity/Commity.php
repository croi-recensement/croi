<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CommityRepository::class)
 */
class Commity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomFamille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomFamille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $documentVoyage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroPassport;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroCin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationMarital;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroPhone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity=Enfant::class, mappedBy="commity")
     */
    private $enfants;

    /**
     * @ORM\OneToOne(targetEntity=Mariage::class, mappedBy="commity", cascade={"persist", "remove"})
     */
    private $mariage;

    /**
     * @ORM\OneToMany(targetEntity=Education::class, mappedBy="commity")
     */
    private $education;

    /**
     * @ORM\OneToMany(targetEntity=Logement::class, mappedBy="commity")
     */
    private $logement;

    /**
     * @ORM\OneToMany(targetEntity=Profession::class, mappedBy="commity")
     */
    private $profession;

    /**
     * @ORM\OneToOne(targetEntity=Sante::class, mappedBy="sante", cascade={"persist", "remove"})
     */
    private $sante;

    /**
     * @ORM\OneToMany(targetEntity=Social::class, mappedBy="commity")
     */
    private $social;

    /**
     * @ORM\OneToOne(targetEntity=Sport::class, mappedBy="commity", cascade={"persist", "remove"})
     */
    private $sport;

    /**
     * @ORM\OneToOne(targetEntity=Tabligh::class, inversedBy="commity", cascade={"persist", "remove"})
     */
    private $tabligh;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $situationFamiliale;

    public function __construct()
    {
        $this->enfants = new ArrayCollection();
        $this->education = new ArrayCollection();
        $this->social = new ArrayCollection();
        $this->logement = new ArrayCollection();
        $this->profession = new ArrayCollection();
        //$this->santes = new ArrayCollection();
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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

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

    public function getNumeroCin(): ?string
    {
        return $this->numeroCin;
    }

    public function setNumeroCin(?string $numeroCin): self
    {
        $this->numeroCin = $numeroCin;

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

    public function getNumeroPhone(): ?string
    {
        return $this->numeroPhone;
    }

    public function setNumeroPhone(?string $numeroPhone): self
    {
        $this->numeroPhone = $numeroPhone;

        return $this;
    }

    public function getAdresseEmail(): ?string
    {
        return $this->adresseEmail;
    }

    public function setAdresseEmail(?string $adresseEmail): self
    {
        $this->adresseEmail = $adresseEmail;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection|Enfant[]
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Enfant $enfant): self
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants[] = $enfant;
            $enfant->setCommity($this);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): self
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getCommity() === $this) {
                $enfant->setCommity(null);
            }
        }

        return $this;
    }

    public function getMariage(): ?Mariage
    {
        return $this->mariage;
    }

    public function setMariage(?Mariage $mariage): self
    {
        $this->mariage = $mariage;

        return $this;
    }


    public function getEducation(): ?Collection
    {
        return $this->education;
    }

    public function addEducation(Education $education): self
    {
        if (!$this->education->contains($education)) {
            $this->education[] = $education;
            $education->setCommity($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->education->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getCommity() === $this) {
                $education->setCommity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Logement[]
     */
    public function getLogement(): ?Collection
    {
        return $this->logement;
    }

    public function addLogement(Logement $logement): self
    {
        if (!$this->logement->contains($logement)) {
            $this->logement[] = $logement;
            $logement->setCommity($this);
        }

        return $this;
    }

    public function removeLogement(Logement $logement): self
    {
        if ($this->logement->removeElement($logement)) {
            // set the owning side to null (unless already changed)
            if ($logement->getCommity() === $this) {
                $logement->setCommity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Profession[]
     */
    public function getProfession(): ?Collection
    {
        return $this->profession;
    }

    public function addProfession(Profession $profession): self
    {
        if (!$this->profession->contains($profession)) {
            $this->profession[] = $profession;
            $profession->setCommity($this);
        }

        return $this;
    }

    public function removeProfession(Profession $profession): self
    {
        if ($this->profession->removeElement($profession)) {
            // set the owning side to null (unless already changed)
            if ($profession->getCommity() === $this) {
                $profession->setCommity(null);
            }
        }

        return $this;
    }

    public function getSante(): ?Sante
    {
        return $this->sante;
    }

    public function setSante(?Sante $sante): self
    {
        // unset the owning side of the relation if necessary
        if ($sante === null && $this->sante !== null) {
            $this->sante->setSante(null);
        }

        // set the owning side of the relation if necessary
        if ($sante !== null && $sante->getSante() !== $this) {
            $sante->setSante($this);
        }

        $this->sante = $sante;

        return $this;
    }

    /**
     * @return Collection|Social[]
     */
    public function getSocial(): ?Collection
    {
        return $this->social;
    }

    public function addSocial(Social $social): self
    {
        if (!$this->social->contains($social)) {
            $this->social[] = $social;
            $social->setCommity($this);
        }

        return $this;
    }

    public function removeSocial(Social $social): self
    {
        if ($this->social->removeElement($social)) {
            // set the owning side to null (unless already changed)
            if ($social->getCommity() === $this) {
                $social->setCommity(null);
            }
        }

        return $this;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    public function getTabligh(): ?Tabligh
    {
        return $this->tabligh;
    }

    public function setTabligh(?Tabligh $tabligh): self
    {
        $this->tabligh = $tabligh;

        return $this;
    }

    public function getSituationFamiliale(): ?string
    {
        return $this->situationFamiliale;
    }

    public function setSituationFamiliale(string $situationFamiliale): self
    {
        $this->situationFamiliale = $situationFamiliale;

        return $this;
    }
}
