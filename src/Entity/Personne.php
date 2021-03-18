<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneRepository::class)
 */
class Personne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $situationMarital;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $specialite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $groupSangin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paysOrigin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationProfessionnel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\OneToMany(targetEntity=Finance::class, mappedBy="personne")
     */
    private $finance;

    public function __construct()
    {
        //$this->maladies = new ArrayCollection();
        //$this->enfants = new ArrayCollection();
        $this->finance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieu_naissance): self
    {
        $this->lieuNaissance = $lieu_naissance;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getSituationMarital(): ?string
    {
        return $this->situationMarital;
    }

    public function setSituationMarital(string $situation_marital): self
    {
        $this->situationMarital = $situation_marital;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getGroupSangin(): ?string
    {
        return $this->groupSangin;
    }

    public function setGroupSangin(string $group_sangin): self
    {
        $this->groupSangin = $group_sangin;

        return $this;
    }

    public function getPaysOrigin(): ?string
    {
        return $this->paysOrigin;
    }

    public function setPaysOrigin(string $pays_origin): self
    {
        $this->paysOrigin = $pays_origin;

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

    public function getSituationProfessionnel(): ?string
    {
        return $this->situationProfessionnel;
    }

    public function setSituationProfessionnel(?string $situationProfessionnel): self
    {
        $this->situationProfessionnel = $situationProfessionnel;

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

    /**
     * @return Collection|Finance[]
     */
    public function getFinance(): Collection
    {
        return $this->finance;
    }

    public function addFinance(Finance $finance): self
    {
        if (!$this->finance->contains($finance)) {
            $this->finance[] = $finance;
            $finance->setPersonne($this);
        }

        return $this;
    }

    public function removeFinance(Finance $finance): self
    {
        if ($this->finance->removeElement($finance)) {
            // set the owning side to null (unless already changed)
            if ($finance->getPersonne() === $this) {
                $finance->setPersonne(null);
            }
        }

        return $this;
    }
}
