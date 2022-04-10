<?php

namespace App\Entity;
use App\Validator as AcmeAssert;
use App\Repository\UtilisateurRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

//use Symfony\Component\Validator\Constraints\UniqueEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
//use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
//use AssoConnect\DoctrineValidatorBundle\Validator\Constraints as AssoConnectAssert;



/**

* @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
* @UniqueEntity("nomutilisateur",message="Ce nom d'utilisateur est déjà utilisé") 
*/
 
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @Assert\NotBlank(message="veuillez remplir le nom ")
     */
    private $nom;


     /**
     * @ORM\Column(type="string", length=180)
     * @Assert\Type("string")
     * @Assert\Email(
     * message = "Le Courriel '{{ value }}' n'est pas valide." )
     * @Assert\NotBlank(message="veuillez remplir le courriel")
     */
    private $courriel;
    
     /** 
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     * @Assert\NotBlank(message="veuillez remplir le teléphone")
     */
    private $telephone;
  
     /**
     * @ORM\Column(type="string", length=255 ,unique=true)
     * @Assert\Type("string")
     * @Assert\NotBlank(message="veuillez remplir le Nom d'utilisateur")
     */
     
    private $nomutilisateur;
       /**
     * @ORM\Column(type="datetime")
     */
    private $datecreation;
        /**
     * @ORM\Column(type="datetime")
     */
    private $datemodification;


    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
   

     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity=Administrateur::class, mappedBy="utilisateur", cascade={"persist", "remove"})
     */
    private $administrateur;

    /**
     * @ORM\OneToOne(targetEntity=Partenaire::class, mappedBy="utilisateur", cascade={"persist", "remove"})
     */
    private $partenaire;

    /**
     * @ORM\OneToOne(targetEntity=Agent::class, mappedBy="utilisateur", cascade={"persist", "remove"})
     */
    private $agent;
      /**
     * @ORM\OneToOne(targetEntity=Concessionnairemarchand::class, mappedBy="Utilisateur", cascade={"persist", "remove"})
     */
    private $concessionnairemarchand;

    // /**
    // * @ORM\ManyToOne(targetEntity=Vehicule::class, inversedBy="utilisateur")
    //  */
    // private $vehicule;

    
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
    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    public function setCourriel(string $courriel): self
    {
        $this->courriel = $courriel;

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
    public function getNomutilisateur(): ?string
    {
        return $this->nomutilisateur;
    }

    public function setNomutilisateur(string $nomutilisateur): self
    {
        $this->nomutilisateur = $nomutilisateur;

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
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->nomutilisateur;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password = null): self
    {
        $this->password = $password;

        return $this;
    }

  
    public function getUsername()
    {
        return $this->username;
    }
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    


    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
    public function __construct()
    {
        if($this->datecreation == null)
        {
        $this->datecreation = new DateTime('now');
        }
    
        $this->datemodification = new DateTime('now');
    }

    public function getAdministrateur(): ?Administrateur
    {
        return $this->administrateur;
    }

    public function setAdministrateur(Administrateur $administrateur): self
    {
        // set the owning side of the relation if necessary
        if ($administrateur->getUtilisateur() !== $this) {
            $administrateur->setUtilisateur($this);
        }

        $this->administrateur = $administrateur;

        return $this;
    }


    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(Partenaire $partenaire): self
    {
        // set the owning side of the relation if necessary
        if ($partenaire->getUtilisateur() !== $this) {
            $partenaire->setUtilisateur($this);
        }

        $this->partenaire = $partenaire;

        return $this;
    }


    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    public function setAgent(Agent $agent): self
    {
        // set the owning side of the relation if necessary
        if ($agent->getUtilisateur() !== $this) {
            $agent->setUtilisateur($this);
        }

        $this->agent = $agent;

        return $this;
    }

    public function getConcessionnairemarchand(): ?Concessionnairemarchand
    {
        return $this->concessionnairemarchand;
    }

    public function setConcessionnairemarchand(?Concessionnairemarchand $concessionnairemarchand): self
    {
        // unset the owning side of the relation if necessary
        if ($concessionnairemarchand === null && $this->concessionnairemarchand !== null) {
            $this->concessionnairemarchand->setUtilisateur(null);
        }

        // set the owning side of the relation if necessary
        if ($concessionnairemarchand !== null && $concessionnairemarchand->getUtilisateur() !== $this) {
            $concessionnairemarchand->setUtilisateur($this);
        }

        $this->concessionnairemarchand = $concessionnairemarchand;

        return $this;
    }

    // public function getVehicule(): ?Vehicule
    // {
    //     return $this->vehicule;
    // }

    // public function setVehicule(?Vehicule $vehicule): self
    // {
    //     $this->vehicule = $vehicule;

    //     return $this;
    // }

}
