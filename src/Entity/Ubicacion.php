<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ubicacion
 *
 * @ORM\Table(name="ubicacion", uniqueConstraints={@ORM\UniqueConstraint(name="ubicacion_UNIQUE", columns={"Almacen_idAlmacen", "ubicacion"})}, indexes={@ORM\Index(name="fk_Almacen_has_Material_Material1_idx", columns={"Material_idMaterial"}), @ORM\Index(name="fk_Almacen_has_Material_Almacen1_idx", columns={"Almacen_idAlmacen"})})
 * @ORM\Entity(repositoryClass="App\Repository\UbicacionRepository")
 */
class Ubicacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUbicacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=45, nullable=true)
     */
    private $ubicacion;

    /**
     * @var float
     *
     * @ORM\Column(name="stock", type="float", precision=10, scale=0, nullable=false)
     */
    private $stock = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="stockSeguridad", type="float", precision=10, scale=0, nullable=true)
     */
    private $stockseguridad;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado = '1';

    /**
     * @var \Almacen
     *
     * @ORM\ManyToOne(targetEntity="Almacen", inversedBy="ubicaciones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Almacen_idAlmacen", referencedColumnName="idAlmacen")
     * })
     */
    private $almacen;

    /**
     * @var \Material
     *
     * @ORM\ManyToOne(targetEntity="Material", inversedBy="$ubicaciones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Material_idMaterial", referencedColumnName="idMaterial")
     * })
     */
    private $materiales;

    /**
     * @var \DetalleReserva
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetalleReserva", mappedBy="ubicacion")
     */
    private $detallesreservas;

    public function __construct()
    {
        $this->detallesreservas = new ArrayCollection();
    }

    public function getIdubicacion(): ?int
    {
        return $this->idubicacion;
    }

    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(?string $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getStock(): ?float
    {
        return $this->stock;
    }

    public function setStock(float $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStockseguridad(): ?float
    {
        return $this->stockseguridad;
    }

    public function setStockseguridad(?float $stockseguridad): self
    {
        $this->stockseguridad = $stockseguridad;

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

    public function getAlmacen(): ?Almacen
    {
        return $this->almacen;
    }

    public function setAlmacen(?Almacen $almacen): self
    {
        $this->almacen = $almacen;

        return $this;
    }

    public function getMateriales(): ?Material
    {
        return $this->materiales;
    }

    public function setMateriales(?Material $materiales): self
    {
        $this->materiales = $materiales;

        return $this;
    }

    /**
     * @return Collection|DetalleReserva[]
     */
    public function getDetallesReservas(): Collection
    {
        return $this->detallesreservas;
    }

    public function addDetalleReserva(DetalleReserva $detallesreservas): self
    {
        if (!$this->detallesreservas->contains($detallesreservas)) {
            $this->detallesreservas[] = $detallesreservas;
            $detallesreservas->setUbicacion($this);
        }

        return $this;
    }

    public function removeDetalleReserva(DetalleReserva $detallesreservas): self
    {
        if ($this->detallesreservas->contains($detallesreservas)) {
            $this->detallesreservas->removeElement($detallesreservas);
            // set the owning side to null (unless already changed)
            if ($detallesreservas->getUbicacion() === $this) {
                $detallesreservas->setUbicacion(null);
            }
        }

        return $this;
    }

    public function addDetallesreserva(DetalleReserva $detallesreserva): self
    {
        if (!$this->detallesreservas->contains($detallesreserva)) {
            $this->detallesreservas[] = $detallesreserva;
            $detallesreserva->setUbicacion($this);
        }

        return $this;
    }

    public function removeDetallesreserva(DetalleReserva $detallesreserva): self
    {
        if ($this->detallesreservas->contains($detallesreserva)) {
            $this->detallesreservas->removeElement($detallesreserva);
            // set the owning side to null (unless already changed)
            if ($detallesreserva->getUbicacion() === $this) {
                $detallesreserva->setUbicacion(null);
            }
        }

        return $this;
    }


}

