<?php

namespace App\Entity;

use App\Repository\SocialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocialRepository::class)
 */
class Social
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aideFinancierePaiementFactureEau;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prestationFamiliales;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allocationSolidaritePersonneAgee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $protectionMaladieEtMedicament;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementaireSante;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $primeTransitoireSolidarite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annee;

    /**
     * @ORM\ManyToOne(targetEntity=Finance::class, inversedBy="socials")
     */
    private $finance;

     /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="personne")
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrestationFamiliales(): ?int
    {
        return $this->prestationFamiliales;
    }

    public function setPrestationFamiliales(?int $prestationFamiliales): self
    {
        $this->prestationFamiliales = $prestationFamiliales;

        return $this;
    }

    public function getAidePaiementTelephoneInternet(): ?int
    {
        return $this->aidePaiementTelephoneInternet;
    }

    public function setAidePaiementTelephoneInternet(?int $aidePaiementTelephoneInternet): self
    {
        $this->aidePaiementTelephoneInternet = $aidePaiementTelephoneInternet;

        return $this;
    }

    public function getAllocationSolidaritePersonneAgee(): ?string
    {
        return $this->allocationSolidaritePersonneAgee;
    }

    public function setAllocationSolidaritePersonneAgee(?string $allocationSolidaritePersonneAgee): self
    {
        $this->allocationSolidaritePersonneAgee = $allocationSolidaritePersonneAgee;

        return $this;
    }

    public function getProtectionMaladieEtMedicament(): ?string
    {
        return $this->protectionMaladieEtMedicament;
    }

    public function setProtectionMaladieEtMedicament(?string $protectionMaladieEtMedicament): self
    {
        $this->protectionMaladieEtMedicament = $protectionMaladieEtMedicament;

        return $this;
    }

    public function getComplementaireSante(): ?string
    {
        return $this->complementaireSante;
    }

    public function setComplementaireSante(?string $complementaireSante): self
    {
        $this->complementaireSante = $complementaireSante;

        return $this;
    }

    public function getPrimeTransitoireSolidarite(): ?int
    {
        return $this->primeTransitoireSolidarite;
    }

    public function setPrimeTransitoireSolidarite(?int $primeTransitoireSolidarite): self
    {
        $this->primeTransitoireSolidarite = $primeTransitoireSolidarite;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(?string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getFinance(): ?Finance
    {
        return $this->finance;
    }

    public function setFinance(?Finance $finance): self
    {
        $this->finance = $finance;

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
}
