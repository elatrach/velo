<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MoyenPaiement
 *
 * @ORM\Table(name="moyen_paiement")
 * @ORM\Entity(repositoryClass="App\Repository\MoyenPaiementRepository")
 */
class MoyenPaiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_moyen_paiement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMoyenPaiement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle_moyen_paiement", type="string", length=45, nullable=true)
     */
    private $libelleMoyenPaiement;

    public function getIdMoyenPaiement(): ?int
    {
        return $this->idMoyenPaiement;
    }

    public function getLibelleMoyenPaiement(): ?string
    {
        return $this->libelleMoyenPaiement;
    }

    public function setLibelleMoyenPaiement(?string $libelleMoyenPaiement): self
    {
        $this->libelleMoyenPaiement = $libelleMoyenPaiement;

        return $this;
    }


}
