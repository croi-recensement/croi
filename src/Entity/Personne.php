<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      collectionOperations={"post"},
 *      itemOperations={}
 * )
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroCin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroTelephone;

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
    private $situationMarital;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombreEnfants;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hierarchie;

    /**
     * @ORM\OneToOne(targetEntity=Marie::class, mappedBy="personne", cascade={"persist", "remove"})
     */
    private $marie;

    /**
     * @ORM\OneToMany(targetEntity=Sport::class, mappedBy="personne")
     */
    private $sports;


    public function __construct()
    {
        $this->sports = new ArrayCollection();
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?string $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

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

    public function getNumeroCin(): ?string
    {
        return $this->numeroCin;
    }

    public function setNumeroCin(?string $numeroCin): self
    {
        $this->numeroCin = $numeroCin;

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

    public function getSituationMarital(): ?string
    {
        return $this->situationMarital;
    }

    public function setSituationMarital(?string $situationMarital): self
    {
        $this->situationMarital = $situationMarital;

        return $this;
    }

    public function getNombreEnfants(): ?int
    {
        return $this->nombreEnfants;
    }

    public function setNombreEnfants(?int $nombreEnfants): self
    {
        $this->nombreEnfants = $nombreEnfants;

        return $this;
    }

    public function getHierarchie(): ?string
    {
        return $this->hierarchie;
    }

    public function setHierarchie(string $hierarchie): self
    {
        $this->hierarchie = $hierarchie;

        return $this;
    }

    public function getMarie(): ?Marie
    {
        return $this->marie;
    }

    public function setMarie(?Marie $marie): self
    {
        // unset the owning side of the relation if necessary
        if ($marie === null && $this->marie !== null) {
            $this->marie->setPersonne(null);
        }

        // set the owning side of the relation if necessary
        if ($marie !== null && $marie->getPersonne() !== $this) {
            $marie->setPersonne($this);
        }

        $this->marie = $marie;

        return $this;
    }

    /**
     * @return Collection|Sport[]
     */
    public function getSports(): Collection
    {
        return $this->sports;
    }

    public function addSport(Sport $sport): self
    {
        if (!$this->sports->contains($sport)) {
            $this->sports[] = $sport;
            $sport->setPersonne($this);
        }

        return $this;
    }

    public function removeSport(Sport $sport): self
    {
        if ($this->sports->removeElement($sport)) {
            // set the owning side to null (unless already changed)
            if ($sport->getPersonne() === $this) {
                $sport->setPersonne(null);
            }
        }

        return $this;
    }    

}
