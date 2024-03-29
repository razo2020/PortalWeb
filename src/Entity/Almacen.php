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
     * @var string|null
     *
     * @ORM\Column(name="direccion", type="string", length=45, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false, options={"default"="1","fixed"=true})
     */
    private $estado = '1';

    /**
     * @var \Empresa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Empresa", inversedBy="almacenes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Empresa_RUC", referencedColumnName="RUC")
     * })
     */
    private $empresa;

    /**
     * @var Material[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Material", mappedBy="almacen", cascade={"persist"})
     */
    private $materiales;

    public function __construct()
    {
        $this->materiales = new ArrayCollection();
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
    public function getMateriales(): Collection
    {
        return $this->materiales;
    }

    public function addMaterial(Material $material): self
    {
        if (!$this->materiales->contains($material)) {
            $this->materiales[] = $material;
            $material->setAlmacen($this);
        }

        return $this;
    }

    public function removeMaterial(Material $material): self
    {
        if ($this->materiales->contains($material)) {
            $this->materiales->removeElement($material);
            // set the owning side to null (unless already changed)
            if ($material->getAlmacen() === $this) {
                $material->setAlmacen(null);
            }
        }

        return $this;
    }

}

