<?php

namespace App\Entity;

use App\Repository\EmailsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmailsRepository::class)
 */
class Emails
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
    private $sendTo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subject;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text;

    /**
     * @ORM\ManyToMany(targetEntity=leads::class, inversedBy="emails")
     */
    private $lead;

    public function __construct()
    {
        $this->lead = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSendTo(): ?string
    {
        return $this->sendTo;
    }

    public function setSendTo(string $sendTo): self
    {
        $this->sendTo = $sendTo;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|leads[]
     */
    public function getLead(): Collection
    {
        return $this->lead;
    }

    public function addLead(leads $lead): self
    {
        if (!$this->lead->contains($lead)) {
            $this->lead[] = $lead;
        }

        return $this;
    }

    public function removeLead(leads $lead): self
    {
        $this->lead->removeElement($lead);

        return $this;
    }
}
