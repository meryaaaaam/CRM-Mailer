<?php

namespace App\Entity;

use App\Repository\LeadsRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LeadsRepository::class)
 */
class Leads
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $courriel;

    /**
     * @ORM\Column(type="date")
     */
    private $datecreation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commantaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numserie;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $budgetmonsuelle;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statutprofessionnel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $revenumensuel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $depuisquand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomcompagnie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $occupationposte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adressedomicile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locationproprietaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $paiementmonsuel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datecreationtable;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datemodificationtable;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $rappel;

 
    /**
     * @ORM\ManyToOne(targetEntity=Statusleads::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $statusleads;

    /**
     * @ORM\ManyToOne(targetEntity=SourcesLeads::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $sourcesleads;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annee;

    /**
     * @ORM\OneToMany(targetEntity=Operations::class, mappedBy="lead", orphanRemoval=true)
     */
    private $operations;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $type;




    /**
     * @ORM\ManyToOne(targetEntity=Administrateur::class, inversedBy="leads")
     * @ORM\JoinColumn(referencedColumnName="id",nullable=true,onDelete="SET NULL")
     */
    private $administrateur;

    /**
     * @ORM\ManyToOne(targetEntity=Agent::class, inversedBy="leads")
     * @ORM\JoinColumn(referencedColumnName="id",nullable=true,onDelete="SET NULL")

 
     */
    private $agent;

    /**
     * @ORM\ManyToOne(targetEntity=Partenaire::class, inversedBy="leads")
     * @ORM\JoinColumn(referencedColumnName="id" ,nullable=true ,onDelete="SET NULL")
     
     */
    private $partenaire;

    /**
     * @ORM\ManyToOne(targetEntity=Concessionnaire::class, inversedBy="leads")
      * @ORM\JoinColumn(referencedColumnName="id" ,nullable=true,onDelete="SET NULL")
     */
    private $concessionnaire;

    /**
     * @ORM\ManyToOne(targetEntity=Marchand::class, inversedBy="leads")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true,onDelete="SET NULL")
     */
    private $marchand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statusvehicule;

    /**
     * @ORM\ManyToOne(targetEntity=Vendeurr::class, inversedBy="leads")
     * * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     */
    private $vendeurr;

    
    /**
      * @ORM\OneToMany(targetEntity=Notes::class, mappedBy="lead")
     */
    private $note;

    /**
     * @ORM\OneToMany(targetEntity=FilesLead::class, mappedBy="lead")
     */
    private $filesLeads;

 

    /**
     * @ORM\ManyToMany(targetEntity=Emails::class, mappedBy="lead")
     */
    private $emails;



  
    



    public function __construct()
  
    {
       

        if($this->datecreation == null){
            $this->datecreation = new DateTime('now');
        }
        
        $this->datemodification = new DateTime('now');
        $this->note = new ArrayCollection();
        $this->filesLeads = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->email = new ArrayCollection();
  
    
    }

    public function getId(): ?int
    {
        return $this->id ;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    public function setCourriel(string $courriel): self
    {
        $this->courriel = $courriel;

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

    public function getCommantaire(): ?string
    {
        return $this->commantaire;
    }

    public function setCommantaire(?string $commantaire): self
    {
        $this->commantaire = $commantaire;

        return $this;
    }

    public function getNumserie(): ?string
    {
        return $this->numserie;
    }

    public function setNumserie(?string $numserie): self
    {
        $this->numserie = $numserie;

        return $this;
    }

    public function getBudgetmonsuelle(): ?float
    {
        return $this->budgetmonsuelle;
    }

    public function setBudgetmonsuelle(?float $budgetmonsuelle): self
    {
        $this->budgetmonsuelle = $budgetmonsuelle;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getStatutprofessionnel(): ?string
    {
        return $this->statutprofessionnel;
    }

    public function setStatutprofessionnel(?string $statutprofessionnel): self
    {
        $this->statutprofessionnel = $statutprofessionnel;

        return $this;
    }

    public function getRevenumensuel(): ?float
    {
        return $this->revenumensuel;
    }

    public function setRevenumensuel(?float $revenumensuel): self
    {
        $this->revenumensuel = $revenumensuel;

        return $this;
    }

    public function getDepuisquand(): ?\DateTimeInterface
    {
        return $this->depuisquand;
    }

    public function setDepuisquand(?\DateTimeInterface $depuisquand): self
    {
        $this->depuisquand = $depuisquand;

        return $this;
    }

    public function getNomcompagnie(): ?string
    {
        return $this->nomcompagnie;
    }

    public function setNomcompagnie(?string $nomcompagnie): self
    {
        $this->nomcompagnie = $nomcompagnie;

        return $this;
    }

    public function getOccupationposte(): ?string
    {
        return $this->occupationposte;
    }

    public function setOccupationposte(?string $occupationposte): self
    {
        $this->occupationposte = $occupationposte;

        return $this;
    }

    public function getAdressedomicile(): ?string
    {
        return $this->adressedomicile;
    }

    public function setAdressedomicile(?string $adressedomicile): self
    {
        $this->adressedomicile = $adressedomicile;

        return $this;
    }

    public function getLocationproprietaire(): ?string
    {
        return $this->locationproprietaire;
    }

    public function setLocationproprietaire(?string $locationproprietaire): self
    {
        $this->locationproprietaire = $locationproprietaire;

        return $this;
    }

    public function getPaiementmonsuel(): ?float
    {
        return $this->paiementmonsuel;
    }

    public function setPaiementmonsuel(?float $paiementmonsuel): self
    {
        $this->paiementmonsuel = $paiementmonsuel;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDatecreationtable(): ?\DateTimeInterface
    {
        return $this->datecreationtable;
    }

    public function setDatecreationtable(?\DateTimeInterface $datecreationtable): self
    {
        $this->datecreationtable = $datecreationtable;

        return $this;
    }

    public function getDatemodificationtable(): ?\DateTimeInterface
    {
        return $this->datemodificationtable;
    }

    public function setDatemodificationtable(?\DateTimeInterface $datemodificationtable): self
    {
        $this->datemodificationtable = $datemodificationtable;

        return $this;
    }

    public function getRappel(): ?\DateTimeInterface
    {
        return $this->rappel;
    }

    public function setRappel(?\DateTimeInterface $rappel): self
    {
        $this->rappel = $rappel;

        return $this;
    }

   

   

    public function getStatusleads(): ?Statusleads
    {
        return $this->statusleads;
    }

    public function setStatusleads(?Statusleads $statusleads): self
    {
        $this->statusleads = $statusleads;

        return $this;
    }

    public function getSourcesleads(): ?SourcesLeads
    {
        return $this->sourcesleads;
    }

    public function setSourcesleads(?SourcesLeads $sourcesleads): self
    {
        $this->sourcesleads = $sourcesleads;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(?string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

   


    public function getType(): ?bool
    {
        return $this->type;
    }

    public function setType(?bool $type): self
    {
        $this->type = $type;

        return $this;
    }

   

    
    public function getAdministrateur(): ?Administrateur
    {
        return $this->administrateur;
    }

    public function setAdministrateur(?Administrateur $administrateur): self
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    public function setAgent(?Agent $agent = null): self
    {

        $this->agent = $agent;

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaire $partenaire =null): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    public function getConcessionnaire(): ?Concessionnaire
    {
        return $this->concessionnaire;
    }

    public function setConcessionnaire(?Concessionnaire $concessionnaire = null): self
    {
        $this->concessionnaire = $concessionnaire;

        return $this;
    }

    public function getMarchand(): ?Marchand
    {
        return $this->marchand;
    }

    public function setMarchand(?Marchand $marchand = null): self
    {
        $this->marchand = $marchand;

        return $this;
    }

    public function getStatusvehicule(): ?string
    {
        return $this->statusvehicule;
    }

    public function setStatusvehicule(string $statusvehicule): self
    {
        $this->statusvehicule = $statusvehicule;

        return $this;
    }

    public function getVendeurr(): ?Vendeurr
    {
        return $this->vendeurr;
    }

    public function setVendeurr(?Vendeurr $vendeurr = null): self
    {
        $this->vendeurr = $vendeurr;

        return $this;
    }

    /**
     * @return Collection|Notes[]
     */
    public function getNote(): Collection
    {
        return $this->note;
    }

    public function addNote(Notes $note): self
    {
        if (!$this->note->contains($note)) {
            $this->note[] = $note;
            $note->setLead($this);
        }

        return $this;
    }

    public function removeNote(Notes $note): self
    {
        if ($this->note->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getLead() === $this) {
                $note->setLead(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FilesLead[]
     */
    public function getFilesLeads(): Collection
    {
        return $this->filesLeads;
    }

    public function addFilesLead(FilesLead $filesLead): self
    {
        if (!$this->filesLeads->contains($filesLead)) {
            $this->filesLeads[] = $filesLead;
            $filesLead->setLead($this);
        }

        return $this;
    }

    public function removeFilesLead(FilesLead $filesLead): self
    {
        if ($this->filesLeads->removeElement($filesLead)) {
            // set the owning side to null (unless already changed)
            if ($filesLead->getLead() === $this) {
                $filesLead->setLead(null);
            }
        }

        return $this;
    }

     

 
    /**
     * @return Collection|Emails[]
     */
    public function getEmailss(): Collection
    {
        return $this->emailss;
    }

    public function addEmailss(Emails $emailss): self
    {
        if (!$this->emailss->contains($emailss)) {
            $this->emailss[] = $emailss;
            $emailss->addLead($this);
        }

        return $this;
    }

    public function removeEmailss(Emails $emailss): self
    {
        if ($this->emailss->removeElement($emailss)) {
            $emailss->removeLead($this);
        }

        return $this;
    }

   

   
 

}
