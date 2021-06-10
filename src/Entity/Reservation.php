<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="fk_reservation_annonce2_idx", columns={"id_annonce"}), @ORM\Index(name="fk_reservation_utilisateur1_idx", columns={"id_utilisateur"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_debut_reservation", type="datetime", nullable=true)
     */
    private $dateDebutReservation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin_reservation", type="datetime", nullable=true)
     */
    private $dateFinReservation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="statut_reservation", type="string", length=2, nullable=true, options={"comment"="OK=reservation confirmé
KO=reservation annulé
EC=en cours"})
     */
    private $statutReservation;

    /**
     * @var \Annonce
     *
     * @ORM\ManyToOne(targetEntity="Annonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_annonce", referencedColumnName="id_annonce")
     * })
     */
    private $idAnnonce;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
    }

    public function getDateDebutReservation(): ?\DateTimeInterface
    {
        return $this->dateDebutReservation;
    }

    public function setDateDebutReservation(?\DateTimeInterface $dateDebutReservation): self
    {
        $this->dateDebutReservation = $dateDebutReservation;

        return $this;
    }

    public function getDateFinReservation(): ?\DateTimeInterface
    {
        return $this->dateFinReservation;
    }

    public function setDateFinReservation(?\DateTimeInterface $dateFinReservation): self
    {
        $this->dateFinReservation = $dateFinReservation;

        return $this;
    }

    public function getStatutReservation(): ?string
    {
        return $this->statutReservation;
    }

    public function setStatutReservation(?string $statutReservation): self
    {
        $this->statutReservation = $statutReservation;

        return $this;
    }

    public function getIdAnnonce(): ?Annonce
    {
        return $this->idAnnonce;
    }

    public function setIdAnnonce(?Annonce $idAnnonce): self
    {
        $this->idAnnonce = $idAnnonce;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


}
