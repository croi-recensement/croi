<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\EducationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"education_read"}},
 *      denormalizationContext={"groups"={"education_write"}}
 * )
 * @ORM\Entity(repositoryClass=EducationRepository::class)
 */
class Education
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomEcole;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomUniversite;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $classe;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carteEtudiant;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseEcole;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseUniversite;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diplome;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anneeScolaire;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $nomPays = [];

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $province = [];

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $region = [];

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fokotany;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\ManyToOne(targetEntity=Pere::class, inversedBy="education")
     */
    private $pere;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\ManyToOne(targetEntity=Mere::class, inversedBy="education")
     */
    private $mere;

    /**
     * @Groups({"education_read","education_write","membre_read"})
     * @ORM\ManyToOne(targetEntity=Enfant::class, inversedBy="education")
     */
    private $enfant;

    /**
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="education")
     */
    private $eduquer;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEcole(): ?string
    {
        return $this->nomEcole;
    }

    public function setNomEcole(?string $nomEcole): self
    {
        $this->nomEcole = $nomEcole;

        return $this;
    }

    public function getNomUniversite(): ?string
    {
        return $this->nomUniversite;
    }

    public function setNomUniversite(?string $nomUniversite): self
    {
        $this->nomUniversite = $nomUniversite;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(?string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getCarteEtudiant(): ?string
    {
        return $this->carteEtudiant;
    }

    public function setCarteEtudiant(?string $carteEtudiant): self
    {
        $this->carteEtudiant = $carteEtudiant;

        return $this;
    }

    public function getAdresseEcole(): ?string
    {
        return $this->adresseEcole;
    }

    public function setAdresseEcole(?string $adresseEcole): self
    {
        $this->adresseEcole = $adresseEcole;

        return $this;
    }

    public function getAdresseUniversite(): ?string
    {
        return $this->adresseUniversite;
    }

    public function setAdresseUniversite(?string $adresseUniversite): self
    {
        $this->adresseUniversite = $adresseUniversite;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(?string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getAnneeScolaire(): ?string
    {
        return $this->anneeScolaire;
    }

    public function setAnneeScolaire(?string $anneeScolaire): self
    {
        $this->anneeScolaire = $anneeScolaire;

        return $this;
    }

    public function getNomPays(): ?array
    {
        return $this->nomPays;
    }

    public function setNomPays(?array $nomPays): self
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    public function getProvince(): ?array
    {
        return $this->province;
    }

    public function setProvince(?array $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getRegion(): ?array
    {
        return $this->region;
    }

    public function setRegion(?array $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getFokotany(): ?string
    {
        return $this->fokotany;
    }

    public function setFokotany(?string $fokotany): self
    {
        $this->fokotany = $fokotany;

        return $this;
    }

    public function getPere(): ?Pere
    {
        return $this->pere;
    }

    public function setPere(?Pere $pere): self
    {
        $this->pere = $pere;

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

    public function getEnfant(): ?Enfant
    {
        return $this->enfant;
    }

    public function setEnfant(?Enfant $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }

    public function getEduquer(): ?Membre
    {
        return $this->eduquer;
    }

    public function setEduquer(?Membre $eduquer): self
    {
        $this->eduquer = $eduquer;

        return $this;
    }
}
