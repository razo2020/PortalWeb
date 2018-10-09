<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetallePeticionOferta
 *
 * @ORM\Table(name="detalle_peticion_oferta", indexes={@ORM\Index(name="fk_peticion_oferta_has_solped_has_Material_peticion_oferta1_idx", columns={"peticion_oferta_idpeticion_oferta"}), @ORM\Index(name="fk_Detalle_peticion_oferta_detalle_solped1_idx", columns={"detalle_solped_solped_idsolped", "detalle_solped_idposicion"})})
 * @ORM\Entity(repositoryClass="App\Repository\DetallePeticionOfertaRepository")
 */
class DetallePeticionOferta
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
     * @var float
     *
     * @ORM\Column(name="oferta", type="float", precision=10, scale=0, nullable=true)
     */
    private $oferta;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=45, nullable=true)
     */
    private $comentario;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */
    private $estado;

    /**
     * @var \DetalleSolped
     *
     * @ORM\ManyToOne(targetEntity="DetalleSolped", inversedBy="detallepeticionofertas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="detalle_solped_solped_idsolped", referencedColumnName="solped_idsolped"),
     *   @ORM\JoinColumn(name="detalle_solped_idposicion", referencedColumnName="idposicion")
     * })
     */
    private $detalleSolped;

    /**
     * @var \DetallePedido
     *
     * @ORM\OneToMany(targetEntity="App\Entity\DetallePedido", mappedBy="detallePeticionOferta")
     */
    private $detallePedidos;

    /**
     * @var \PeticionOferta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="PeticionOferta", inversedBy="detallespeticionesofertas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="peticion_oferta_idpeticion_oferta", referencedColumnName="idpeticion_oferta")
     * })
     */
    private $peticionOferta;

    public function __construct()
    {
        $this->detallePedidos = new ArrayCollection();
    }

    public function getIdposicion(): ?int
    {
        return $this->idposicion;
    }

    public function getOferta(): ?float
    {
        return $this->oferta;
    }

    public function setOferta(?float $oferta): self
    {
        $this->oferta = $oferta;

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

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getDetalleSolped(): ?DetalleSolped
    {
        return $this->detalleSolped;
    }

    public function setDetalleSolped(?DetalleSolped $detalleSolped): self
    {
        $this->detalleSolped = $detalleSolped;

        return $this;
    }

    public function getPeticionOferta(): ?PeticionOferta
    {
        return $this->peticionOferta;
    }

    public function setPeticionOferta(?PeticionOferta $peticionOferta): self
    {
        $this->peticionOferta = $peticionOferta;

        return $this;
    }

    /**
     * @return Collection|DetallePedido[]
     */
    public function getDetallePedidos(): Collection
    {
        return $this->detallePedidos;
    }

    public function addDetallePedido(DetallePedido $detallePedido): self
    {
        if (!$this->detallePedidos->contains($detallePedido)) {
            $this->detallePedidos[] = $detallePedido;
            $detallePedido->setDetallePeticionOferta($this);
        }

        return $this;
    }

    public function removeDetallePedido(DetallePedido $detallePedido): self
    {
        if ($this->detallePedidos->contains($detallePedido)) {
            $this->detallePedidos->removeElement($detallePedido);
            // set the owning side to null (unless already changed)
            if ($detallePedido->getDetallePeticionOferta() === $this) {
                $detallePedido->setDetallePeticionOferta(null);
            }
        }

        return $this;
    }


}

