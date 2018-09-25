<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Aprobacion
 *
 * @ORM\Table(name="aprobacion")
 * @ORM\Entity
 */
class Aprobacion
{
    /**
     * @var string
     *
     * @ORM\Column(name="idAprobacion", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaprobacion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="idEmpresa", type="string", length=11, nullable=false)
     */
    private $idempresa;

    /**
     * @var string
     *
     * @ORM\Column(name="tablaObjeto", type="string", length=45, nullable=false)
     */
    private $tablaobjeto;

    /**
     * @var /Nivel
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Nivel", mappedBy="aprobacion")
     */
    private $niveles;

    public function __construct()
    {
        $this->niveles = new ArrayCollection();
    }

    public function getIdaprobacion(): ?string
    {
        return $this->idaprobacion;
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

    public function getIdempresa(): ?string
    {
        return $this->idempresa;
    }

    public function setIdempresa(string $idempresa): self
    {
        $this->idempresa = $idempresa;

        return $this;
    }

    public function getTablaobjeto(): ?string
    {
        return $this->tablaobjeto;
    }

    public function setTablaobjeto(string $tablaobjeto): self
    {
        $this->tablaobjeto = $tablaobjeto;

        return $this;
    }

    /**
     * @return Collection|Nivel[]
     */
    public function getNiveles(): Collection
    {
        return $this->niveles;
    }

    public function addNivele(Nivel $nivele): self
    {
        if (!$this->niveles->contains($nivele)) {
            $this->niveles[] = $nivele;
            $nivele->setAprobacion($this);
        }

        return $this;
    }

    public function removeNivele(Nivel $nivele): self
    {
        if ($this->niveles->contains($nivele)) {
            $this->niveles->removeElement($nivele);
            // set the owning side to null (unless already changed)
            if ($nivele->getAprobacion() === $this) {
                $nivele->setAprobacion(null);
            }
        }

        return $this;
    }


}

