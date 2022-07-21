<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Guia
 *
 * @ORM\Table(name="guia")
 * @ORM\Entity(repositoryClass="App\Repository\GuiaRepository")
 */
class Guia
{
    /**
     * @var string
     *
     * @ORM\Column(name="idGuia", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idguia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=45, nullable=true)
     */
    private $comentario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreTransportista", type="string", length=45, nullable=false)
     */
    private $nombretransportista;

    /**
     * @var string
     *
     * @ORM\Column(name="DNI", type="string", length=45, nullable=false)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="ruc", type="string", length=11, nullable=true)
     */
    private $ruc;

    /**
     * @var string
     *
     * @ORM\Column(name="razonSocial", type="string", length=45, nullable=true)
     */
    private $razonsocial;

    /**
     * @var \DetalleGuia
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetalleGuia", mappedBy="guia")
     */
    private $detalleGuias;

    public function __construct()
    {
        $this->detalleGuias = new ArrayCollection();
    }

    public function getIdguia(): ?string
    {
        return $this->idguia;
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

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getNombretransportista(): ?string
    {
        return $this->nombretransportista;
    }

    public function setNombretransportista(string $nombretransportista): self
    {
        $this->nombretransportista = $nombretransportista;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getRuc(): ?string
    {
        return $this->ruc;
    }

    public function setRuc(?string $ruc): self
    {
        $this->ruc = $ruc;

        return $this;
    }

    public function getRazonsocial(): ?string
    {
        return $this->razonsocial;
    }

    public function setRazonsocial(?string $razonsocial): self
    {
        $this->razonsocial = $razonsocial;

        return $this;
    }

    /**
     * @return Collection|DetalleGuia[]
     */
    public function getDetalleGuias(): Collection
    {
        return $this->detalleGuias;
    }

    public function addDetalleGuia(DetalleGuia $detalleGuia): self
    {
        if (!$this->detalleGuias->contains($detalleGuia)) {
            $this->detalleGuias[] = $detalleGuia;
            $detalleGuia->setGuia($this);
        }

        return $this;
    }

    public function removeDetalleGuia(DetalleGuia $detalleGuia): self
    {
        if ($this->detalleGuias->contains($detalleGuia)) {
            $this->detalleGuias->removeElement($detalleGuia);
            // set the owning side to null (unless already changed)
            if ($detalleGuia->getGuia() === $this) {
                $detalleGuia->setGuia(null);
            }
        }

        return $this;
    }


}

