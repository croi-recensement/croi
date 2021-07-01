<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\MembreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 *  @ApiResource(
 *      normalizationContext={"groups"={"membre_read"}},
 *      denormalizationContext={"groups"={"membre_write"}}
 * )
 * @ORM\Entity(repositoryClass=MembreRepository::class)
 */
class Membre
{
    /**
     * @Groups({"membre_read"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"membre_read", "membre_write"})
     * @ORM\OneToOne(targetEntity=Pere::class, inversedBy="membre", cascade={"persist", "remove"})
     */
    private $pereFamille;

    /**
     * @Groups({"membre_read"})
     * @ORM\OneToOne(targetEntity=Sante::class, mappedBy="membre", cascade={"persist", "remove"})
     */
    private $sante;

    /**
     * @Groups({"membre_read"})
     * @ORM\OneToMany(targetEntity=Logement::class, mappedBy="membre")
     */
    private $possede;

    /**
     * @Groups({"membre_read"})
     * @ORM\OneToMany(targetEntity=Sport::class, mappedBy="membre")
     */
    private $pratique;

    /**
     * @Groups({"membre_read"})
     * @ORM\OneToMany(targetEntity=Social::class, mappedBy="membre")
     */
    private $avoirSocial;

    /**
     * @Groups({"membre_read"})
     * @ORM\OneToMany(targetEntity=Profession::class, mappedBy="membre")
     */
    private $travailleur;

    /**
     * @Groups({"membre_read"})
     * @ORM\OneToOne(targetEntity=Tabligh::class, mappedBy="croyance", cascade={"persist", "remove"})
     */
    private $tabligh;

    /**
     * @Groups({"membre_read"})
     * @ORM\OneToMany(targetEntity=Education::class, mappedBy="eduquer")
     */
    private $education;

    public function __construct()
    {
        $this->possede = new ArrayCollection();
        $this->pratique = new ArrayCollection();
        $this->avoirSocial = new ArrayCollection();
        $this->travailleur = new ArrayCollection();
        $this->education = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPereFamille(): ?Pere
    {
        return $this->pereFamille;
    }

    public function setPereFamille(?Pere $pereFamille): self
    {
        $this->pereFamille = $pereFamille;

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
            $this->sante->setAvoirSante(null);
        }

        // set the owning side of the relation if necessary
        if ($sante !== null && $sante->getAvoirSante() !== $this) {
            $sante->setAvoirSante($this);
        }

        $this->sante = $sante;

        return $this;
    }

    /**
     * @return Collection|Logement[]
     */
    public function getPossede(): Collection
    {
        return $this->possede;
    }

    public function addPossede(Logement $possede): self
    {
        if (!$this->possede->contains($possede)) {
            $this->possede[] = $possede;
            $possede->setMembre($this);
        }

        return $this;
    }

    public function removePossede(Logement $possede): self
    {
        if ($this->possede->removeElement($possede)) {
            // set the owning side to null (unless already changed)
            if ($possede->getMembre() === $this) {
                $possede->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sport[]
     */
    public function getPratique(): Collection
    {
        return $this->pratique;
    }

    public function addPratique(Sport $pratique): self
    {
        if (!$this->pratique->contains($pratique)) {
            $this->pratique[] = $pratique;
            $pratique->setMembre($this);
        }

        return $this;
    }

    public function removePratique(Sport $pratique): self
    {
        if ($this->pratique->removeElement($pratique)) {
            // set the owning side to null (unless already changed)
            if ($pratique->getMembre() === $this) {
                $pratique->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Social[]
     */
    public function getAvoirSocial(): Collection
    {
        return $this->avoirSocial;
    }

    public function addAvoirSocial(Social $avoirSocial): self
    {
        if (!$this->avoirSocial->contains($avoirSocial)) {
            $this->avoirSocial[] = $avoirSocial;
            $avoirSocial->setMembre($this);
        }

        return $this;
    }

    public function removeAvoirSocial(Social $avoirSocial): self
    {
        if ($this->avoirSocial->removeElement($avoirSocial)) {
            // set the owning side to null (unless already changed)
            if ($avoirSocial->getMembre() === $this) {
                $avoirSocial->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Profession[]
     */
    public function getTravailleur(): Collection
    {
        return $this->travailleur;
    }

    public function addTravailleur(Profession $travailleur): self
    {
        if (!$this->travailleur->contains($travailleur)) {
            $this->travailleur[] = $travailleur;
            $travailleur->setMembre($this);
        }

        return $this;
    }

    public function removeTravailleur(Profession $travailleur): self
    {
        if ($this->travailleur->removeElement($travailleur)) {
            // set the owning side to null (unless already changed)
            if ($travailleur->getMembre() === $this) {
                $travailleur->setMembre(null);
            }
        }

        return $this;
    }

    public function getTabligh(): ?Tabligh
    {
        return $this->tabligh;
    }

    public function setTabligh(?Tabligh $tabligh): self
    {
        // unset the owning side of the relation if necessary
        if ($tabligh === null && $this->tabligh !== null) {
            $this->tabligh->setCroyance(null);
        }

        // set the owning side of the relation if necessary
        if ($tabligh !== null && $tabligh->getCroyance() !== $this) {
            $tabligh->setCroyance($this);
        }

        $this->tabligh = $tabligh;

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
            $education->setEduquer($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->education->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getEduquer() === $this) {
                $education->setEduquer(null);
            }
        }

        return $this;
    }

}
