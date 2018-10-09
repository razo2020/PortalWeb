<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetallePedido
 *
 * @ORM\Table(name="detalle_pedido", indexes={@ORM\Index(name="fk_Pedido_has_solped_has_Material_Pedido1_idx", columns={"Pedido_idPedido"}), @ORM\Index(name="fk_Detalle_Pedido_Detalle_peticion_oferta1_idx", columns={"Detalle_peticion_oferta_peticion_oferta_idpeticion_oferta", "Detalle_peticion_oferta_idposicion"}), @ORM\Index(name="fk_Detalle_Pedido_Detalle_solped1_idx", columns={"Detalle_solped_solped_idsolped", "Detalle_solped_idposicion"})})
 * @ORM\Entity(repositoryClass="App\Repository\DetallePedidoRepository")
 */
class DetallePedido
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPosicion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idposicion;

    /**
     * @var float
     *
     * @ORM\Column(name="cantidad", type="float", precision=10, scale=0, nullable=false)
     */
    private $cantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float", precision=10, scale=0, nullable=false)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */
    private $estado;

    /**
     * @var \DetallePeticionOferta
     *
     * @ORM\ManyToOne(targetEntity="DetallePeticionOferta", inversedBy="detallePedidos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Detalle_peticion_oferta_peticion_oferta_idpeticion_oferta", referencedColumnName="peticion_oferta_idpeticion_oferta"),
     *   @ORM\JoinColumn(name="Detalle_peticion_oferta_idposicion", referencedColumnName="idposicion")
     * })
     */
    private $detallePeticionOferta;

    /**
     * @var \DetalleSolped
     *
     * @ORM\ManyToOne(targetEntity="DetalleSolped", inversedBy="detallepedidos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Detalle_solped_solped_idsolped", referencedColumnName="solped_idsolped"),
     *   @ORM\JoinColumn(name="Detalle_solped_idposicion", referencedColumnName="idposicion")
     * })
     */
    private $detalleSolped;

    /**
     * @var \Pedido
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Pedido_idPedido", referencedColumnName="idPedido")
     * })
     */
    private $pedido;

    /**
     * @var \Entrega
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Entrega", mappedBy="detallePedido")
     */
    private  $entregas;

    public function __construct()
    {
        $this->entregas = new ArrayCollection();
    }

    public function getIdposicion(): ?int
    {
        return $this->idposicion;
    }

    public function getCantidad(): ?float
    {
        return $this->cantidad;
    }

    public function setCantidad(float $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

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

    public function getDetallePeticionOferta(): ?DetallePeticionOferta
    {
        return $this->detallePeticionOferta;
    }

    public function setDetallePeticionOferta(?DetallePeticionOferta $detallePeticionOferta): self
    {
        $this->detallePeticionOferta = $detallePeticionOferta;

        return $this;
    }

    public function getDetalleSolped(): ?DetalleSolped
    {
        return $this->detalleSolped;
    }

    public function setDetalleSolped(?DetalleSolped $detalleSolped): self
    {
        $this->detalleSolped = $detalleSolped;

        return $this;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * @return Collection|Entrega[]
     */
    public function getEntregas(): Collection
    {
        return $this->entregas;
    }

    public function addEntrega(Entrega $entrega): self
    {
        if (!$this->entregas->contains($entrega)) {
            $this->entregas[] = $entrega;
            $entrega->setDetallePedido($this);
        }

        return $this;
    }

    public function removeEntrega(Entrega $entrega): self
    {
        if ($this->entregas->contains($entrega)) {
            $this->entregas->removeElement($entrega);
            // set the owning side to null (unless already changed)
            if ($entrega->getDetallePedido() === $this) {
                $entrega->setDetallePedido(null);
            }
        }

        return $this;
    }


}

