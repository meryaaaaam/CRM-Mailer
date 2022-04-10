<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 */
class Vehicule
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
    private $stock;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vin;

    /**
     * @ORM\ManyToOne(targetEntity=Fabriquant::class)
     */
    private $marque;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $km;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Couleurexterieur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleurinterieur;

    /**
     * @ORM\ManyToOne(targetEntity=Carrosserie::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $carrosserie;

    /**
     * @ORM\ManyToOne(targetEntity=Transmission::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $transmission;

    /**
     * @ORM\ManyToOne(targetEntity=Carburant::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Carburant;

    /**
     * @ORM\ManyToOne(targetEntity=Traction::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $traction;

    /**
     * @ORM\ManyToOne(targetEntity=Cylindres::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $cylindres;

    /**
     * @ORM\ManyToOne(targetEntity=Moteur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $moteur;

    /**
     * @ORM\Column(type="integer")
     
     */
    private $portes;

    /**
     * @ORM\Column(type="integer")
     */
    private $Passagers;

    /**
     * @ORM\Column(type="float")
     */
    private $prixdetail;

    /**
     * @ORM\Column(type="float")
     */
    private $prixwholesale;

 

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Aileronarriere;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $antipatinage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chargeurdc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $climatisationautomatique;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $coussingonflablepouleconducteur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $crochetremorquagearriere;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $detecteurdepluie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Essuieglacesintermittentsavitessevariable;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $inclinaisonelectriquetoitouvrantcoulissant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $miroirschauffants;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ordinateurdebord;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pharesantibrouillard;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $radiosatellite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $servodirection;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $siegesarriereschauffants;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sonardestationnementarriere;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $systemealarme;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tacheometre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vitreselectriques;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $airclimatise;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bluetooth;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $climatisation2zones;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $commandesauvolant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $coussingonflablepourlepassager;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $degivreurarriere;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enjoliveursderoues;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $freinsabc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lecteurdc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $miroirselectriques;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ouverturesducoffreadistance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pharesxenon;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $regulateurdevistesse;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $siegechauffantconducteur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $siegesarrierestraversables;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $siegescuire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sunmoonroof;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $systemedenavigation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tapisdesolavant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vitresteintes;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $amfmsterio;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cameraderecul;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $climatisationarriere;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $controledestabilite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cousinsgonflableslateraux;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $demarragesanscle;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $entreesanscle;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $freinsassistes;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lecteurmp;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $miroirssignaldecourbeintegre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $particulier;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $porteselectriques;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $serruresdesecuritepourenfant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $siegeelectriqueconducteur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $siegesbaquets;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $siegesmemoire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $systemeantivol;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $systemesurveillancepressiondespneus;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $toitouvrant;

    /**
     * @ORM\ManyToOne(targetEntity=Condition::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $conditions;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $disponiblefinance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $financement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $disponiblegarentie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $garentie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carproof;


    /**
     * @ORM\Column(type="date")
     */
    private $datecreation;

    /**
     * @ORM\Column(type="date")
     */
    private $datemodification;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Sigeschauffants;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $volantajustable;

    /**
     
     * @ORM\ManyToOne(targetEntity=Utilisateur::class)
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @ORM\OneToOne(targetEntity=Medias::class, inversedBy="vehicule", cascade={"persist", "remove"})
     * * @ORM\JoinColumn(nullable=false)
     */
    private $media;

    /**
     * @ORM\OneToMany(targetEntity=GalerieVehicule::class, mappedBy="vehicule", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $galerie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numinventaire;

   /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $liquidation;

    /**
     * @ORM\OneToOne(targetEntity=Operations::class, mappedBy="vehicule", cascade={"persist", "remove"})
     */
    private $operations;

  

    

    

  
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getMarque(): ?Fabriquant
    {
        return $this->marque;
    }

    public function setMarque(?Fabriquant $marque): self
    {
        $this->marque = $marque;

        return $this;
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

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->category = $Category;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getKm(): ?string
    {
        return $this->km;
    }

    public function setKm(string $km): self
    {
        $this->km = $km;

        return $this;
    }

    public function getCouleurexterieur(): ?string
    {
        return $this->Couleurexterieur;
    }

    public function setCouleurexterieur(string $Couleurexterieur): self
    {
        $this->Couleurexterieur = $Couleurexterieur;

        return $this;
    }

    public function getCouleurinterieur(): ?string
    {
        return $this->couleurinterieur;
    }

    public function setCouleurinterieur(string $couleurinterieur): self
    {
        $this->couleurinterieur = $couleurinterieur;

        return $this;
    }

    public function getCarrosserie(): ?Carrosserie
    {
        return $this->carrosserie;
    }

    public function setCarrosserie(?Carrosserie $carrosserie): self
    {
        $this->carrosserie = $carrosserie;

        return $this;
    }

    public function getTransmission(): ?Transmission
    {
        return $this->transmission;
    }

    public function setTransmission(?Transmission $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getCarburant(): ?Carburant
    {
        return $this->Carburant;
    }

    public function setCarburant(?Carburant $Carburant): self
    {
        $this->Carburant = $Carburant;

        return $this;
    }

    public function getTraction(): ?Traction
    {
        return $this->traction;
    }

    public function setTraction(?Traction $traction): self
    {
        $this->traction = $traction;

        return $this;
    }

    public function getCylindres(): ?Cylindres
    {
        return $this->cylindres;
    }

    public function setCylindres(?Cylindres $cylindres): self
    {
        $this->cylindres = $cylindres;

        return $this;
    }

    public function getMoteur(): ?Moteur
    {
        return $this->moteur;
    }

    public function setMoteur(?Moteur $moteur): self
    {
        $this->moteur = $moteur;

        return $this;
    }

    public function getPortes(): ?int
    {
        return $this->portes;
    }

    public function setPortes(int $portes): self
    {
        $this->portes = $portes;

        return $this;
    }

    public function getPassagers(): ?int
    {
        return $this->Passagers;
    }

    public function setPassagers(int $Passagers): self
    {
        $this->Passagers = $Passagers;

        return $this;
    }

    public function getPrixdetail(): ?float
    {
        return $this->prixdetail;
    }

    public function setPrixdetail(float $prixdetail): self
    {
        $this->prixdetail = $prixdetail;

        return $this;
    }

    public function getPrixwholesale(): ?float
    {
        return $this->prixwholesale;
    }

    public function setPrixwholesale(float $prixwholesale): self
    {
        $this->prixwholesale = $prixwholesale;

        return $this;
    }

  

    public function getAileronarriere(): ?bool
    {
        return $this->Aileronarriere;
    }

    public function setAileronarriere(?bool $Aileronarriere): self
    {
        $this->Aileronarriere = $Aileronarriere;

        return $this;
    }

    public function getAntipatinage(): ?bool
    {
        return $this->antipatinage;
    }

    public function setAntipatinage(?bool $antipatinage): self
    {
        $this->antipatinage = $antipatinage;

        return $this;
    }

    public function getChargeurdc(): ?bool
    {
        return $this->chargeurdc;
    }

    public function setChargeurdc(?bool $chargeurdc): self
    {
        $this->chargeurdc = $chargeurdc;

        return $this;
    }

    public function getClimatisationautomatique(): ?bool
    {
        return $this->climatisationautomatique;
    }

    public function setClimatisationautomatique(?bool $climatisationautomatique): self
    {
        $this->climatisationautomatique = $climatisationautomatique;

        return $this;
    }

    public function getCoussingonflablepouleconducteur(): ?bool
    {
        return $this->coussingonflablepouleconducteur;
    }

    public function setCoussingonflablepouleconducteur(?bool $coussingonflablepouleconducteur): self
    {
        $this->coussingonflablepouleconducteur = $coussingonflablepouleconducteur;

        return $this;
    }

    public function getCrochetremorquagearriere(): ?bool
    {
        return $this->crochetremorquagearriere;
    }

    public function setCrochetremorquagearriere(?bool $crochetremorquagearriere): self
    {
        $this->crochetremorquagearriere = $crochetremorquagearriere;

        return $this;
    }

    public function getDetecteurdepluie(): ?bool
    {
        return $this->detecteurdepluie;
    }

    public function setDetecteurdepluie(?bool $detecteurdepluie): self
    {
        $this->detecteurdepluie = $detecteurdepluie;

        return $this;
    }

    public function getEssuieglacesintermittentsavitessevariable(): ?bool
    {
        return $this->Essuieglacesintermittentsavitessevariable;
    }

    public function setEssuieglacesintermittentsavitessevariable(?bool $Essuieglacesintermittentsavitessevariable): self
    {
        $this->Essuieglacesintermittentsavitessevariable = $Essuieglacesintermittentsavitessevariable;

        return $this;
    }

    public function getInclinaisonelectriquetoitouvrantcoulissant(): ?bool
    {
        return $this->inclinaisonelectriquetoitouvrantcoulissant;
    }

    public function setInclinaisonelectriquetoitouvrantcoulissant(?bool $inclinaisonelectriquetoitouvrantcoulissant): self
    {
        $this->inclinaisonelectriquetoitouvrantcoulissant = $inclinaisonelectriquetoitouvrantcoulissant;

        return $this;
    }

    public function getMiroirschauffants(): ?bool
    {
        return $this->miroirschauffants;
    }

    public function setMiroirschauffants(?bool $miroirschauffants): self
    {
        $this->miroirschauffants = $miroirschauffants;

        return $this;
    }

    public function getOrdinateurdebord(): ?bool
    {
        return $this->ordinateurdebord;
    }

    public function setOrdinateurdebord(?bool $ordinateurdebord): self
    {
        $this->ordinateurdebord = $ordinateurdebord;

        return $this;
    }

    public function getPharesantibrouillard(): ?bool
    {
        return $this->pharesantibrouillard;
    }

    public function setPharesantibrouillard(?bool $pharesantibrouillard): self
    {
        $this->pharesantibrouillard = $pharesantibrouillard;

        return $this;
    }

    public function getRadiosatellite(): ?bool
    {
        return $this->radiosatellite;
    }

    public function setRadiosatellite(?bool $radiosatellite): self
    {
        $this->radiosatellite = $radiosatellite;

        return $this;
    }

    public function getServodirection(): ?bool
    {
        return $this->servodirection;
    }

    public function setServodirection(?bool $servodirection): self
    {
        $this->servodirection = $servodirection;
        

        return $this;
    }

    public function getSiegesarriereschauffants(): ?bool
    {
        return $this->siegesarriereschauffants;
    }

    public function setSiegesarriereschauffants(?bool $siegesarriereschauffants): self
    {
        $this->siegesarriereschauffants = $siegesarriereschauffants;

        return $this;
    }

    public function getSonardestationnementarriere(): ?bool
    {
        return $this->sonardestationnementarriere;
    }

    public function setSonardestationnementarriere(?bool $sonardestationnementarriere): self
    {
        $this->sonardestationnementarriere = $sonardestationnementarriere;

        return $this;
    }

    public function getSystemealarme(): ?bool
    {
        return $this->systemealarme;
    }

    public function setSystemealarme(?bool $systemealarme): self
    {
        $this->systemealarme = $systemealarme;

        return $this;
    }

    public function getTacheometre(): ?bool
    {
        return $this->tacheometre;
    }

    public function setTacheometre(?bool $tacheometre): self
    {
        $this->tacheometre = $tacheometre;

        return $this;
    }

    public function getVitreselectriques(): ?bool
    {
        return $this->vitreselectriques;
    }

    public function setVitreselectriques(?bool $vitreselectriques): self
    {
        $this->vitreselectriques = $vitreselectriques;

        return $this;
    }

    public function getAirclimatise(): ?bool
    {
        return $this->airclimatise;
    }

    public function setAirclimatise(?bool $airclimatise): self
    {
        $this->airclimatise = $airclimatise;

        return $this;
    }

    public function getBluetooth(): ?bool
    {
        return $this->bluetooth;
    }

    public function setBluetooth(?bool $bluetooth): self
    {
        $this->bluetooth = $bluetooth;

        return $this;
    }

    public function getClimatisation2zones(): ?bool
    {
        return $this->climatisation2zones;
    }

    public function setClimatisation2zones(?bool $climatisation2zones): self
    {
        $this->climatisation2zones = $climatisation2zones;

        return $this;
    }

    public function getCommandesauvolant(): ?bool
    {
        return $this->commandesauvolant;
    }

    public function setCommandesauvolant(?bool $commandesauvolant): self
    {
        $this->commandesauvolant = $commandesauvolant;

        return $this;
    }

    public function getCoussingonflablepourlepassager(): ?bool
    {
        return $this->coussingonflablepourlepassager;
    }

    public function setCoussingonflablepourlepassager(?bool $coussingonflablepourlepassager): self
    {
        $this->coussingonflablepourlepassager = $coussingonflablepourlepassager;

        return $this;
    }

    public function getDegivreurarriere(): ?bool
    {
        return $this->degivreurarriere;
    }

    public function setDegivreurarriere(?bool $degivreurarriere): self
    {
        $this->degivreurarriere = $degivreurarriere;

        return $this;
    }

    public function getEnjoliveursderoues(): ?bool
    {
        return $this->enjoliveursderoues;
    }

    public function setEnjoliveursderoues(?bool $enjoliveursderoues): self
    {
        $this->enjoliveursderoues = $enjoliveursderoues;

        return $this;
    }

    public function getFreinsabc(): ?bool
    {
        return $this->freinsabc;
    }

    public function setFreinsabc(?bool $freinsabc): self
    {
        $this->freinsabc = $freinsabc;

        return $this;
    }

    public function getLecteurdc(): ?bool
    {
        return $this->lecteurdc;
    }

    public function setLecteurdc(?bool $lecteurdc): self
    {
        $this->lecteurdc = $lecteurdc;

        return $this;
    }

    public function getMiroirselectriques(): ?bool
    {
        return $this->miroirselectriques;
    }

    public function setMiroirselectriques(?bool $miroirselectriques): self
    {
        $this->miroirselectriques = $miroirselectriques;

        return $this;
    }

    public function getOuverturesducoffreadistance(): ?bool
    {
        return $this->ouverturesducoffreadistance;
    }

    public function setOuverturesducoffreadistance(?bool $ouverturesducoffreadistance): self
    {
        $this->ouverturesducoffreadistance = $ouverturesducoffreadistance;

        return $this;
    }

    public function getPharesxenon(): ?bool
    {
        return $this->pharesxenon;
    }

    public function setPharesxenon(?bool $pharesxenon): self
    {
        $this->pharesxenon = $pharesxenon;

        return $this;
    }

    public function getRegulateurdevistesse(): ?bool
    {
        return $this->regulateurdevistesse;
    }

    public function setRegulateurdevistesse(?bool $regulateurdevistesse): self
    {
        $this->regulateurdevistesse = $regulateurdevistesse;

        return $this;
    }

    public function getSiegechauffantconducteur(): ?bool
    {
        return $this->siegechauffantconducteur;
    }

    public function setSiegechauffantconducteur(?bool $siegechauffantconducteur): self
    {
        $this->siegechauffantconducteur = $siegechauffantconducteur;

        return $this;
    }

    public function getSiegesarrierestraversables(): ?bool
    {
        return $this->siegesarrierestraversables;
    }

    public function setSiegesarrierestraversables(?bool $siegesarrierestraversables): self
    {
        $this->siegesarrierestraversables = $siegesarrierestraversables;

        return $this;
    }

    public function getSiegescuire(): ?bool
    {
        return $this->siegescuire;
    }

    public function setSiegescuire(?bool $siegescuire): self
    {
        $this->siegescuire = $siegescuire;

        return $this;
    }

    public function getSunmoonroof(): ?bool
    {
        return $this->sunmoonroof;
    }

    public function setSunmoonroof(?bool $sunmoonroof): self
    {
        $this->sunmoonroof = $sunmoonroof;

        return $this;
    }

    public function getSystemedenavigation(): ?bool
    {
        return $this->systemedenavigation;
    }

    public function setSystemedenavigation(?bool $systemedenavigation): self
    {
        $this->systemedenavigation = $systemedenavigation;

        return $this;
    }

    public function getTapisdesolavant(): ?bool
    {
        return $this->tapisdesolavant;
    }

    public function setTapisdesolavant(?bool $tapisdesolavant): self
    {
        $this->tapisdesolavant = $tapisdesolavant;

        return $this;
    }

    public function getVitresteintes(): ?bool
    {
        return $this->vitresteintes;
    }

    public function setVitresteintes(?bool $vitresteintes): self
    {
        $this->vitresteintes = $vitresteintes;

        return $this;
    }

    public function getAmfmsterio(): ?bool
    {
        return $this->amfmsterio;
    }

    public function setAmfmsterio(?bool $amfmsterio): self
    {
        $this->amfmsterio = $amfmsterio;

        return $this;
    }

    public function getCameraderecul(): ?bool
    {
        return $this->cameraderecul;
    }

    public function setCameraderecul(?bool $cameraderecul): self
    {
        $this->cameraderecul = $cameraderecul;

        return $this;
    }

    public function getClimatisationarriere(): ?bool
    {
        return $this->climatisationarriere;
    }

    public function setClimatisationarriere(?bool $climatisationarriere): self
    {
        $this->climatisationarriere = $climatisationarriere;

        return $this;
    }

    public function getControledestabilite(): ?bool
    {
        return $this->controledestabilite;
    }

    public function setControledestabilite(?bool $controledestabilite): self
    {
        $this->controledestabilite = $controledestabilite;

        return $this;
    }

    public function getCousinsgonflableslateraux(): ?bool
    {
        return $this->cousinsgonflableslateraux;
    }

    public function setCousinsgonflableslateraux(?bool $cousinsgonflableslateraux): self
    {
        $this->cousinsgonflableslateraux = $cousinsgonflableslateraux;

        return $this;
    }

    public function getDemarragesanscle(): ?bool
    {
        return $this->demarragesanscle;
    }

    public function setDemarragesanscle(?bool $demarragesanscle): self
    {
        $this->demarragesanscle = $demarragesanscle;

        return $this;
    }

    public function getEntreesanscle(): ?bool
    {
        return $this->entreesanscle;
    }

    public function setEntreesanscle(?bool $entreesanscle): self
    {
        $this->entreesanscle = $entreesanscle;

        return $this;
    }

    public function getFreinsassistes(): ?bool
    {
        return $this->freinsassistes;
    }

    public function setFreinsassistes(?bool $freinsassistes): self
    {
        $this->freinsassistes = $freinsassistes;

        return $this;
    }

    public function getLecteurmp(): ?bool
    {
        return $this->lecteurmp;
    }

    public function setLecteurmp(?bool $lecteurmp): self
    {
        $this->lecteurmp = $lecteurmp;

        return $this;
    }

    public function getMiroirssignaldecourbeintegre(): ?bool
    {
        return $this->miroirssignaldecourbeintegre;
    }

    public function setMiroirssignaldecourbeintegre(?bool $miroirssignaldecourbeintegre): self
    {
        $this->miroirssignaldecourbeintegre = $miroirssignaldecourbeintegre;

        return $this;
    }

    public function getParticulier(): ?bool
    {
        return $this->particulier;
    }

    public function setParticulier(?bool $particulier): self
    {
        $this->particulier = $particulier;

        return $this;
    }

    public function getPorteselectriques(): ?bool
    {
        return $this->porteselectriques;
    }

    public function setPorteselectriques(?bool $porteselectriques): self
    {
        $this->porteselectriques = $porteselectriques;

        return $this;
    }

    public function getSerruresdesecuritepourenfant(): ?bool
    {
        return $this->serruresdesecuritepourenfant;
    }

    public function setSerruresdesecuritepourenfant(?bool $serruresdesecuritepourenfant): self
    {
        $this->serruresdesecuritepourenfant = $serruresdesecuritepourenfant;

        return $this;
    }

    public function getSiegeelectriqueconducteur(): ?bool
    {
        return $this->siegeelectriqueconducteur;
    }

    public function setSiegeelectriqueconducteur(?bool $siegeelectriqueconducteur): self
    {
        $this->siegeelectriqueconducteur = $siegeelectriqueconducteur;

        return $this;
    }

    public function getSiegesbaquets(): ?bool
    {
        return $this->siegesbaquets;
    }

    public function setSiegesbaquets(?bool $siegesbaquets): self
    {
        $this->siegesbaquets = $siegesbaquets;

        return $this;
    }

    public function getSiegesmemoire(): ?bool
    {
        return $this->siegesmemoire;
    }

    public function setSiegesmemoire(?bool $siegesmemoire): self
    {
        $this->siegesmemoire = $siegesmemoire;

        return $this;
    }

    public function getSystemeantivol(): ?bool
    {
        return $this->systemeantivol;
    }

    public function setSystemeantivol(?bool $systemeantivol): self
    {
        $this->systemeantivol = $systemeantivol;

        return $this;
    }

    public function getSystemesurveillancepressiondespneus(): ?bool
    {
        return $this->systemesurveillancepressiondespneus;
    }

    public function setSystemesurveillancepressiondespneus(?bool $systemesurveillancepressiondespneus): self
    {
        $this->systemesurveillancepressiondespneus = $systemesurveillancepressiondespneus;

        return $this;
    }

    public function getToitouvrant(): ?bool
    {
        return $this->toitouvrant;
    }

    public function setToitouvrant(?bool $toitouvrant): self
    {
        $this->toitouvrant = $toitouvrant;

        return $this;
    }

    public function getConditions(): ?Condition
    {
        return $this->conditions;
    }

    public function setConditions(?Condition $conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getDisponiblefinance(): ?bool
    {
        return $this->disponiblefinance;
    }

    public function setDisponiblefinance(?bool $disponiblefinance): self
    {
        $this->disponiblefinance = $disponiblefinance;

        return $this;
    }

    public function getFinancement(): ?string
    {
        return $this->financement;
    }

    public function setFinancement(string $financement): self
    {
        $this->financement = $financement;

        return $this;
    }

    public function getDisponiblegarentie(): ?bool
    {
        return $this->disponiblegarentie;
    }

    public function setDisponiblegarentie(?bool $disponiblegarentie): self
    {
        $this->disponiblegarentie = $disponiblegarentie;

        return $this;
    }

    public function getGarentie(): ?string
    {
        return $this->garentie;
    }

    public function setGarentie(string $garentie): self
    {
        $this->garentie = $garentie;

        return $this;
    }

    public function getCarproof(): ?string
    {
        return $this->carproof;
    }

    public function setcarproof(?string $carproof): self
    {
        $this->carproof = $carproof;

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

    public function getSigeschauffants(): ?bool
    {
        return $this->Sigeschauffants;
    }

    public function setSigeschauffants(?bool $Sigeschauffants): self
    {
        $this->Sigeschauffants = $Sigeschauffants;

        return $this;
    }

    public function getVolantajustable(): ?bool
    {
        return $this->volantajustable;
    }

    public function setVolantajustable(?bool $volantajustable): self
    {
        $this->volantajustable = $volantajustable;

        return $this;
    }
    public function __construct()
    {
        if($this->datecreation == null){
            $this->datecreation = new DateTime('now');
        }
        
        $this->datemodification = new DateTime('now');
        $this->galerie = new ArrayCollection();
       
        
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

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getMedia(): ?Medias
    {
        return $this->media;
    }

    public function setMedia(?Medias $media): self
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return Collection|GalerieVehicule[]
     */
    public function getGalerie(): Collection
    {
        return $this->galerie;
    }

    public function addGalerie(GalerieVehicule $galerie): self
    {
        if (!$this->galerie->contains($galerie)) {
            $this->galerie[] = $galerie;
            $galerie->setVehicule($this);
        }

        return $this;
    }

    public function removeGalerie(GalerieVehicule $galerie): self
    {
        if ($this->galerie->removeElement($galerie)) {
            // set the owning side to null (unless already changed)
            if ($galerie->getVehicule() === $this) {
                $galerie->setVehicule(null);
            }
        }

        return $this;
    }

    public function getNuminventaire(): ?String
    {
        return $this->numinventaire;
    }

    public function setNuminventaire(String $numinventaire): self
    {
        $this->numinventaire = $numinventaire;

        return $this;
    }

    public function getLiquidation(): ?bool
    {
        return $this->liquidation;
    }

    public function setLiquidation(bool $liquidation): self
    {
        $this->liquidation = $liquidation;

        return $this;
    }

    public function getOperations(): ?Operations
    {
        return $this->operations;
    }

    public function setOperations(?Operations $operations): self
    {
        // unset the owning side of the relation if necessary
        if ($operations === null && $this->operations !== null) {
            $this->operations->setVehicule(null);
        }

        // set the owning side of the relation if necessary
        if ($operations !== null && $operations->getVehicule() !== $this) {
            $operations->setVehicule($this);
        }

        $this->operations = $operations;

        return $this;
    }

   

   

   

   


   

    
}
