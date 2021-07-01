<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\LogementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"logement_read"}},
 *      denormalizationContext={"groups"={"logement_write"}}
 * )
 * @ORM\Entity(repositoryClass=LogementRepository::class)
 */
class Logement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"logement_read", "membre_read"})
     */
    private $id;

    /**
     * @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adressePermanente;

    /**
     * @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseTemporaire;

    /**
     * @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseEmail;

    /**
     * @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $proprietaireounon;

    /**
     * @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $maisonalloueounon;

    /**
     * @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $montantLoyer;

    /**
     *  @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", nullable=true)
     */
    private $montantSyndic;

    /**
     * @Groups({"logement_read", "logement_write"})
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="possede")
     */
    private $membre;

    /**
     *  @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomPays;

    /**
     *  @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $province;

    /**
     *  @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
     *  @Groups({"logement_read", "logement_write", "membre_read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fokotany;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdressePermanente(): ?string
    {
        return $this->adressePermanente;
    }

    public function setAdressePermanente(?string $adressePermanente): self
    {
        $this->adressePermanente = $adressePermanente;

        return $this;
    }

    public function getAdresseTemporaire(): ?string
    {
        return $this->adresseTemporaire;
    }

    public function setAdresseTemporaire(?string $adresseTemporaire): self
    {
        $this->adresseTemporaire = $adresseTemporaire;

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

    public function getProprietaireounon(): ?bool
    {
        return $this->proprietaireounon;
    }

    public function setProprietaireounon(?bool $proprietaireounon): self
    {
        $this->proprietaireounon = $proprietaireounon;

        return $this;
    }

    public function getMaisonalloueounon(): ?bool
    {
        return $this->maisonalloueounon;
    }

    public function setMaisonalloueounon(?bool $maisonalloueounon): self
    {
        $this->maisonalloueounon = $maisonalloueounon;

        return $this;
    }

    public function getMontantLoyer(): ?string
    {
        return $this->montantLoyer;
    }

    public function setMontantLoyer(?string $montantLoyer): self
    {
        $this->montantLoyer = $montantLoyer;

        return $this;
    }

    public function getMontantSyndic(): ?string
    {
        return $this->montantSyndic;
    }

    public function setMontantSyndic(?string $montantSyndic): self
    {
        $this->montantSyndic = $montantSyndic;

        return $this;
    }

    /**
     * @return Collection|Membre[]
     */
    public function getPossede(): Collection
    {
        return $this->possede;
    }

    public function addPossede(Membre $possede): self
    {
        if (!$this->possede->contains($possede)) {
            $this->possede[] = $possede;
            $possede->setLogement($this);
        }

        return $this;
    }

    public function removePossede(Membre $possede): self
    {
        if ($this->possede->removeElement($possede)) {
            // set the owning side to null (unless already changed)
            if ($possede->getLogement() === $this) {
                $possede->setLogement(null);
            }
        }

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

    public function getNomPays(): ?string
    {
        return $this->nomPays;
    }

    public function setNomPays(?string $nomPays): self
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(?string $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
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
}
