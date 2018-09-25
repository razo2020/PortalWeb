<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reserva
 *
 * @ORM\Table(name="reserva")
 * @ORM\Entity
 */
class Reserva
{
    /**
     * @var string
     *
     * @ORM\Column(name="idReserva", type="string", length=16, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreserva;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoImputacion", type="string", length=45, nullable=false)
     */
    private $codigoimputacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="plazo", type="integer", nullable=true)
     */
    private $plazo;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado = '1';

    /**
     * @var /DetalleReserva
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetalleReserva", mappedBy="reserva")
     */
    private $detalleReserva;

    public function __construct()
    {
        $this->detalleReserva = new ArrayCollection();
    }

    public function getIdreserva(): ?string
    {
        return $this->idreserva;
    }

    public function getCodigoimputacion(): ?string
    {
        return $this->codigoimputacion;
    }

    public function setCodigoimputacion(string $codigoimputacion): self
    {
        $this->codigoimputacion = $codigoimputacion;

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

    public function getPlazo(): ?int
    {
        return $this->plazo;
    }

    public function setPlazo(?int $plazo): self
    {
        $this->plazo = $plazo;

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
     * @return Collection|DetalleReserva[]
     */
    public function getDetalleReserva(): Collection
    {
        return $this->detalleReserva;
    }

    public function addDetalleReserva(DetalleReserva $detalleReserva): self
    {
        if (!$this->detalleReserva->contains($detalleReserva)) {
            $this->detalleReserva[] = $detalleReserva;
            $detalleReserva->setReserva($this);
        }

        return $this;
    }

    public function removeDetalleReserva(DetalleReserva $detalleReserva): self
    {
        if ($this->detalleReserva->contains($detalleReserva)) {
            $this->detalleReserva->removeElement($detalleReserva);
            // set the owning side to null (unless already changed)
            if ($detalleReserva->getReserva() === $this) {
                $detalleReserva->setReserva(null);
            }
        }

        return $this;
    }


}

