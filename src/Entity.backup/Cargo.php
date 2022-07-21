<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="cargo", uniqueConstraints={@ORM\UniqueConstraint(name="CargoNombre_UNIQUE", columns={"nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\CargoRepository")
 */
class Cargo
{
    /**
     * @var string
     *
     * @ORM\Column(name="idCargo", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcargo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var \Usuario
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Usuario", mappedBy="cargo")
     */
    private $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
    }

    public function getIdcargo(): ?string
    {
        return $this->idcargo;
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

    /**
     * @return Collection|Usuario[]
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(Usuario $usuario): self
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios[] = $usuario;
            $usuario->setCargo($this);
        }

        return $this;
    }

    public function removeUsuario(Usuario $usuario): self
    {
        if ($this->usuarios->contains($usuario)) {
            $this->usuarios->removeElement($usuario);
            // set the owning side to null (unless already changed)
            if ($usuario->getCargo() === $this) {
                $usuario->setCargo(null);
            }
        }

        return $this;
    }


}

