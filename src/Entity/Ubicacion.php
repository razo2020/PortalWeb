<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ubicacion
 *
 * @ORM\Table(name="ubicacion", uniqueConstraints={@ORM\UniqueConstraint(name="idUbicacion_UNIQUE", columns={"Material_idMaterial", "Almacen_idAlmacen", "Almacen_Empresa_RUC"})}, indexes={@ORM\Index(name="fk_Almacen_has_Material_Material_idx", columns={"Material_idMaterial"}), @ORM\Index(name="fk_Ubicacion_Almacen_idx", columns={"Almacen_idAlmacen", "Almacen_Empresa_RUC"})})
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
     * @var string|null
     *
     * @ORM\Column(name="UbicacionNombre", type="string", length=45, nullable=true)
     */
    private $ubicacion;

    /**
     * @var float
     *
     * @ORM\Column(name="UbicacionStock", type="float", precision=10, scale=0, nullable=false)
     */
    private $stock = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="UbicacionStockSeguridad", type="float", precision=10, scale=0, nullable=true)
     */
    private $stockseguridad;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado = '1';

    /**
     * @var Material
     *
     * @ORM\ManyToOne(targetEntity="Material", inversedBy="$ubicaciones", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Material_idMaterial", referencedColumnName="idMaterial")
     * })
     */
    private $material;

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

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    public function setMaterial(?Material $material): self
    {
        $this->material = $material;

        return $this;
    }
}
