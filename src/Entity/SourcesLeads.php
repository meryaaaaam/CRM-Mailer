<?php

namespace App\Entity;

use App\Repository\SourcesLeadsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SourcesLeadsRepository::class)
 */
class SourcesLeads
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
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecreationtable;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datemodificationtable;

    public function getId(): ?int
    {
        return $this->id;
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
