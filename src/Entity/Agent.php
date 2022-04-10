<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 */
class Agent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean" , nullable=true)
     */
    private $actif;

    /**
     * @ORM\Column(type="boolean" , nullable=true)
     */
    private $authenvoiemail;

    /**
     * @ORM\Column(type="boolean" , nullable=true )
     */
    private $authenvoisms;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datemodification;

  
    /**
     * @ORM\ManyToMany(targetEntity=Concessionnairemarchand::class, mappedBy="agents")
     * @Assert\Valid()
     */
    private $concessionnairemarchands;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid()

     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Typeagent::class, inversedBy="agents")
     * @ORM\JoinColumn(nullable=false)
    
     
     */
    
    private $typeagent;

    /**
     * @ORM\ManyToMany(targetEntity=Partenaire::class, mappedBy="agents")
     * @Assert\Valid()
     */
    private $partenaire;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="agent")
     */
    private $vehicules;

    /**
     * @ORM\OneToMany(targetEntity=Leads::class, mappedBy="agent")

     */
    private $leads;



 

    public function __construct()
    {
        $this->concessionnairemarchands = new ArrayCollection();

        if($this->datecreation == null){
            $this->datecreation = new DateTime('now');
        }
        
        $this->datemodification = new DateTime('now');
        $this->partenaire = new ArrayCollection();
        $this->vehicules = new ArrayCollection();
        $this->leads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getAuthenvoiemail(): ?bool
    {
        return $this->authenvoiemail;
    }

    public function setAuthenvoiemail(bool $authenvoiemail): self
    {
        $this->authenvoiemail = $authenvoiemail;

        return $this;
    }

    public function getAuthenvoisms(): ?bool
    {
        return $this->authenvoisms;
    }

    public function setAuthenvoisms(bool $authenvoisms): self
    {
        $this->authenvoisms = $authenvoisms;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getdatemodification(): ?\DateTimeInterface
    {
        return $this->datemodification;
    }

    public function setDatemodification(\DateTimeInterface $datemodification): self
    {
        $this->datemodification = $datemodification;

        return $this;
    }

  

    /**
     * @return Collection|Concessionnairemarchand[]
     */
    public function getConcessionnairemarchands(): Collection
    {
        return $this->concessionnairemarchands;
    }

    public function addConcessionnairemarchand(Concessionnairemarchand $concessionnairemarchand): self
    {
        if (!$this->concessionnairemarchands->contains($concessionnairemarchand)) {
            $this->concessionnairemarchands[] = $concessionnairemarchand;
            $concessionnairemarchand->addAgent($this);
        }

        return $this;
    }

    public function removeConcessionnairemarchand(Concessionnairemarchand $concessionnairemarchand): self
    {
        if ($this->concessionnairemarchands->removeElement($concessionnairemarchand)) {
            $concessionnairemarchand->removeAgent($this);
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getTypeagent(): ?Typeagent
    {
        return $this->typeagent;
    }

    public function setTypeagent(?Typeagent $typeagent): self
    {
        $this->typeagent = $typeagent;

        return $this;
    }

    /**
     * @return Collection|Partenaire[]
     */
    public function getPartenaire(): Collection
    {
        return $this->partenaire;
    }

    public function addPartenaire(Partenaire $partenaire): self
    {
        if (!$this->partenaire->contains($partenaire)) {
            $this->partenaire[] = $partenaire;
            $partenaire->addAgent($this);
        }

        return $this;
    }

    public function removePartenaire(Partenaire $partenaire): self
    {
        if ($this->partenaire->removeElement($partenaire)) {
            $partenaire->removeAgent($this);
        }

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
            $lead->setAgent($this);
        }

        return $this;
    }

    public function removeLead(Leads $lead): self
    {
        if ($this->leads->removeElement($lead)) {
            // set the owning side to null (unless already changed)
            if ($lead->getAgent() === $this) {
                $lead->setAgent(null);
            }
        }

        return $this;
    }


   




}
