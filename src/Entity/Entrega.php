<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrega
 *
 * @ORM\Table(name="entrega", uniqueConstraints={@ORM\UniqueConstraint(name="idPedido_idGuia_UNIQUE", columns={"Detalle_Pedido_Pedido_idPedido", "Detalle_Pedido_idPosicion", "Detalle_Guia_Guia_idGuia", "Detalle_Guia_idPosicion"})}, indexes={@ORM\Index(name="fk_Detalle_Pedido_has_Detalle_Guia_Detalle_Guia1_idx", columns={"Detalle_Guia_Guia_idGuia", "Detalle_Guia_idPosicion"}), @ORM\Index(name="fk_Detalle_Pedido_has_Detalle_Guia_Detalle_Pedido1_idx", columns={"Detalle_Pedido_Pedido_idPedido", "Detalle_Pedido_idPosicion"}), @ORM\Index(name="fk_Detalle_Pedido_has_Detalle_Guia_Comprobante1_idx", columns={"Comprobante_idComprobante"}), @ORM\Index(name="fk_Entregas_Devoluciones1_idx", columns={"Devolucion_idDevolucion"})})
 * @ORM\Entity(repositoryClass="App\Repository\EntregaRepository")
 */
class Entrega
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEntrega", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $identrega;

    /**
     * @var float
     *
     * @ORM\Column(name="precioEntrega", type="float", precision=10, scale=0, nullable=true)
     */
    private $precioentrega;

    /**
     * @var float
     *
     * @ORM\Column(name="precioDevolucion", type="float", precision=10, scale=0, nullable=true)
     */
    private $preciodevolucion;

    /**
     * @var \Comprobante
     *
     * @ORM\ManyToOne(targetEntity="Comprobante", inversedBy="entregas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Comprobante_idComprobante", referencedColumnName="idComprobante")
     * })
     */
    private $comprobante;

    /**
     * @var \DetalleGuia
     *
     * @ORM\ManyToOne(targetEntity="DetalleGuia", inversedBy="entregas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Detalle_Guia_Guia_idGuia", referencedColumnName="Guia_idGuia"),
     *   @ORM\JoinColumn(name="Detalle_Guia_idPosicion", referencedColumnName="idPosicion")
     * })
     */
    private $detalleGuia;

    /**
     * @var \DetallePedido
     *
     * @ORM\ManyToOne(targetEntity="DetallePedido", inversedBy="entregas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Detalle_Pedido_Pedido_idPedido", referencedColumnName="Pedido_idPedido"),
     *   @ORM\JoinColumn(name="Detalle_Pedido_idPosicion", referencedColumnName="idPosicion")
     * })
     */
    private $detallePedido;

    /**
     * @var \Devolucion
     *
     * @ORM\ManyToOne(targetEntity="Devolucion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Devolucion_idDevolucion", referencedColumnName="idDevolucion")
     * })
     */
    private $devolucion;

    public function getIdentrega(): ?int
    {
        return $this->identrega;
    }

    public function getPrecioentrega(): ?float
    {
        return $this->precioentrega;
    }

    public function setPrecioentrega(?float $precioentrega): self
    {
        $this->precioentrega = $precioentrega;

        return $this;
    }

    public function getPreciodevolucion(): ?float
    {
        return $this->preciodevolucion;
    }

    public function setPreciodevolucion(?float $preciodevolucion): self
    {
        $this->preciodevolucion = $preciodevolucion;

        return $this;
    }

    public function getComprobante(): ?Comprobante
    {
        return $this->comprobante;
    }

    public function setComprobante(?Comprobante $comprobante): self
    {
        $this->comprobante = $comprobante;

        return $this;
    }

    public function getDetalleGuia(): ?DetalleGuia
    {
        return $this->detalleGuia;
    }

    public function setDetalleGuia(?DetalleGuia $detalleGuia): self
    {
        $this->detalleGuia = $detalleGuia;

        return $this;
    }

    public function getDetallePedido(): ?DetallePedido
    {
        return $this->detallePedido;
    }

    public function setDetallePedido(?DetallePedido $detallePedido): self
    {
        $this->detallePedido = $detallePedido;

        return $this;
    }

    public function getDevolucion(): ?Devolucion
    {
        return $this->devolucion;
    }

    public function setDevolucion(?Devolucion $devolucion): self
    {
        $this->devolucion = $devolucion;

        return $this;
    }


}

