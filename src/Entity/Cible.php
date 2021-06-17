<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cible
 *
 * @ORM\Table(name="cible")
 * @ORM\Entity(repositoryClass="App\Repository\CibleRepository")
 */
class Cible
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cible", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCible;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_cible", type="string", length=45, nullable=true)
     */
    private $libelleCible;

    public function getIdCible(): ?int
    {
        return $this->idCible;
    }

    public function getLibelleCible(): ?string
    {
        return $this->libelleCible;
    }

    public function setLibelleCible(?string $libelleCible): self
    {
        $this->libelleCible = $libelleCible;

        return $this;
    }

    public function __toString()
    {
        return $this->libelleCible;
    }


}
