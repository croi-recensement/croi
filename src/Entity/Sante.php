<?php

namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\SanteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"sante_read"}},
 *      denormalizationContext={"groups"={"sante_write"}}
 * )
 * @ORM\Entity(repositoryClass=SanteRepository::class)
 */
class Sante
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="array",  nullable=true)
     */
    private $typeMaladie = [];

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $categorie = [];

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $maladie = [];

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="array", length=255, nullable=true)
     */
    private $groupeSanguin = [];

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $evacuerounon;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chirurgieounon;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $coutEvacuation;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $poids;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $taille;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomChirurgie;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $coutChirurgie;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $questionMaladie;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $nomPays = [];

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $province = [];

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="array", nullable=true)
     */
    private $region = [];

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fokotany;

    /**
     * @Groups({"sante_read","sante_write"})
     * @ORM\OneToOne(targetEntity=Membre::class, inversedBy="sante", cascade={"persist", "remove"})
     */
    private $membre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeMaladie(): ?array
    {
        return $this->typeMaladie;
    }

    public function setTypeMaladie(?array $typeMaladie): self
    {
        $this->typeMaladie = $typeMaladie;

        return $this;
    }

    public function getCategorie(): ?array
    {
        return $this->categorie;
    }

    public function setCategorie(?array $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getMaladie(): ?array
    {
        return $this->maladie;
    }

    public function setMaladie(?array $maladie): self
    {
        $this->maladie = $maladie;

        return $this;
    }

    public function getGroupeSanguin(): ?array
    {
        return $this->groupeSanguin;
    }

    public function setGroupeSanguin(?array $groupeSanguin): self
    {
        $this->groupeSanguin = $groupeSanguin;

        return $this;
    }

    public function getEvacuerounon(): ?bool
    {
        return $this->evacuerounon;
    }

    public function setEvacuerounon(?bool $evacuerounon): self
    {
        $this->evacuerounon = $evacuerounon;

        return $this;
    }

    public function getChirurgieounon(): ?bool
    {
        return $this->chirurgieounon;
    }

    public function setChirurgieounon(?bool $chirurgieounon): self
    {
        $this->chirurgieounon = $chirurgieounon;

        return $this;
    }

    public function getCoutEvacuation(): ?string
    {
        return $this->coutEvacuation;
    }

    public function setCoutEvacuation(?string $coutEvacuation): self
    {
        $this->coutEvacuation = $coutEvacuation;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(?string $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getNomChirurgie(): ?string
    {
        return $this->nomChirurgie;
    }

    public function setNomChirurgie(?string $nomChirurgie): self
    {
        $this->nomChirurgie = $nomChirurgie;

        return $this;
    }

    public function getCoutChirurgie(): ?string
    {
        return $this->coutChirurgie;
    }

    public function setCoutChirurgie(?string $coutChirurgie): self
    {
        $this->coutChirurgie = $coutChirurgie;

        return $this;
    }

    public function getQuestionMaladie(): ?string
    {
        return $this->questionMaladie;
    }

    public function setQuestionMaladie(?string $questionMaladie): self
    {
        $this->questionMaladie = $questionMaladie;

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

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): self
    {
        $this->membre = $membre;

        return $this;
    }
}
