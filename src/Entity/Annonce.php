<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="fk_annonce_taille1_idx", columns={"id_taille"}), @ORM\Index(name="fk_annonce_utilisateur2_idx", columns={"id_utilisateur"}), @ORM\Index(name="fk_annonce_public1_idx", columns={"id_cible"}), @ORM\Index(name="fk_annonce_categorie1_idx", columns={"id_categorie"})})
 * @ORM\Entity(repositoryClass="App\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_annonce", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnnonce;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titre_annonce", type="string", length=45, nullable=true)
     */
    private $titreAnnonce;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description_annonce", type="string", length=255, nullable=true)
     */
    private $descriptionAnnonce;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prix_annonce", type="string", length=45, nullable=true)
     */
    private $prixAnnonce;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_creation_annonce", type="datetime", nullable=true)
     */
    private $dateCreationAnnonce;

    /**
     * @var bool|1
     *
     * @ORM\Column(name="flag_affiche_annonce", type="boolean", nullable=true)
     */
    private $flagAfficheAnnonce;

    /**
     * @var \Taille
     *
     * @ORM\ManyToOne(targetEntity="Taille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_taille", referencedColumnName="id_taille")
     * })
     */
    private $idTaille;

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
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_categorie")
     * })
     */
    private $idCategorie;

    /**
     * @var \Cible
     *
     * @ORM\ManyToOne(targetEntity="Cible")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_public", referencedColumnName="id_public")
     * })
     */
    private $idCible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Accessoire", inversedBy="idAnnonce")
     * @ORM\JoinTable(name="annonce_accessoire",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_annonce", referencedColumnName="id_annonce")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_accessoire", referencedColumnName="id_accessoire")
     *   }
     * )
     */
    private $idAccessoire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CalendrierIndisponibilite", inversedBy="idAnnonce")
     * @ORM\JoinTable(name="annonce_has_indisponibilite",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_annonce", referencedColumnName="id_annonce")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_indisponible", referencedColumnName="id_indisponible")
     *   }
     * )
     */
    private $idIndisponible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Photo", mappedBy="idAnnonce")
     */
    private $idPhoto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAccessoire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idIndisponible = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idPhoto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdAnnonce(): ?string
    {
        return $this->idAnnonce;
    }

    public function getTitreAnnonce(): ?string
    {
        return $this->titreAnnonce;
    }

    public function setTitreAnnonce(?string $titreAnnonce): self
    {
        $this->titreAnnonce = $titreAnnonce;

        return $this;
    }

    public function getDescriptionAnnonce(): ?string
    {
        return $this->descriptionAnnonce;
    }

    public function setDescriptionAnnonce(?string $descriptionAnnonce): self
    {
        $this->descriptionAnnonce = $descriptionAnnonce;

        return $this;
    }

    public function getPrixAnnonce(): ?string
    {
        return $this->prixAnnonce;
    }

    public function setPrixAnnonce(?string $prixAnnonce): self
    {
        $this->prixAnnonce = $prixAnnonce;

        return $this;
    }

    public function getDateCreationAnnonce(): ?string
    {
        return $this->dateCreationAnnonce->format("Y-m-d");
    }

    public function setDateCreationAnnonce(?\DateTimeInterface $dateCreationAnnonce): self
    {
        $this->dateCreationAnnonce = $dateCreationAnnonce;

        return $this;
    }

    public function getFlagAfficheAnnonce(): ?bool
    {
        return $this->flagAfficheAnnonce;
    }

    public function setFlagAfficheAnnonce(?bool $flagAfficheAnnonce): self
    {
        $this->flagAfficheAnnonce = $flagAfficheAnnonce;

        return $this;
    }

    public function getIdTaille(): ?Taille
    {
        return $this->idTaille;
    }

    public function setIdTaille(?Taille $idTaille): self
    {
        $this->idTaille = $idTaille;

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

    public function getIdCategorie(): ?Categorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?Categorie $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    public function getIdCible(): ?Cible
    {
        return $this->idCible;
    }

    public function setIdCible(?Cible $idCible): self
    {
        $this->idCible = $idCible;

        return $this;
    }

    /**
     * @return Collection|Accessoire[]
     */
    public function getIdAccessoire(): Collection
    {
        return $this->idAccessoire;
    }

    public function addIdAccessoire(Accessoire $idAccessoire): self
    {
        if (!$this->idAccessoire->contains($idAccessoire)) {
            $this->idAccessoire[] = $idAccessoire;
        }

        return $this;
    }

    public function removeIdAccessoire(Accessoire $idAccessoire): self
    {
        $this->idAccessoire->removeElement($idAccessoire);

        return $this;
    }

    /**
     * @return Collection|CalendrierIndisponibilite[]
     */
    public function getIdIndisponible(): Collection
    {
        return $this->idIndisponible;
    }

    public function addIdIndisponible(CalendrierIndisponibilite $idIndisponible): self
    {
        if (!$this->idIndisponible->contains($idIndisponible)) {
            $this->idIndisponible[] = $idIndisponible;
        }

        return $this;
    }

    public function removeIdIndisponible(CalendrierIndisponibilite $idIndisponible): self
    {
        $this->idIndisponible->removeElement($idIndisponible);

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getIdPhoto(): Collection
    {
        return $this->idPhoto;
    }

    public function addIdPhoto(Photo $idPhoto): self
    {
        if (!$this->idPhoto->contains($idPhoto)) {
            $this->idPhoto[] = $idPhoto;
            $idPhoto->addIdAnnonce($this);
        }

        return $this;
    }

    public function removeIdPhoto(Photo $idPhoto): self
    {
        if ($this->idPhoto->removeElement($idPhoto)) {
            $idPhoto->removeIdAnnonce($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->idAnnonce;
    }

}
