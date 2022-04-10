<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220119113202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D709770DC');
        $this->addSql('DROP INDEX IDX_292FFF1D709770DC ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP agents_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule ADD agents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D709770DC FOREIGN KEY (agents_id) REFERENCES agent (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D709770DC ON vehicule (agents_id)');
    }
}
