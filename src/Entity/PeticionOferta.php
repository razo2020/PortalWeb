<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PeticionOferta
 *
 * @ORM\Table(name="peticion_oferta")
 * @ORM\Entity
 */
class PeticionOferta
{
    /**
     * @var string
     *
     * @ORM\Column(name="idpeticion_oferta", type="string", length=16, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpeticionOferta;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=45, nullable=true)
     */
    private $asunto;

    /**
     * @var string
     *
     * @ORM\Column(name="licitacion", type="string", length=11, nullable=false)
     */
    private $licitacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="Plazo", type="integer", nullable=false)
     */
    private $plazo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="idProveedor", type="string", length=11, nullable=false)
     */
    private $idproveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */
    private $estado;

    /**
     * @var /DetallePeticionOferta
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetallePeticionOferta", mappedBy="peticionOferta")
     */
    private $detallespeticionesofertas;

    public function __construct()
    {
        $this->detallespeticionesofertas = new ArrayCollection();
    }

    public function getIdpeticionOferta(): ?string
    {
        return $this->idpeticionOferta;
    }

    public function getAsunto(): ?string
    {
        return $this->asunto;
    }

    public function setAsunto(?string $asunto): self
    {
        $this->asunto = $asunto;

        return $this;
    }

    public function getLicitacion(): ?string
    {
        return $this->licitacion;
    }

    public function setLicitacion(string $licitacion): self
    {
        $this->licitacion = $licitacion;

        return $this;
    }

    public function getPlazo(): ?int
    {
        return $this->plazo;
    }

    public function setPlazo(int $plazo): self
    {
        $this->plazo = $plazo;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getIdproveedor(): ?string
    {
        return $this->idproveedor;
    }

    public function setIdproveedor(string $idproveedor): self
    {
        $this->idproveedor = $idproveedor;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|DetallePeticionOferta[]
     */
    public function getDetallespeticionesofertas(): Collection
    {
        return $this->detallespeticionesofertas;
    }

    public function addDetallepeticionoferta(DetallePeticionOferta $detallepeticionoferta): self
    {
        if (!$this->detallespeticionesofertas->contains($detallepeticionoferta)) {
            $this->detallespeticionesofertas[] = $detallepeticionoferta;
            $detallepeticionoferta->setPeticionOferta($this);
        }

        return $this;
    }

    public function removeDetallepeticionoferta(DetallePeticionOferta $detallepeticionoferta): self
    {
        if ($this->detallespeticionesofertas->contains($detallepeticionoferta)) {
            $this->detallespeticionesofertas->removeElement($detallepeticionoferta);
            // set the owning side to null (unless already changed)
            if ($detallepeticionoferta->getPeticionOferta() === $this) {
                $detallepeticionoferta->setPeticionOferta(null);
            }
        }

        return $this;
    }

    public function addDetallespeticionesoferta(DetallePeticionOferta $detallespeticionesoferta): self
    {
        if (!$this->detallespeticionesofertas->contains($detallespeticionesoferta)) {
            $this->detallespeticionesofertas[] = $detallespeticionesoferta;
            $detallespeticionesoferta->setPeticionOferta($this);
        }

        return $this;
    }

    public function removeDetallespeticionesoferta(DetallePeticionOferta $detallespeticionesoferta): self
    {
        if ($this->detallespeticionesofertas->contains($detallespeticionesoferta)) {
            $this->detallespeticionesofertas->removeElement($detallespeticionesoferta);
            // set the owning side to null (unless already changed)
            if ($detallespeticionesoferta->getPeticionOferta() === $this) {
                $detallespeticionesoferta->setPeticionOferta(null);
            }
        }

        return $this;
    }


}

