<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleSolped
 *
 * @ORM\Table(name="detalle_solped", indexes={@ORM\Index(name="fk_solped_has_Material_solped_idx", columns={"solped_idsolped"}), @ORM\Index(name="fk_Detalle_solped_Ubicacion_idx", columns={"Ubicacion_idUbicacion"})})
 * @ORM\Entity(repositoryClass="App\Repository\DetalleSolpedRepository")
 */
class DetalleSolped
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idposicion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idposicion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEntrega", type="date", nullable=false)
     */
    private $fechaentrega;

    /**
     * @var float
     *
     * @ORM\Column(name="cantidad", type="float", precision=10, scale=0, nullable=false)
     */
    private $cantidad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comentraio", type="string", length=45, nullable=true)
     */
    private $comentraio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="necesidad", type="string", length=45, nullable=true)
     */
    private $necesidad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="solicitante", type="string", length=45, nullable=true)
     */
    private $solicitante;

    /**
     * @var string
     *
     * @ORM\Column(name="idComprador", type="string", length=8, nullable=false)
     */
    private $idcomprador;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $estado;

    /**
     * @var \Ubicacion[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Ubicacion")
     * @ORM\JoinTable(name="Ubicacion_has_Detalle_solped",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Detalle_solped_idposicion", referencedColumnName="idposicion"),
     *     @ORM\JoinColumn(name="Detalle_solped_solped_idsolped", referencedColumnName="solped_idsolped")
     *   },
     *   inverseJoinColumns={@ORM\JoinColumn(name="Ubicacion_idUbicacion", referencedColumnName="idUbicacion")}
     * )
     */
    private $ubicacion;

    /**
     * @var \Solped
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Solped")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="solped_idsolped", referencedColumnName="idsolped")
     * })
     */
    private $solped;

    /**
     * @var DetallePeticionOferta[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetallePeticionOferta", mappedBy="detalleSolped")
     */
    private $detallepeticionofertas;

    /**
     * @var DetallePedido[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetallePedido", mappedBy="detalleSolped")
     */
    private $detallepedidos;

    public function __construct()
    {
        $this->detallepeticionofertas = new ArrayCollection();
        $this->detallepedidos = new ArrayCollection();
        $this->ubicacion = new ArrayCollection();
    }

    public function getIdposicion(): ?int
    {
        return $this->idposicion;
    }

    public function getFechaentrega(): ?\DateTimeInterface
    {
        return $this->fechaentrega;
    }

    public function setFechaentrega(\DateTimeInterface $fechaentrega): self
    {
        $this->fechaentrega = $fechaentrega;

        return $this;
    }

    public function getCantidad(): ?float
    {
        return $this->cantidad;
    }

    public function setCantidad(float $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getComentraio(): ?string
    {
        return $this->comentraio;
    }

    public function setComentraio(?string $comentraio): self
    {
        $this->comentraio = $comentraio;

        return $this;
    }

    public function getNecesidad(): ?string
    {
        return $this->necesidad;
    }

    public function setNecesidad(?string $necesidad): self
    {
        $this->necesidad = $necesidad;

        return $this;
    }

    public function getSolicitante(): ?string
    {
        return $this->solicitante;
    }

    public function setSolicitante(?string $solicitante): self
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    public function getIdcomprador(): ?string
    {
        return $this->idcomprador;
    }

    public function setIdcomprador(string $idcomprador): self
    {
        $this->idcomprador = $idcomprador;

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

    public function getSolped(): ?Solped
    {
        return $this->solped;
    }

    public function setSolped(?Solped $solped): self
    {
        $this->solped = $solped;

        return $this;
    }

    /**
     * @return Collection|DetallePeticionOferta[]
     */
    public function getDetallepeticionofertas(): Collection
    {
        return $this->detallepeticionofertas;
    }

    public function addDetallepeticionoferta(DetallePeticionOferta $detallepeticionoferta): self
    {
        if (!$this->detallepeticionofertas->contains($detallepeticionoferta)) {
            $this->detallepeticionofertas[] = $detallepeticionoferta;
            $detallepeticionoferta->setDetalleSolped($this);
        }

        return $this;
    }

    public function removeDetallepeticionoferta(DetallePeticionOferta $detallepeticionoferta): self
    {
        if ($this->detallepeticionofertas->contains($detallepeticionoferta)) {
            $this->detallepeticionofertas->removeElement($detallepeticionoferta);
            // set the owning side to null (unless already changed)
            if ($detallepeticionoferta->getDetalleSolped() === $this) {
                $detallepeticionoferta->setDetalleSolped(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DetallePedido[]
     */
    public function getDetallepedidos(): Collection
    {
        return $this->detallepedidos;
    }

    public function addDetallepedido(DetallePedido $detallepedido): self
    {
        if (!$this->detallepedidos->contains($detallepedido)) {
            $this->detallepedidos[] = $detallepedido;
            $detallepedido->setDetalleSolped($this);
        }

        return $this;
    }

    public function removeDetallepedido(DetallePedido $detallepedido): self
    {
        if ($this->detallepedidos->contains($detallepedido)) {
            $this->detallepedidos->removeElement($detallepedido);
            // set the owning side to null (unless already changed)
            if ($detallepedido->getDetalleSolped() === $this) {
                $detallepedido->setDetalleSolped(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ubicacion[]
     */
    public function getUbicacion(): Collection
    {
        return $this->ubicacion;
    }

    public function addUbicacion(Ubicacion $ubicacion): self
    {
        if (!$this->ubicacion->contains($ubicacion)) {
            $this->ubicacion[] = $ubicacion;
        }

        return $this;
    }

    public function removeUbicacion(Ubicacion $ubicacion): self
    {
        if ($this->ubicacion->contains($ubicacion)) {
            $this->ubicacion->removeElement($ubicacion);
        }

        return $this;
    }


}

