<?php

namespace App\Entity;

use App\Repository\SanteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maladie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeMaladie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autreMaladie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $evacuer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chirurgie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coutEvacuation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomDechirurgie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coutChirurgie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poids;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $questionSante;

    /**
     * @ORM\OneToOne(targetEntity=Pays::class, cascade={"persist", "remove"})
     */
    private $pays;

    /**
     * @ORM\OneToOne(targetEntity=Personne::class, cascade={"persist", "remove"})
     */
    private $personne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupeSanguin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaladie(): ?string
    {
        return $this->maladie;
    }

    public function setMaladie(?string $maladie): self
    {
        $this->maladie = $maladie;

        return $this;
    }

    public function getTypeMaladie(): ?string
    {
        return $this->typeMaladie;
    }

    public function setTypeMaladie(?string $typeMaladie): self
    {
        $this->typeMaladie = $typeMaladie;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getAutreMaladie(): ?string
    {
        return $this->autreMaladie;
    }

    public function setAutreMaladie(?string $autreMaladie): self
    {
        $this->autreMaladie = $autreMaladie;

        return $this;
    }

    public function getEvacuer(): ?bool
    {
        return $this->evacuer;
    }

    public function setEvacuer(?bool $evacuer): self
    {
        $this->evacuer = $evacuer;

        return $this;
    }

    public function getChirurgie(): ?bool
    {
        return $this->chirurgie;
    }

    public function setChirurgie(?bool $chirurgie): self
    {
        $this->chirurgie = $chirurgie;

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

    public function getNomDechirurgie(): ?string
    {
        return $this->nomDechirurgie;
    }

    public function setNomDechirurgie(?string $nomDechirurgie): self
    {
        $this->nomDechirurgie = $nomDechirurgie;

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

    public function getQuestionSante(): ?bool
    {
        return $this->questionSante;
    }

    public function setQuestionSante(?bool $questionSante): self
    {
        $this->questionSante = $questionSante;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getGroupeSanguin(): ?string
    {
        return $this->groupeSanguin;
    }

    public function setGroupeSanguin(?string $groupeSanguin): self
    {
        $this->groupeSanguin = $groupeSanguin;

        return $this;
    }
}
