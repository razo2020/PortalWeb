<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Almacen
 *
 * @ORM\Table(name="almacen", indexes={@ORM\Index(name="fk_Almacen_Empresa_idx", columns={"Empresa_RUC"})})
 * @ORM\Entity(repositoryClass="App\Repository\AlmacenRepository")
 */
class Almacen
{
    /**
     * @var string
     *
     * @ORM\Column(name="idAlmacen", type="string", length=12, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idalmacen;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=45, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado = '1';

    /**
     * @var \Empresa
     *
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="almacenes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Empresa_RUC", referencedColumnName="RUC")
     * })
     */
    private $empresa;

    /**
     * @var Ubicacion[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Ubicacion", mappedBy="almacen", cascade={"persist"})
     */
    private $ubicaciones;

    public function __construct()
    {
        $this->ubicaciones = new ArrayCollection();
    }

    public function getIdalmacen(): ?string
    {
        return $this->idalmacen;
    }

    public function setIdalmacen(string $idalmacen): self
    {
        $this->idalmacen = $idalmacen;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

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

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * @return Collection|Ubicacion[]
     */
    public function getUbicaciones(): Collection
    {
        return $this->ubicaciones;
    }

    public function addUbicacion(Ubicacion $ubicacion): self
    {
        if (!$this->ubicaciones->contains($ubicacion)) {
            $this->ubicaciones[] = $ubicacion;
            $ubicacion->setAlmacen($this);
        }

        return $this;
    }

    public function removeUbicacion(Ubicacion $ubicacion): self
    {
        if ($this->ubicaciones->contains($ubicacion)) {
            $this->ubicaciones->removeElement($ubicacion);
            // set the owning side to null (unless already changed)
            if ($ubicacion->getAlmacen() === $this) {
                $ubicacion->setAlmacen(null);
            }
        }

        return $this;
    }

}

