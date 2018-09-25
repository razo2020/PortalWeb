<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleReserva
 *
 * @ORM\Table(name="detalle_reserva", indexes={@ORM\Index(name="fk_Reserva_has_Almacen_has_Material_Reserva1_idx", columns={"Reserva_idReserva"}), @ORM\Index(name="fk_Detalle_Reserva_Ubicacion1_idx", columns={"Ubicacion_idUbicacion"})})
 * @ORM\Entity
 */
class DetalleReserva
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Res_Alm_Mat_pos", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $resAlmMatPos;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */
    private $estado;

    /**
     * @var \Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Ubicacion", inversedBy="reservas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Ubicacion_idUbicacion", referencedColumnName="idUbicacion")
     * })
     */
    private $ubicacion;

    /**
     * @var \Reserva
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Reserva", inversedBy="detalleReserva")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Reserva_idReserva", referencedColumnName="idReserva")
     * })
     */
    private $reserva;

    public function getResAlmMatPos(): ?int
    {
        return $this->resAlmMatPos;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

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

    public function getUbicacion(): ?Ubicacion
    {
        return $this->ubicacion;
    }

    public function setUbicacion(?Ubicacion $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getReserva(): ?Reserva
    {
        return $this->reserva;
    }

    public function setReserva(?Reserva $reserva): self
    {
        $this->reserva = $reserva;

        return $this;
    }


}

