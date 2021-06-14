<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Accessoire
 *
 * @ORM\Table(name="accessoire")
 * @ORM\Entity(repositoryClass="App\Repository\AccessoireRepository")
 */
class Accessoire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_accessoire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAccessoire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_accessoire", type="string", length=45, nullable=true)
     */
    private $libelleAccessoire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Annonce", mappedBy="idAccessoire")
     */
    private $idAnnonce;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAnnonce = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdAccessoire(): ?int
    {
        return $this->idAccessoire;
    }

    public function getLibelleAccessoire(): ?string
    {
        return $this->libelleAccessoire;
    }

    public function setLibelleAccessoire(?string $libelleAccessoire): self
    {
        $this->libelleAccessoire = $libelleAccessoire;

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
            $idAnnonce->addIdAccessoire($this);
        }

        return $this;
    }

    public function removeIdAnnonce(Annonce $idAnnonce): self
    {
        if ($this->idAnnonce->removeElement($idAnnonce)) {
            $idAnnonce->removeIdAccessoire($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->libelleAccessoire;
    }

}
