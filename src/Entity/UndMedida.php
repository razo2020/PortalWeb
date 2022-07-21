<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UndMedida
 *
 * @ORM\Table(name="und_medida")
 * @ORM\Entity(repositoryClass="App\Repository\UndMedidaRepository")
 */
class UndMedida
{
    /**
     * @var string
     *
     * @ORM\Column(name="idUND_Medida", type="string", length=3, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idundMedida;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=45, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false, options={"default"="1","fixed"=true})
     */
    private $estado = '1';

    public function getIdundMedida(): ?string
    {
        return $this->idundMedida;
    }

    public function setIdundMedida(string $idundMedida): self
    {
        $this->idundMedida = $idundMedida;

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


}

