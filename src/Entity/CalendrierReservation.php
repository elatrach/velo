<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CalendrierReservation
 *
 * @ORM\Table(name="calendrier_reservation")
 * @ORM\Entity(repositoryClass="App\Repository\CalendrierReservationRepository")
 */
class CalendrierReservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_calendrier_reservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCalendrierReservation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_reservation", type="datetime", nullable=true)
     */
    private $dateReservation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Reservation", inversedBy="idCalendrierReservation")
     * @ORM\JoinTable(name="reservation_has_cal_reservation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_calendrier_reservation", referencedColumnName="id_calendrier_reservation")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_reservation", referencedColumnName="id_reservation")
     *   }
     * )
     */
    private $idReservation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idReservation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdCalendrierReservation(): ?int
    {
        return $this->idCalendrierReservation;
    }

    public function getDateReservation(): ?string
    {
        return $this->dateReservation->format("Y-m-d");
    }

    public function setDateReservation(?\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getIdReservation(): Collection
    {
        return $this->idReservation;
    }

    public function addIdReservation(Reservation $idReservation): self
    {
        if (!$this->idReservation->contains($idReservation)) {
            $this->idReservation[] = $idReservation;
        }

        return $this;
    }

    public function removeIdReservation(Reservation $idReservation): self
    {
        $this->idReservation->removeElement($idReservation);

        return $this;
    }



}
