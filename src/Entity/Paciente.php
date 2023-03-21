<?php

namespace App\Entity;

use App\Repository\PacienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PacienteRepository::class)]
class Paciente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\ManyToMany(targetEntity: Tratamiento::class, inversedBy: 'pacientes')]
    private Collection $tratamientos;

    #[ORM\ManyToMany(targetEntity: Diagnostico::class, inversedBy: 'pacientes')]
    private Collection $diagnosticos;

    public function __construct()
    {
        $this->tratamientos = new ArrayCollection();
        $this->diagnosticos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection<int, Tratamiento>
     */
    public function getTratamientos(): Collection
    {
        return $this->tratamientos;
    }

    public function addTratamiento(Tratamiento $tratamiento): self
    {
        if (!$this->tratamientos->contains($tratamiento)) {
            $this->tratamientos->add($tratamiento);
        }

        return $this;
    }

    public function removeTratamiento(Tratamiento $tratamiento): self
    {
        $this->tratamientos->removeElement($tratamiento);

        return $this;
    }

    /**
     * @return Collection<int, Diagnostico>
     */
    public function getDiagnosticos(): Collection
    {
        return $this->diagnosticos;
    }

    public function addDiagnostico(Diagnostico $diagnostico): self
    {
        if (!$this->diagnosticos->contains($diagnostico)) {
            $this->diagnosticos->add($diagnostico);
        }

        return $this;
    }

    public function removeDiagnostico(Diagnostico $diagnostico): self
    {
        $this->diagnosticos->removeElement($diagnostico);

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    
    }
}
