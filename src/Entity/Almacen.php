<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Almacen
 *
 * @ORM\Table(name="almacen", indexes={@ORM\Index(name="fk_Almacen_Empresa_idx", columns={"Empresa_RUC"})})
 * @ORM\Entity
 */
class Almacen
{
    /**
     * @var string
     *
     * @ORM\Column(name="idAlmacen", type="string", length=12, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @ORM\ManyToOne(targetEntity="Empresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Empresa_RUC", referencedColumnName="RUC")
     * })
     */
    private $empresaRuc;

    /**
     * @var \Ubicacion
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Ubicacion", mappedBy="almacen")
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

    public function getEmpresaRuc(): ?Empresa
    {
        return $this->empresaRuc;
    }

    public function setEmpresaRuc(?Empresa $empresaRuc): self
    {
        $this->empresaRuc = $empresaRuc;

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

    public function removeUbicacione(Ubicacion $ubicacion): self
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

    public function addUbicacione(Ubicacion $ubicacione): self
    {
        if (!$this->ubicaciones->contains($ubicacione)) {
            $this->ubicaciones[] = $ubicacione;
            $ubicacione->setAlmacen($this);
        }

        return $this;
    }


}

