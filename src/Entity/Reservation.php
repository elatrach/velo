<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CalendrierReservation", mappedBy="idReservation")
     */
    private $idCalendrierReservation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCalendrierReservation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
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

    /**
     * @return Collection|CalendrierReservation[]
     */
    public function getIdCalendrierReservation(): Collection
    {
        return $this->idCalendrierReservation;
    }

    public function addIdCalendrierReservation(CalendrierReservation $idCalendrierReservation): self
    {
        if (!$this->idCalendrierReservation->contains($idCalendrierReservation)) {
            $this->idCalendrierReservation[] = $idCalendrierReservation;
            $idCalendrierReservation->addIdReservation($this);
        }

        return $this;
    }

    public function removeIdCalendrierReservation(CalendrierReservation $idCalendrierReservation): self
    {
        if ($this->idCalendrierReservation->removeElement($idCalendrierReservation)) {
            $idCalendrierReservation->removeIdReservation($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->idAnnonce;
    }

}
