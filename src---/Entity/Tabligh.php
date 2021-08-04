<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\TablighRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read"}},
 *      denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass=TablighRepository::class)
 */
class Tabligh
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $questionMadressa;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $classe;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $frequentMadressa;

    /**
     * @ORM\Column(type="array", length=255, nullable=true)
     */
    private $frequentationMosque;

    /**
     * @ORM\Column(type="boolean")
     */
    private $questionMosque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idee;

    /**
     * @ORM\OneToOne(targetEntity=Commity::class, inversedBy="tabligh", cascade={"persist", "remove"})
     */
    private $commity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestionMadressa(): ?bool
    {
        return $this->questionMadressa;
    }

    public function setQuestionMadressa(?bool $questionMadressa): self
    {
        $this->questionMadressa = $questionMadressa;

        return $this;
    }

    public function getClasse(): ?int
    {
        return $this->classe;
    }

    public function setClasse(?int $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getFrequentMadressa(): ?bool
    {
        return $this->frequentMadressa;
    }

    public function setFrequentMadressa(?bool $frequentMadressa): self
    {
        $this->frequentMadressa = $frequentMadressa;

        return $this;
    }

    public function getFrequentationMosque(): ?array
    {
        return $this->frequentationMosque;
    }

    public function setFrequentationMosque(?array $frequentationMosque): self
    {
        $this->frequentationMosque = $frequentationMosque;

        return $this;
    }

    public function getQuestionMosque(): ?bool
    {
        return $this->questionMosque;
    }

    public function setQuestionMosque(bool $questionMosque): self
    {
        $this->questionMosque = $questionMosque;

        return $this;
    }

    public function getIdee(): ?string
    {
        return $this->idee;
    }

    public function setIdee(?string $idee): self
    {
        $this->idee = $idee;

        return $this;
    }

    public function getCommity(): ?Commity
    {
        return $this->commity;
    }

    public function setCommity(?Commity $commity): self
    {
        // unset the owning side of the relation if necessary
        if ($commity === null && $this->commity !== null) {
            $this->commity->setTabligh(null);
        }

        // set the owning side of the relation if necessary
        if ($commity !== null && $commity->getTabligh() !== $this) {
            $commity->setTabligh($this);
        }

        $this->commity = $commity;

        return $this;
    }

}
