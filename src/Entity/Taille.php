<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taille
 *
 * @ORM\Table(name="taille")
 * @ORM\Entity(repositoryClass="App\Repository\TailleRepository")
 */
class Taille
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_taille", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTaille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_taille", type="string", length=45, nullable=true)
     */
    private $libelleTaille;

    public function getIdTaille(): ?int
    {
        return $this->idTaille;
    }

    public function getLibelleTaille(): ?string
    {
        return $this->libelleTaille;
    }

    public function setLibelleTaille(?string $libelleTaille): self
    {
        $this->libelleTaille = $libelleTaille;

        return $this;
    }


}
