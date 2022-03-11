<?php

namespace App\Entity;

use App\Repository\RapportMesureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RapportMesureRepository::class)
 */
class RapportMesure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $x;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $y;

    /**
     * @ORM\ManyToOne(targetEntity=Rapport::class, inversedBy="rapportMesures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rapport;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getX(): ?string
    {
        return $this->x;
    }

    public function setX(string $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?string
    {
        return $this->y;
    }

    public function setY(string $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getRapport(): ?Rapport
    {
        return $this->rapport;
    }

    public function setRapport(?Rapport $rapport): self
    {
        $this->rapport = $rapport;

        return $this;
    }
}
