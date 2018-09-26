<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity
 */
class Empresa
{
    /**
     * @var string
     *
     * @ORM\Column(name="RUC", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ruc;

    /**
     * @var string
     *
     * @ORM\Column(name="razon_Social", type="string", length=45, nullable=false)
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=45, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono1", type="string", length=15, nullable=true)
     */
    private $telefono1;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono2", type="string", length=15, nullable=true)
     */
    private $telefono2;

    /**
     * @var string
     *
     * @ORM\Column(name="rubro", type="string", length=45, nullable=true)
     */
    private $rubro;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=false)
     */
    private $tipo = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado = '1';

    public function getRuc(): ?string
    {
        return $this->ruc;
    }

    public function setRuc(string $ruc): self
    {
        $this->ruc = $ruc;

        return $this;
    }

    public function getRazonSocial(): ?string
    {
        return $this->razonSocial;
    }

    public function setRazonSocial(string $razonSocial): self
    {
        $this->razonSocial = $razonSocial;

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

    public function getTelefono1(): ?string
    {
        return $this->telefono1;
    }

    public function setTelefono1(?string $telefono1): self
    {
        $this->telefono1 = $telefono1;

        return $this;
    }

    public function getTelefono2(): ?string
    {
        return $this->telefono2;
    }

    public function setTelefono2(?string $telefono2): self
    {
        $this->telefono2 = $telefono2;

        return $this;
    }

    public function getRubro(): ?string
    {
        return $this->rubro;
    }

    public function setRubro(?string $rubro): self
    {
        $this->rubro = $rubro;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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

