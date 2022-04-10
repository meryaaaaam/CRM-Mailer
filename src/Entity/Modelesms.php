<?php

namespace App\Entity;

use App\Repository\ModelesmsRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelesmsRepository::class)
 */
class Modelesms
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sujetsms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datecreationtable;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datemodificationtable;


    public function __construct()
    {
       

            if($this->datecreationtable == null)
            {
            $this->datecreationtable = new DateTime('now');
            }
        
            $this->datemodificationtable = new DateTime('now');
   
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSujetsms(): ?string
    {
        return $this->sujetsms;
    }

    public function setSujetsms(string $sujetsms): self
    {
        $this->sujetsms = $sujetsms;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;

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

    public function getDatemodificationtable(): ?\DateTimeInterface
    {
        return $this->datemodificationtable;
    }

    public function setDatemodificationtable(\DateTimeInterface $datemodificationtable): self
    {
        $this->datemodificationtable = $datemodificationtable;

        return $this;
    }
}
