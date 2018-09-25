<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historial
 *
 * @ORM\Table(name="historial")
 * @ORM\Entity
 */
class Historial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idHistorial", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhistorial;

    /**
     * @var string
     *
     * @ORM\Column(name="tabla", type="string", length=45, nullable=false)
     */
    private $tabla;

    /**
     * @var string
     *
     * @ORM\Column(name="idTabla", type="string", length=45, nullable=false)
     */
    private $idtabla;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="idUsuario", type="string", length=45, nullable=false)
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text", length=65535, nullable=true)
     */
    private $comentario;

    /**
     * @var string
     *
     * @ORM\Column(name="id2Tabla", type="string", length=45, nullable=true)
     */
    private $id2tabla;

    /**
     * @var string
     *
     * @ORM\Column(name="id3Tabla", type="string", length=45, nullable=true)
     */
    private $id3tabla;

    /**
     * @var string
     *
     * @ORM\Column(name="id4Tabla", type="string", length=45, nullable=true)
     */
    private $id4tabla;

    public function getIdhistorial(): ?int
    {
        return $this->idhistorial;
    }

    public function getTabla(): ?string
    {
        return $this->tabla;
    }

    public function setTabla(string $tabla): self
    {
        $this->tabla = $tabla;

        return $this;
    }

    public function getIdtabla(): ?string
    {
        return $this->idtabla;
    }

    public function setIdtabla(string $idtabla): self
    {
        $this->idtabla = $idtabla;

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

    public function getIdusuario(): ?string
    {
        return $this->idusuario;
    }

    public function setIdusuario(string $idusuario): self
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getId2tabla(): ?string
    {
        return $this->id2tabla;
    }

    public function setId2tabla(?string $id2tabla): self
    {
        $this->id2tabla = $id2tabla;

        return $this;
    }

    public function getId3tabla(): ?string
    {
        return $this->id3tabla;
    }

    public function setId3tabla(?string $id3tabla): self
    {
        $this->id3tabla = $id3tabla;

        return $this;
    }

    public function getId4tabla(): ?string
    {
        return $this->id4tabla;
    }

    public function setId4tabla(?string $id4tabla): self
    {
        $this->id4tabla = $id4tabla;

        return $this;
    }


}

