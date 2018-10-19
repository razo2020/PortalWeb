<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material", uniqueConstraints={@ORM\UniqueConstraint(name="MatNombre_UNIQUE", columns={"nombre"})}, indexes={@ORM\Index(name="fk_Material_Categoria1_idx", columns={"Categoria_idCategoria"}), @ORM\Index(name="fk_Material_UND_Medida1_idx", columns={"UND_Medida_idUND_Medida"})})
 * @ORM\Entity(repositoryClass="App\Repository\MaterialRepository")
 */
class Material
{
    /**
     * @var string
     *
     * @ORM\Column(name="idMaterial", type="string", length=16, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmaterial;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=60, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Categoria_idCategoria", referencedColumnName="idCategoria")
     * })
     */
    private $categoria;

    /**
     * @var \UndMedida
     *
     * @ORM\ManyToOne(targetEntity="UndMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UND_Medida_idUND_Medida", referencedColumnName="idUND_Medida")
     * })
     */
    private $undMedida;

    /**
     * @var \Ubicacion
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Ubicacion", mappedBy="material")
     */
    private $ubicaciones;

    /**
     * @var \DetalleSolped
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetalleSolped", mappedBy="material")
     */
    private $detallesolped;

    public function __construct()
    {
        $this->ubicaciones = new ArrayCollection();
        $this->detallesolped = new ArrayCollection();
    }

    public function getIdmaterial(): ?string
    {
        return $this->idmaterial;
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

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

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getUndMedida(): ?UndMedida
    {
        return $this->undMedida;
    }

    public function setUndMedida(?UndMedida $undMedida): self
    {
        $this->undMedida = $undMedida;

        return $this;
    }

    /**
     * @return Collection|Ubicacion[]
     */
    public function getUbicacion(): Collection
    {
        return $this->ubicaciones;
    }

    public function addUbicacion(Ubicacion $ubicacion): self
    {
        if (!$this->ubicaciones->contains($ubicacion)) {
            $this->ubicaciones[] = $ubicacion;
            $ubicacion->setMaterial($this);
        }

        return $this;
    }

    public function removeUbicacion(Ubicacion $ubicacion): self
    {
        if ($this->ubicaciones->contains($ubicacion)) {
            $this->ubicaciones->removeElement($ubicacion);
            // set the owning side to null (unless already changed)
            if ($ubicacion->getMaterial() === $this) {
                $ubicacion->setMaterial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DetalleSolped[]
     */
    public function getDetallesSolped(): Collection
    {
        return $this->detallesolped;
    }

    public function addDetalleSolped(DetalleSolped $detallesolped): self
    {
        if (!$this->detallesolped->contains($detallesolped)) {
            $this->detallesolped[] = $detallesolped;
            $detallesolped->setMaterial($this);
        }

        return $this;
    }

    public function removeDetalleSolped(DetalleSolped $detallesolped): self
    {
        if ($this->detallesolped->contains($detallesolped)) {
            $this->detallesolped->removeElement($detallesolped);
            // set the owning side to null (unless already changed)
            if ($detallesolped->getMaterial() === $this) {
                $detallesolped->setMaterial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ubicacion[]
     */
    public function getUbicaciones(): Collection
    {
        return $this->ubicaciones;
    }

    public function addUbicacione(Ubicacion $ubicacione): self
    {
        if (!$this->ubicaciones->contains($ubicacione)) {
            $this->ubicaciones[] = $ubicacione;
            $ubicacione->setMaterial($this);
        }

        return $this;
    }

    public function removeUbicacione(Ubicacion $ubicacione): self
    {
        if ($this->ubicaciones->contains($ubicacione)) {
            $this->ubicaciones->removeElement($ubicacione);
            // set the owning side to null (unless already changed)
            if ($ubicacione->getMaterial() === $this) {
                $ubicacione->setMaterial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DetalleSolped[]
     */
    public function getDetallesolped(): Collection
    {
        return $this->detallesolped;
    }

}

