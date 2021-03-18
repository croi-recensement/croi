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
    private $conditionRsa;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rsaJeuneActif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $primeActivite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $garantieJeunes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chequeEnergie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aideFinancierePaiementFactureEau;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prestationFamiliales;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $boursePrimaireLycee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $garantieVisale;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aidePaiementTelephoneInternet;

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

    public function getConditionRsa(): ?int
    {
        return $this->conditionRsa;
    }

    public function setConditionRsa(?int $conditionRsa): self
    {
        $this->conditionRsa = $conditionRsa;

        return $this;
    }

    public function getRsaJeuneActif(): ?int
    {
        return $this->rsaJeuneActif;
    }

    public function setRsaJeuneActif(?int $rsaJeuneActif): self
    {
        $this->rsaJeuneActif = $rsaJeuneActif;

        return $this;
    }

    public function getPrimeActivite(): ?int
    {
        return $this->primeActivite;
    }

    public function setPrimeActivite(?int $primeActivite): self
    {
        $this->primeActivite = $primeActivite;

        return $this;
    }

    public function getGarantieJeunes(): ?string
    {
        return $this->garantieJeunes;
    }

    public function setGarantieJeunes(?string $garantieJeunes): self
    {
        $this->garantieJeunes = $garantieJeunes;

        return $this;
    }

    public function getChequeEnergie(): ?int
    {
        return $this->chequeEnergie;
    }

    public function setChequeEnergie(?int $chequeEnergie): self
    {
        $this->chequeEnergie = $chequeEnergie;

        return $this;
    }

    public function getAideFinancierePaiementFactureEau(): ?int
    {
        return $this->aideFinancierePaiementFactureEau;
    }

    public function setAideFinancierePaiementFactureEau(?int $aideFinancierePaiementFactureEau): self
    {
        $this->aideFinancierePaiementFactureEau = $aideFinancierePaiementFactureEau;

        return $this;
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

    public function getBoursePrimaireLycee(): ?int
    {
        return $this->boursePrimaireLycee;
    }

    public function setBoursePrimaireLycee(?int $boursePrimaireLycee): self
    {
        $this->boursePrimaireLycee = $boursePrimaireLycee;

        return $this;
    }

    public function getGarantieVisale(): ?string
    {
        return $this->garantieVisale;
    }

    public function setGarantieVisale(?string $garantieVisale): self
    {
        $this->garantieVisale = $garantieVisale;

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
