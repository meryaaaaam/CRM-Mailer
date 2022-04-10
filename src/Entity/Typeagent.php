<?php

namespace App\Entity;

use App\Repository\TypeagentRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=TypeagentRepository::class)
 */
class Typeagent
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
    private $Type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Datecreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Datemodification;

    /**
     * @ORM\OneToMany(targetEntity=Agent::class, mappedBy="typeagent")
     * @Assert\Valid
     */
    private $agents;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
    }

   
  
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->Datecreation;
    }

    public function setDatecreation(\DateTimeInterface $Datecreation): self
    {
        $this->Datecreation = $Datecreation;

        return $this;
    }

    public function getDatemodification(): ?\DateTimeInterface
    {
        return $this->Datemodification;
    }

    public function setDatemodification(\DateTimeInterface $Datemodification): self
    {
        $this->Datemodification = $Datemodification;

        return $this;
    }

    /**
     * @return Collection|Agent[]
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->agents->contains($agent)) {
            $this->agents[] = $agent;
            $agent->setTypeagent($this);
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getTypeagent() === $this) {
                $agent->setTypeagent(null);
            }
        }

        return $this;
    }



    
    
}
