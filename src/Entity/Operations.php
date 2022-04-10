<?php

namespace App\Entity;

use App\Repository\OperationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationsRepository::class)
 */
class Operations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numserie;

    /**
     * @ORM\ManyToOne(targetEntity=Leads::class, inversedBy="operations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lead;

    /**
     * @ORM\OneToOne(targetEntity=Vehicule::class, inversedBy="operations", cascade={"persist", "remove"})
     */
    private $vehicule;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecreationtable;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetimemodificationtable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumserie(): ?string
    {
        return $this->numserie;
    }

    public function setNumserie(string $numserie): self
    {
        $this->numserie = $numserie;

        return $this;
    }

    public function getLead(): ?Leads
    {
        return $this->lead;
    }

    public function setLead(?Leads $lead): self
    {
        $this->lead = $lead;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getDatecreationtable(): ?\DateTimeInterface
    {
        return $this->datecreationtable;
    }

    public function setDatecreationtable(\DateTimeInterface $datecreationtable): self
    {
        $this->datecreationtable = $datecreationtable;

        return $this;
    }

    public function getDatetimemodificationtable(): ?\DateTimeInterface
    {
        return $this->datetimemodificationtable;
    }

    public function setDatetimemodificationtable(\DateTimeInterface $datetimemodificationtable): self
    {
        $this->datetimemodificationtable = $datetimemodificationtable;

        return $this;
    }
}
