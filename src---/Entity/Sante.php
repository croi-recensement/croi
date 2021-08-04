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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupeSanguin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $maladieChronique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maladieCardiaque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $temps;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tailles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poids;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $operation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chosePorte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $intervention;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $traitement;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $typeMaladie = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $frequentation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bilanSanguin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paysChirurgie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomMedicament;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $frequence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maladieRelative;

    /**
     * @ORM\OneToOne(targetEntity=Commity::class, inversedBy="sante", cascade={"persist", "remove"})
     */
    private $sante;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(?bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getMaladieChronique(): ?bool
    {
        return $this->maladieChronique;
    }

    public function setMaladieChronique(?bool $maladieChronique): self
    {
        $this->maladieChronique = $maladieChronique;

        return $this;
    }

    public function getMaladieCardiaque(): ?string
    {
        return $this->maladieCardiaque;
    }

    public function setMaladieCardiaque(?string $maladieCardiaque): self
    {
        $this->maladieCardiaque = $maladieCardiaque;

        return $this;
    }

    public function getTemps(): ?string
    {
        return $this->temps;
    }

    public function setTemps(?string $temps): self
    {
        $this->temps = $temps;

        return $this;
    }

    public function getTailles(): ?string
    {
        return $this->tailles;
    }

    public function setTailles(?string $tailles): self
    {
        $this->tailles = $tailles;

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

    public function getOperation(): ?bool
    {
        return $this->operation;
    }

    public function setOperation(?bool $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getChosePorte(): ?string
    {
        return $this->chosePorte;
    }

    public function setChosePorte(?string $chosePorte): self
    {
        $this->chosePorte = $chosePorte;

        return $this;
    }

    public function getIntervention(): ?string
    {
        return $this->intervention;
    }

    public function setIntervention(?string $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTraitement(): ?bool
    {
        return $this->traitement;
    }

    public function setTraitement(?bool $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
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

    public function getFrequentation(): ?string
    {
        return $this->frequentation;
    }

    public function setFrequentation(?string $frequentation): self
    {
        $this->frequentation = $frequentation;

        return $this;
    }

    public function getBilanSanguin(): ?bool
    {
        return $this->bilanSanguin;
    }

    public function setBilanSanguin(?bool $bilanSanguin): self
    {
        $this->bilanSanguin = $bilanSanguin;

        return $this;
    }

    public function getPaysChirurgie(): ?string
    {
        return $this->paysChirurgie;
    }

    public function setPaysChirurgie(?string $paysChirurgie): self
    {
        $this->paysChirurgie = $paysChirurgie;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getNomMedicament(): ?string
    {
        return $this->nomMedicament;
    }

    public function setNomMedicament(?string $nomMedicament): self
    {
        $this->nomMedicament = $nomMedicament;

        return $this;
    }

    public function getFrequence(): ?string
    {
        return $this->frequence;
    }

    public function setFrequence(?string $frequence): self
    {
        $this->frequence = $frequence;

        return $this;
    }

    public function getMaladieRelative(): ?string
    {
        return $this->maladieRelative;
    }

    public function setMaladieRelative(?string $maladieRelative): self
    {
        $this->maladieRelative = $maladieRelative;

        return $this;
    }

    public function getSante(): ?Commity
    {
        return $this->sante;
    }

    public function setSante(?Commity $sante): self
    {
        $this->sante = $sante;

        return $this;
    }
}
