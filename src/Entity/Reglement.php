<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reglement
 *
 * @ORM\Table(name="reglement", indexes={@ORM\Index(name="fk_reglement_moyen_paiement1_idx", columns={"id_moyen_paiement"}), @ORM\Index(name="fk_reglement_reservation1_idx", columns={"id_reservation"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReglementRepository")
 */
class Reglement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reglement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReglement;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_reglement", type="datetime", nullable=true)
     */
    private $dateReglement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix_reglement", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixReglement;

    /**
     * @var float|null
     *
     * @ORM\Column(name="versement_proprietaire", type="float", precision=10, scale=0, nullable=true)
     */
    private $versementProprietaire;

    /**
     * @var float|null
     *
     * @ORM\Column(name="commission_reglement", type="float", precision=10, scale=0, nullable=true)
     */
    private $commissionReglement;

    /**
     * @var \Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reservation", referencedColumnName="id_reservation")
     * })
     */
    private $idReservation;

    /**
     * @var \MoyenPaiement
     *
     * @ORM\ManyToOne(targetEntity="MoyenPaiement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_moyen_paiement", referencedColumnName="id_moyen_paiement")
     * })
     */
    private $idMoyenPaiement;

    public function getIdReglement(): ?int
    {
        return $this->idReglement;
    }

    public function getDateReglement(): ?\DateTimeInterface
    {
        return $this->dateReglement;
    }

    public function setDateReglement(?\DateTimeInterface $dateReglement): self
    {
        $this->dateReglement = $dateReglement;

        return $this;
    }

    public function getPrixReglement(): ?float
    {
        return $this->prixReglement;
    }

    public function setPrixReglement(?float $prixReglement): self
    {
        $this->prixReglement = $prixReglement;

        return $this;
    }

    public function getVersementProprietaire(): ?float
    {
        return $this->versementProprietaire;
    }

    public function setVersementProprietaire(?float $versementProprietaire): self
    {
        $this->versementProprietaire = $versementProprietaire;

        return $this;
    }

    public function getCommissionReglement(): ?float
    {
        return $this->commissionReglement;
    }

    public function setCommissionReglement(?float $commissionReglement): self
    {
        $this->commissionReglement = $commissionReglement;

        return $this;
    }

    public function getIdReservation(): ?Reservation
    {
        return $this->idReservation;
    }

    public function setIdReservation(?Reservation $idReservation): self
    {
        $this->idReservation = $idReservation;

        return $this;
    }

    public function getIdMoyenPaiement(): ?MoyenPaiement
    {
        return $this->idMoyenPaiement;
    }

    public function setIdMoyenPaiement(?MoyenPaiement $idMoyenPaiement): self
    {
        $this->idMoyenPaiement = $idMoyenPaiement;

        return $this;
    }


}
