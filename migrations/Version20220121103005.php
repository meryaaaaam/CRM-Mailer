<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121103005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D98DE13AC');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D8740E698');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D3E6422B1');
        $this->addSql('DROP INDEX IDX_292FFF1D3E6422B1 ON vehicule');
        $this->addSql('DROP INDEX IDX_292FFF1D8740E698 ON vehicule');
        $this->addSql('DROP INDEX IDX_292FFF1D98DE13AC ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP concessionnaire_id, DROP partenaire_id, DROP marchand_id, CHANGE media_id media_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule ADD concessionnaire_id INT DEFAULT NULL, ADD partenaire_id INT DEFAULT NULL, ADD marchand_id INT DEFAULT NULL, CHANGE media_id media_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D8740E698 FOREIGN KEY (concessionnaire_id) REFERENCES concessionnaire (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D3E6422B1 FOREIGN KEY (marchand_id) REFERENCES marchand (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D3E6422B1 ON vehicule (marchand_id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D8740E698 ON vehicule (concessionnaire_id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D98DE13AC ON vehicule (partenaire_id)');
    }
}
