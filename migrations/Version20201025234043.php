<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201025234043 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche_maintenance ADD contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fiche_maintenance ADD CONSTRAINT FK_CF3C952E7A1254A FOREIGN KEY (contact_id) REFERENCES contacts (id)');
        $this->addSql('CREATE INDEX IDX_CF3C952E7A1254A ON fiche_maintenance (contact_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche_maintenance DROP FOREIGN KEY FK_CF3C952E7A1254A');
        $this->addSql('DROP INDEX IDX_CF3C952E7A1254A ON fiche_maintenance');
        $this->addSql('ALTER TABLE fiche_maintenance DROP contact_id');
    }
}
