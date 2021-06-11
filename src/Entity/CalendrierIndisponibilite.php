<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CalendrierIndisponibilite
 *
 * @ORM\Table(name="calendrier_indisponibilite")
 * @ORM\Entity(repositoryClass="App\Repository\CalendrierIndisponibiliteRepository")
 */
class CalendrierIndisponibilite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_indisponible", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIndisponible;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_indisponibilite", type="datetime", nullable=true)
     */
    private $dateIndisponibilite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Annonce", mappedBy="idIndisponible")
     */
    private $idAnnonce;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAnnonce = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdIndisponible(): ?int
    {
        return $this->idIndisponible;
    }

    public function getDateIndisponibilite(): ?string
    {
        return $this->dateIndisponibilite->format("Y-m-d");
    }

    public function setDateIndisponibilite(?\DateTimeInterface $dateIndisponibilite): self
    {
        $this->dateIndisponibilite = $dateIndisponibilite;

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getIdAnnonce(): Collection
    {
        return $this->idAnnonce;
    }

    public function addIdAnnonce(Annonce $idAnnonce): self
    {
        if (!$this->idAnnonce->contains($idAnnonce)) {
            $this->idAnnonce[] = $idAnnonce;
            $idAnnonce->addIdIndisponible($this);
        }

        return $this;
    }

    public function removeIdAnnonce(Annonce $idAnnonce): self
    {
        if ($this->idAnnonce->removeElement($idAnnonce)) {
            $idAnnonce->removeIdIndisponible($this);
        }

        return $this;
    }

}
