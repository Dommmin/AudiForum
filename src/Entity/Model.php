<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelRepository::class)]
class Model
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Car::class, inversedBy: 'model')]
    private $car;

    #[ORM\ManyToMany(targetEntity: General::class, inversedBy: 'models')]
    private $general;

    #[ORM\ManyToMany(targetEntity: Technical::class, inversedBy: 'models')]
    private $technical;

    #[ORM\ManyToMany(targetEntity: Tuning::class, inversedBy: 'models')]
    private $tuning;

    public function __construct()
    {
        $this->general = new ArrayCollection();
        $this->technical = new ArrayCollection();
        $this->tuning = new ArrayCollection();
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

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    /**
     * @return Collection<int, General>
     */
    public function getGeneral(): Collection
    {
        return $this->general;
    }

    public function addGeneral(General $general): self
    {
        if (!$this->general->contains($general)) {
            $this->general[] = $general;
        }

        return $this;
    }

    public function removeGeneral(General $general): self
    {
        $this->general->removeElement($general);

        return $this;
    }

    /**
     * @return Collection<int, Technical>
     */
    public function getTechnical(): Collection
    {
        return $this->technical;
    }

    public function addTechnical(Technical $technical): self
    {
        if (!$this->technical->contains($technical)) {
            $this->technical[] = $technical;
        }

        return $this;
    }

    public function removeTechnical(Technical $technical): self
    {
        $this->technical->removeElement($technical);

        return $this;
    }

    /**
     * @return Collection<int, Tuning>
     */
    public function getTuning(): Collection
    {
        return $this->tuning;
    }

    public function addTuning(Tuning $tuning): self
    {
        if (!$this->tuning->contains($tuning)) {
            $this->tuning[] = $tuning;
        }

        return $this;
    }

    public function removeTuning(Tuning $tuning): self
    {
        $this->tuning->removeElement($tuning);

        return $this;
    }
}
