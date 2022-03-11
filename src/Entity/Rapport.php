<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RapportRepository;
use App\Entity\Traits\TimestampableTrait;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=RapportRepository::class)
 */
class Rapport
{
    use TimestampableTrait;
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rapports")
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=RapportMesure::class, mappedBy="rapport", orphanRemoval=true)
     */
    private $rapportMesures;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $excel;

    public function __construct()
    {
        $this->rapportMesures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $Type): self
    {
        $this->type = $Type;

        return $this;
    }

    /**
     * @return Collection|RapportMesure[]
     */
    public function getRapportMesures(): Collection
    {
        return $this->rapportMesures;
    }

    public function addRapportMesure(RapportMesure $rapportMesure): self
    {
        if (!$this->rapportMesures->contains($rapportMesure)) {
            $this->rapportMesures[] = $rapportMesure;
            $rapportMesure->setRapport($this);
        }

        return $this;
    }

    public function removeRapportMesure(RapportMesure $rapportMesure): self
    {
        if ($this->rapportMesures->removeElement($rapportMesure)) {
            // set the owning side to null (unless already changed)
            if ($rapportMesure->getRapport() === $this) {
                $rapportMesure->setRapport(null);
            }
        }

        return $this;
    }

    public function getExcel(): ?string
    {
        return $this->excel;
    }

    public function setExcel(?string $excel): self
    {
        $this->excel = $excel;

        return $this;
    }
}
