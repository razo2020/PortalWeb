<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comprobante
 *
 * @ORM\Table(name="comprobante")
 * @ORM\Entity
 */
class Comprobante
{
    /**
     * @var string
     *
     * @ORM\Column(name="idComprobante", type="string", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcomprobante;

    /**
     * @var float
     *
     * @ORM\Column(name="precioTotal", type="float", precision=10, scale=0, nullable=false)
     */
    private $preciototal;

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
     * @var \Entrega
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Entrega", mappedBy="comprobante")
     */
    private $entregas;

    public function __construct()
    {
        $this->entregas = new ArrayCollection();
    }

    public function getIdcomprobante(): ?string
    {
        return $this->idcomprobante;
    }

    public function getPreciototal(): ?float
    {
        return $this->preciototal;
    }

    public function setPreciototal(float $preciototal): self
    {
        $this->preciototal = $preciototal;

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

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * @return Collection|Entrega[]
     */
    public function getEntregas(): Collection
    {
        return $this->entregas;
    }

    public function addEntrega(Entrega $entrega): self
    {
        if (!$this->entregas->contains($entrega)) {
            $this->entregas[] = $entrega;
            $entrega->setComprobante($this);
        }

        return $this;
    }

    public function removeEntrega(Entrega $entrega): self
    {
        if ($this->entregas->contains($entrega)) {
            $this->entregas->removeElement($entrega);
            // set the owning side to null (unless already changed)
            if ($entrega->getComprobante() === $this) {
                $entrega->setComprobante(null);
            }
        }

        return $this;
    }


}

