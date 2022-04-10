<?php

namespace App\Entity;

use App\Repository\FabriquantRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass=FabriquantRepository::class)
 */


class Fabriquant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actifcrm;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actifservice;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actifaccueil;

    /**
     * @ORM\Column(type="string", length=255)
         * @Assert\NotBlank(message="veuillez remplir le lien") 

     */
    private $lien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
          * @Assert\NotBlank(message="veuillez remplir la description") 

     */
    private $description;

    /**
     * @ORM\Column(type="datetime")

     */
    private $datecreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datemodification;


    /**
     * @ORM\ManyToMany(targetEntity=Concessionnairemarchand::class, inversedBy="fabriquants")
      */
    private $concessionnairesmarchand;

    /**
     * @ORM\OneToOne(targetEntity=Medias::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
 
 
     */
    private $media;

    /**
     * @ORM\Column(type="string", length=255)
      * @Assert\NotBlank(message="veuillez remplir le nom ") 

     */
    private $nom;

   
  

   
    

    public function __construct()
    {
        $this->concessionnairesmarchand = new ArrayCollection();

      
    if($this->datecreation == null){
        $this->datecreation = new DateTime('now');
    }
    
    $this->datemodification = new DateTime('now');

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActifcrm(): ?bool
    {
        return $this->actifcrm;
    }

    public function setActifcrm(bool $actifcrm): self
    {
        $this->actifcrm = $actifcrm;

        return $this;
    }

    public function getActifservice(): ?bool
    {
        return $this->actifservice;
    }

    public function setActifservice(bool $actifservice): self
    {
        $this->actifservice = $actifservice;

        return $this;
    }

    public function getActifaccueil(): ?bool
    {
        return $this->actifaccueil;
    }

    public function setActifaccueil(bool $actifaccueil): self
    {
        $this->actifaccueil = $actifaccueil;

        return $this;
    }

  

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getDatemodification(): ?\DateTimeInterface
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
    public function getConcessionnairesmarchand(): Collection
    {
        return $this->concessionnairesmarchand;
    }

    public function addConcessionnairesmarchand(Concessionnairemarchand $concessionnairesmarchand): self
    {
        if (!$this->concessionnairesmarchand->contains($concessionnairesmarchand)) {
            $this->concessionnairesmarchand[] = $concessionnairesmarchand;
        }

        return $this;
    }

    public function removeConcessionnairesmarchand(Concessionnairemarchand $concessionnairesmarchand): self
    {
        $this->concessionnairesmarchand->removeElement($concessionnairesmarchand);

        return $this;
    }

    public function getMedia(): ?Medias
    {
        return $this->media;
    }

    public function setMedia(Medias $media): self
    {
        $this->media = $media;

        return $this;
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

    

   
   
   

    
    

    


    
}
