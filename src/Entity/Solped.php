<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Solped
 *
 * @ORM\Table(name="solped")
 * @ORM\Entity(repositoryClass="App\Repository\SolpedRepository")
 */
class Solped
{
    /**
     * @var string
     *
     * @ORM\Column(name="idsolped", type="string", length=16, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsolped;

    /**
     * @var string
     *
     * @ORM\Column(name="asunto", type="string", length=45, nullable=true)
     */
    private $asunto;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="string", length=45, nullable=true)
     */
    private $nota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */
    private $estado = '1';

    /**
     * @var /DetalleSolped
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetalleSolped", mappedBy="solped")
     */
    private $detallesolped;

    public function __construct()
    {
        $this->detallesolped = new ArrayCollection();
    }

    public function getIdsolped(): ?string
    {
        return $this->idsolped;
    }

    public function getAsunto(): ?string
    {
        return $this->asunto;
    }

    public function setAsunto(?string $asunto): self
    {
        $this->asunto = $asunto;

        return $this;
    }

    public function getNota(): ?string
    {
        return $this->nota;
    }

    public function setNota(?string $nota): self
    {
        $this->nota = $nota;

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

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|DetalleSolped[]
     */
    public function getDetallesolped(): Collection
    {
        return $this->detallesolped;
    }

    public function addDetallesolped(DetalleSolped $detallesolped): self
    {
        if (!$this->detallesolped->contains($detallesolped)) {
            $this->detallesolped[] = $detallesolped;
            $detallesolped->setSolped($this);
        }

        return $this;
    }

    public function removeDetallesolped(DetalleSolped $detallesolped): self
    {
        if ($this->detallesolped->contains($detallesolped)) {
            $this->detallesolped->removeElement($detallesolped);
            // set the owning side to null (unless already changed)
            if ($detallesolped->getSolped() === $this) {
                $detallesolped->setSolped(null);
            }
        }

        return $this;
    }


}

