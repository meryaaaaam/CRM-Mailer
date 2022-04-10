<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220119104354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule ADD vendeurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D6B274DD0 FOREIGN KEY (vendeurs_id) REFERENCES agent (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D6B274DD0 ON vehicule (vendeurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D6B274DD0');
        $this->addSql('DROP INDEX IDX_292FFF1D6B274DD0 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP vendeurs_id');
    }
}
