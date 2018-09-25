<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nivel
 *
 * @ORM\Table(name="nivel", indexes={@ORM\Index(name="fk_Nivel_Aprobaciones1_idx", columns={"Aprobacion_idAprobacion"})})
 * @ORM\Entity
 */
class Nivel
{
    /**
     * @var string
     *
     * @ORM\Column(name="idNivel", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnivel;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="idCargo", type="string", length=45, nullable=false)
     */
    private $idcargo;

    /**
     * @var \Aprobacion
     *
     * @ORM\ManyToOne(targetEntity="Aprobacion", inversedBy="niveles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Aprobacion_idAprobacion", referencedColumnName="idAprobacion")
     * })
     */
    private $aprobacion;

    public function getIdnivel(): ?string
    {
        return $this->idnivel;
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

    public function getIdcargo(): ?string
    {
        return $this->idcargo;
    }

    public function setIdcargo(string $idcargo): self
    {
        $this->idcargo = $idcargo;

        return $this;
    }

    public function getAprobacion(): ?Aprobacion
    {
        return $this->aprobacion;
    }

    public function setAprobacion(?Aprobacion $aprobacion): self
    {
        $this->aprobacion = $aprobacion;

        return $this;
    }


}

