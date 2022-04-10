<?php

namespace App\Entity;

use App\Repository\MediasRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass=MediasRepository::class)
 */
class Medias
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
     * @ORM\Column(type="string", length=255)
     */
    private $lien;

    /**
     * @ORM\ManyToOne(targetEntity=Typemedia::class, inversedBy="medias")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;


     /**
     * @Assert\Valid()
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\OneToOne(targetEntity=Vehicule::class, mappedBy="media", cascade={"persist", "remove"})
     */
    private $vehicule;

   

   

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

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

    public function getType(): ?Typemedia
    {
        return $this->type;
    }

    public function setType(?Typemedia $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function setImageFile(UploadedFile $media):void
    {
        $this->imageFile = $media;
        

    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        // unset the owning side of the relation if necessary
        if ($vehicule === null && $this->vehicule !== null) {
            $this->vehicule->setMedia(null);
        }

        // set the owning side of the relation if necessary
        if ($vehicule !== null && $vehicule->getMedia() !== $this) {
            $vehicule->setMedia($this);
        }

        $this->vehicule = $vehicule;

        return $this;
    }

    

}
