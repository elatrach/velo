<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="photo")
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_photo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPhoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="filename_photo", type="string", length=45, nullable=true)
     */
    private $filenamePhoto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Annonce", inversedBy="idPhoto")
     * @ORM\JoinTable(name="photo_has_annonce",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_photo", referencedColumnName="id_photo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_annonce", referencedColumnName="id_annonce")
     *   }
     * )
     */
    private $idAnnonce;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAnnonce = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdPhoto(): ?int
    {
        return $this->idPhoto;
    }

    public function getFilenamePhoto(): ?string
    {
        return $this->filenamePhoto;
    }

    public function setFilenamePhoto(?string $filenamePhoto): self
    {
        $this->filenamePhoto = $filenamePhoto;

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
        }

        return $this;
    }

    public function removeIdAnnonce(Annonce $idAnnonce): self
    {
        $this->idAnnonce->removeElement($idAnnonce);

        return $this;
    }

    public function __toString()
    {
        return $this->filenamePhoto;
    }

}
