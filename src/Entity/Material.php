<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material", uniqueConstraints={@ORM\UniqueConstraint(name="MatNombre_UNIQUE", columns={"nombre"})}, indexes={@ORM\Index(name="fk_Material_Categoria_idx", columns={"Categoria_idCategoria"}), @ORM\Index(name="fk_Material_UND_Medida_idx", columns={"UND_Medida_idUND_Medida"})})
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
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=60, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="sujetoLote", type="string", length=1, nullable=true)
     */
    private $sujetoLote;

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
     * @var Almacen
     *
     * @ORM\ManyToOne(targetEntity="Almacen", inversedBy="materiales", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Almacen_idAlmacen", referencedColumnName="idAlmacen"),
     *   @ORM\JoinColumn(name="Almacen_Empresa_RUC", referencedColumnName="Empresa_RUC")
     * })
     */
    private $almacen;

    public function __construct()
    {
        $this->ubicaciones = new ArrayCollection();
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

    public function getSujetoLote(): ?string
    {
        return $this->sujetoLote;
    }

    public function setSujetoLote(string $sujetoLote): self
    {
        $this->sujetoLote = $sujetoLote;

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

    public function getAlmacen(): ?Almacen
    {
        return $this->almacen;
    }

    public function setAlmacen(?Almacen $almacen): self
    {
        $this->almacen = $almacen;

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

}