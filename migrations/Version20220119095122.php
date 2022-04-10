<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220119095122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carburant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrosserie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `condition` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cylindres (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marchand (id INT AUTO_INCREMENT NOT NULL, concessionnairemarchand_id INT NOT NULL, UNIQUE INDEX UNIQ_9D5311966771C043 (concessionnairemarchand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traction (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, marque_id INT NOT NULL, modele_id INT NOT NULL, category_id INT DEFAULT NULL, status_id INT NOT NULL, carrosserie_id INT NOT NULL, transmission_id INT NOT NULL, carburant_id INT NOT NULL, traction_id INT NOT NULL, cylindres_id INT NOT NULL, moteur_id INT NOT NULL, media_id INT NOT NULL, conditions_id INT NOT NULL, concessionnaire_id INT DEFAULT NULL, partenaire_id INT DEFAULT NULL, stock VARCHAR(255) NOT NULL, vin VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, km VARCHAR(255) NOT NULL, couleurexterieur VARCHAR(255) NOT NULL, couleurinterieur VARCHAR(255) NOT NULL, portes VARCHAR(255) NOT NULL, passagers VARCHAR(255) NOT NULL, prixdetail DOUBLE PRECISION NOT NULL, prixwholesale DOUBLE PRECISION NOT NULL, aileronarriere TINYINT(1) DEFAULT NULL, antipatinage TINYINT(1) DEFAULT NULL, chargeurdc TINYINT(1) DEFAULT NULL, climatisationautomatique TINYINT(1) DEFAULT NULL, coussingonflablepouleconducteur TINYINT(1) DEFAULT NULL, crochetremorquagearriere TINYINT(1) DEFAULT NULL, detecteurdepluie TINYINT(1) DEFAULT NULL, essuieglacesintermittentsavitessevariable TINYINT(1) DEFAULT NULL, inclinaisonelectriquetoitouvrantcoulissant TINYINT(1) DEFAULT NULL, miroirschauffants TINYINT(1) DEFAULT NULL, ordinateurdebord TINYINT(1) DEFAULT NULL, pharesantibrouillard TINYINT(1) DEFAULT NULL, radiosatellite TINYINT(1) DEFAULT NULL, servodirection TINYINT(1) DEFAULT NULL, siegesarriereschauffants TINYINT(1) DEFAULT NULL, sonardestationnementarriere TINYINT(1) DEFAULT NULL, systemealarme TINYINT(1) DEFAULT NULL, tacheometre TINYINT(1) DEFAULT NULL, vitreselectriques TINYINT(1) DEFAULT NULL, airclimatise TINYINT(1) DEFAULT NULL, bluetooth TINYINT(1) DEFAULT NULL, climatisation2zones TINYINT(1) DEFAULT NULL, commandesauvolant TINYINT(1) DEFAULT NULL, coussingonflablepourlepassager TINYINT(1) DEFAULT NULL, degivreurarriere TINYINT(1) DEFAULT NULL, enjoliveursderoues TINYINT(1) DEFAULT NULL, freinsabc TINYINT(1) DEFAULT NULL, lecteurdc TINYINT(1) DEFAULT NULL, miroirselectriques TINYINT(1) DEFAULT NULL, ouverturesducoffreadistance TINYINT(1) DEFAULT NULL, pharesxenon TINYINT(1) DEFAULT NULL, regulateurdevistesse TINYINT(1) DEFAULT NULL, siegechauffantconducteur TINYINT(1) DEFAULT NULL, siegesarrierestraversables TINYINT(1) DEFAULT NULL, siegescuire TINYINT(1) DEFAULT NULL, sunmoonroof TINYINT(1) DEFAULT NULL, systemedenavigation TINYINT(1) DEFAULT NULL, tapisdesolavant TINYINT(1) DEFAULT NULL, vitresteintes TINYINT(1) DEFAULT NULL, amfmsterio TINYINT(1) DEFAULT NULL, cameraderecul TINYINT(1) DEFAULT NULL, climatisationarriere TINYINT(1) DEFAULT NULL, controledestabilite TINYINT(1) DEFAULT NULL, cousinsgonflableslateraux TINYINT(1) DEFAULT NULL, demarragesanscle TINYINT(1) DEFAULT NULL, entreesanscle TINYINT(1) DEFAULT NULL, freinsassistes TINYINT(1) DEFAULT NULL, lecteurmp TINYINT(1) DEFAULT NULL, miroirssignaldecourbeintegre TINYINT(1) DEFAULT NULL, particulier TINYINT(1) DEFAULT NULL, porteselectriques TINYINT(1) DEFAULT NULL, serruresdesecuritepourenfant TINYINT(1) DEFAULT NULL, siegeelectriqueconducteur TINYINT(1) DEFAULT NULL, siegesbaquets TINYINT(1) DEFAULT NULL, siegesmemoire TINYINT(1) DEFAULT NULL, systemeantivol TINYINT(1) DEFAULT NULL, systemesurveillancepressiondespneus TINYINT(1) DEFAULT NULL, toitouvrant TINYINT(1) DEFAULT NULL, disponiblefinance TINYINT(1) DEFAULT NULL, financement VARCHAR(255) NOT NULL, disponiblegarentie TINYINT(1) DEFAULT NULL, garentie VARCHAR(255) NOT NULL, carproof VARCHAR(255) DEFAULT NULL, datecreation DATE NOT NULL, datemodification DATE NOT NULL, sigeschauffants TINYINT(1) DEFAULT NULL, volantajustable TINYINT(1) DEFAULT NULL, INDEX IDX_292FFF1D4827B9B2 (marque_id), INDEX IDX_292FFF1DAC14B70A (modele_id), INDEX IDX_292FFF1D12469DE2 (category_id), INDEX IDX_292FFF1D6BF700BD (status_id), INDEX IDX_292FFF1DC9FED38E (carrosserie_id), INDEX IDX_292FFF1D78D28519 (transmission_id), INDEX IDX_292FFF1D32DAAD24 (carburant_id), INDEX IDX_292FFF1DACFB21A3 (traction_id), INDEX IDX_292FFF1DD7475A38 (cylindres_id), INDEX IDX_292FFF1D6BF4B111 (moteur_id), UNIQUE INDEX UNIQ_292FFF1DEA9FDD75 (media_id), INDEX IDX_292FFF1DC5FBDC0F (conditions_id), INDEX IDX_292FFF1D8740E698 (concessionnaire_id), INDEX IDX_292FFF1D98DE13AC (partenaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE marchand ADD CONSTRAINT FK_9D5311966771C043 FOREIGN KEY (concessionnairemarchand_id) REFERENCES concessionnairemarchand (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D4827B9B2 FOREIGN KEY (marque_id) REFERENCES fabriquant (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DC9FED38E FOREIGN KEY (carrosserie_id) REFERENCES carrosserie (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D78D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D32DAAD24 FOREIGN KEY (carburant_id) REFERENCES carburant (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DACFB21A3 FOREIGN KEY (traction_id) REFERENCES traction (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DD7475A38 FOREIGN KEY (cylindres_id) REFERENCES cylindres (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D6BF4B111 FOREIGN KEY (moteur_id) REFERENCES moteur (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DEA9FDD75 FOREIGN KEY (media_id) REFERENCES medias (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DC5FBDC0F FOREIGN KEY (conditions_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D8740E698 FOREIGN KEY (concessionnaire_id) REFERENCES concessionnaire (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D32DAAD24');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DC9FED38E');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D12469DE2');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DC5FBDC0F');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DD7475A38');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DAC14B70A');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D6BF4B111');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D6BF700BD');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DACFB21A3');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D78D28519');
        $this->addSql('DROP TABLE carburant');
        $this->addSql('DROP TABLE carrosserie');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE `condition`');
        $this->addSql('DROP TABLE cylindres');
        $this->addSql('DROP TABLE marchand');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE moteur');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE traction');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE vehicule');
    }
}
