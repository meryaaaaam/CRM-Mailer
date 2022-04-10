<?php

namespace App\Entity;

use App\Repository\MarchandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
 

/**
 * @ORM\Entity(repositoryClass=MarchandRepository::class)
 */
class Marchand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Concessionnairemarchand::class, inversedBy="marchand", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     

     
     */
    private $Concessionnairemarchand;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="marchand")
     */
    private $vehicules;

    /**
     * @ORM\OneToMany(targetEntity=Leads::class, mappedBy="marchand")
     */
    private $leads;




    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
        $this->leads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConcessionnairemarchand(): ?Concessionnairemarchand
    {
        return $this->Concessionnairemarchand;
    }

    public function setConcessionnairemarchand(Concessionnairemarchand $Concessionnairemarchand): self
    {
        $this->Concessionnairemarchand = $Concessionnairemarchand;

        return $this;
    }

    /**
     * @return Collection|Leads[]
     */
    public function getLeads(): Collection
    {
        return $this->leads;
    }

    public function addLead(Leads $lead): self
    {
        if (!$this->leads->contains($lead)) {
            $this->leads[] = $lead;
            $lead->setMarchand($this);
        }

        return $this;
    }

    public function removeLead(Leads $lead): self
    {
        if ($this->leads->removeElement($lead)) {
            // set the owning side to null (unless already changed)
            if ($lead->getMarchand() === $this) {
                $lead->setMarchand(null);
            }
        }

        return $this;
    }


   
  
}
