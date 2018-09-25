<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido")
 * @ORM\Entity
 */
class Pedido
{
    /**
     * @var string
     *
     * @ORM\Column(name="idPedido", type="string", length=16, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpedido;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=45, nullable=true)
     */
    private $asunto;

    /**
     * @var string
     *
     * @ORM\Column(name="idProveedor", type="string", length=45, nullable=false)
     */
    private $idproveedor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="diasFactura", type="integer", nullable=false)
     */
    private $diasfactura;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */
    private $estado;

    /**
     * @var \Detallepedido
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetallePedido", mappedBy="pedido")
     */
    private $detallepedidos;

    public function __construct()
    {
        $this->detallepedidos = new ArrayCollection();
    }

    public function getIdpedido(): ?string
    {
        return $this->idpedido;
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

    public function getIdproveedor(): ?string
    {
        return $this->idproveedor;
    }

    public function setIdproveedor(string $idproveedor): self
    {
        $this->idproveedor = $idproveedor;

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

    public function getDiasfactura(): ?int
    {
        return $this->diasfactura;
    }

    public function setDiasfactura(int $diasfactura): self
    {
        $this->diasfactura = $diasfactura;

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
     * @return Collection|DetallePedido[]
     */
    public function getDetallepedidos(): Collection
    {
        return $this->detallepedidos;
    }

    public function addDetallepedido(DetallePedido $detallepedido): self
    {
        if (!$this->detallepedidos->contains($detallepedido)) {
            $this->detallepedidos[] = $detallepedido;
            $detallepedido->setPedido($this);
        }

        return $this;
    }

    public function removeDetallepedido(DetallePedido $detallepedido): self
    {
        if ($this->detallepedidos->contains($detallepedido)) {
            $this->detallepedidos->removeElement($detallepedido);
            // set the owning side to null (unless already changed)
            if ($detallepedido->getPedido() === $this) {
                $detallepedido->setPedido(null);
            }
        }

        return $this;
    }


}

