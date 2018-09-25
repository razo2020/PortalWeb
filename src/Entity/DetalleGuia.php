<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleGuia
 *
 * @ORM\Table(name="detalle_guia", indexes={@ORM\Index(name="IDX_96D1AAD024B239D8", columns={"Guia_idGuia"})})
 * @ORM\Entity
 */
class DetalleGuia
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha = 'CURRENT_TIMESTAMP';

    /**
     * @var \Guia
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Guia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Guia_idGuia", referencedColumnName="idGuia")
     * })
     */
    private $guia;

    /**
     * @var \Entrega
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Entrega", mappedBy="detalleGuia")
     */
    private $entregas;

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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getGuia(): ?Guia
    {
        return $this->guia;
    }

    public function setGuia(?Guia $guia): self
    {
        $this->guia = $guia;

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
            $entrega->setDetalleGuia($this);
        }

        return $this;
    }

    public function removeEntrega(Entrega $entrega): self
    {
        if ($this->entregas->contains($entrega)) {
            $this->entregas->removeElement($entrega);
            // set the owning side to null (unless already changed)
            if ($entrega->getDetalleGuia() === $this) {
                $entrega->setDetalleGuia(null);
            }
        }

        return $this;
    }


}

