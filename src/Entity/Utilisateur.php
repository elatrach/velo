<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_utilisateur", type="string", length=45, nullable=true)
     */
    private $nomUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom_utilisateur", type="string", length=45, nullable=true)
     */
    private $prenomUtilisateur;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_de_naissance_utilisateur", type="datetime", nullable=true)
     */
    private $dateDeNaissanceUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse_utilisateur", type="string", length=45, nullable=true)
     */
    private $adresseUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail_utilisateur", type="string", length=45, nullable=true)
     */
    private $mailUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mdp_utilisateur", type="string", length=255, nullable=true)
     */
    private $mdpUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portable_utilisateur", type="string", length=45, nullable=true)
     */
    private $portableUtilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_utilisateur", type="string", length=45, nullable=true)
     */
    private $typeUtilisateur;

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(?string $nomUtilisateur): self
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur(?string $prenomUtilisateur): self
    {
        $this->prenomUtilisateur = $prenomUtilisateur;

        return $this;
    }

    public function getDateDeNaissanceUtilisateur(): ?\DateTimeInterface
    {
        return $this->dateDeNaissanceUtilisateur;
    }

    public function setDateDeNaissanceUtilisateur(?\DateTimeInterface $dateDeNaissanceUtilisateur): self
    {
        $this->dateDeNaissanceUtilisateur = $dateDeNaissanceUtilisateur;

        return $this;
    }

    public function getAdresseUtilisateur(): ?string
    {
        return $this->adresseUtilisateur;
    }

    public function setAdresseUtilisateur(?string $adresseUtilisateur): self
    {
        $this->adresseUtilisateur = $adresseUtilisateur;

        return $this;
    }

    public function getMailUtilisateur(): ?string
    {
        return $this->mailUtilisateur;
    }

    public function setMailUtilisateur(?string $mailUtilisateur): self
    {
        $this->mailUtilisateur = $mailUtilisateur;

        return $this;
    }

    public function getMdpUtilisateur(): ?string
    {
        return $this->mdpUtilisateur;
    }

    public function setMdpUtilisateur(?string $mdpUtilisateur): self
    {
        $this->mdpUtilisateur = $mdpUtilisateur;

        return $this;
    }

    public function getPortableUtilisateur(): ?string
    {
        return $this->portableUtilisateur;
    }

    public function setPortableUtilisateur(?string $portableUtilisateur): self
    {
        $this->portableUtilisateur = $portableUtilisateur;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(?string $typeUtilisateur): self
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    public function __toString()
    {
        return $this->idUtilisateur;
    }


}
