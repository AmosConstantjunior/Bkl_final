<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201015115926 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ateliers (id INT AUTO_INCREMENT NOT NULL, contrat_id INT DEFAULT NULL, client_id INT DEFAULT NULL, nom_atelier VARCHAR(255) NOT NULL, adresse_lieu VARCHAR(255) NOT NULL, num_atelier VARCHAR(255) NOT NULL, certification TINYINT(1) DEFAULT NULL, INDEX IDX_B98805611823061F (contrat_id), INDEX IDX_B988056119EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attestation_cqs (id INT AUTO_INCREMENT NOT NULL, atelier_id INT DEFAULT NULL, note_equip INT NOT NULL, concl_equip VARCHAR(255) NOT NULL, action_equip VARCHAR(255) NOT NULL, note_maint INT NOT NULL, concl_maint VARCHAR(255) NOT NULL, action_maint VARCHAR(255) NOT NULL, note_form VARCHAR(255) NOT NULL, concl_form VARCHAR(255) NOT NULL, action_form VARCHAR(255) NOT NULL, note_process INT NOT NULL, concl_process VARCHAR(255) NOT NULL, action_process VARCHAR(255) NOT NULL, concl_moyen VARCHAR(255) NOT NULL, action_moyen VARCHAR(255) NOT NULL, date DATE NOT NULL, INDEX IDX_950C80C82E2CF35 (atelier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT NOT NULL, nom_client VARCHAR(255) NOT NULL, adresse_lieu VARCHAR(255) NOT NULL, num_client VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, atelier_id INT DEFAULT NULL, client_id INT DEFAULT NULL, poste_id INT DEFAULT NULL, nom_contact VARCHAR(255) NOT NULL, prenom_contact VARCHAR(255) NOT NULL, tel_contact VARCHAR(255) NOT NULL, INDEX IDX_3340157382E2CF35 (atelier_id), INDEX IDX_3340157319EB6921 (client_id), INDEX IDX_33401573A0905086 (poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrats (id INT AUTO_INCREMENT NOT NULL, type_contrat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_maintenance (id INT AUTO_INCREMENT NOT NULL, technicien_id INT DEFAULT NULL, atelier_id INT DEFAULT NULL, date_intervention DATE NOT NULL, commande_ebp VARCHAR(255) DEFAULT NULL, montant_ht DOUBLE PRECISION NOT NULL, montant_consommable DOUBLE PRECISION DEFAULT NULL, station INT NOT NULL, formation INT NOT NULL, maint INT NOT NULL, process INT NOT NULL, valise_cnomo TINYINT(1) NOT NULL, cupro_brasage TINYINT(1) NOT NULL, besoin_formation TINYINT(1) NOT NULL, sondage_mono_face TINYINT(1) NOT NULL, qualite_electrique VARCHAR(255) NOT NULL, date_prochaine DATE NOT NULL, INDEX IDX_CF3C95213457256 (technicien_id), INDEX IDX_CF3C95282E2CF35 (atelier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_maintenance_machine (fiche_maintenance_id INT NOT NULL, machine_id INT NOT NULL, INDEX IDX_793D96AC37F5F043 (fiche_maintenance_id), INDEX IDX_793D96ACF6B75B26 (machine_id), PRIMARY KEY(fiche_maintenance_id, machine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine (id INT AUTO_INCREMENT NOT NULL, modele_id INT DEFAULT NULL, atelier_id INT DEFAULT NULL, num_serie VARCHAR(255) NOT NULL, INDEX IDX_1505DF84AC14B70A (modele_id), INDEX IDX_1505DF8482E2CF35 (atelier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom_marque VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, intituler VARCHAR(255) NOT NULL, INDEX IDX_100285584827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, intituler_poste VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techniciens (id INT NOT NULL, nom_technicien VARCHAR(255) NOT NULL, prenom_technicien VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ateliers ADD CONSTRAINT FK_B98805611823061F FOREIGN KEY (contrat_id) REFERENCES contrats (id)');
        $this->addSql('ALTER TABLE ateliers ADD CONSTRAINT FK_B988056119EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE attestation_cqs ADD CONSTRAINT FK_950C80C82E2CF35 FOREIGN KEY (atelier_id) REFERENCES ateliers (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_3340157382E2CF35 FOREIGN KEY (atelier_id) REFERENCES ateliers (id)');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_3340157319EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_33401573A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE fiche_maintenance ADD CONSTRAINT FK_CF3C95213457256 FOREIGN KEY (technicien_id) REFERENCES techniciens (id)');
        $this->addSql('ALTER TABLE fiche_maintenance ADD CONSTRAINT FK_CF3C95282E2CF35 FOREIGN KEY (atelier_id) REFERENCES ateliers (id)');
        $this->addSql('ALTER TABLE fiche_maintenance_machine ADD CONSTRAINT FK_793D96AC37F5F043 FOREIGN KEY (fiche_maintenance_id) REFERENCES fiche_maintenance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fiche_maintenance_machine ADD CONSTRAINT FK_793D96ACF6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE machine ADD CONSTRAINT FK_1505DF84AC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE machine ADD CONSTRAINT FK_1505DF8482E2CF35 FOREIGN KEY (atelier_id) REFERENCES ateliers (id)');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE techniciens ADD CONSTRAINT FK_64F2EA9CBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD discr VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attestation_cqs DROP FOREIGN KEY FK_950C80C82E2CF35');
        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_3340157382E2CF35');
        $this->addSql('ALTER TABLE fiche_maintenance DROP FOREIGN KEY FK_CF3C95282E2CF35');
        $this->addSql('ALTER TABLE machine DROP FOREIGN KEY FK_1505DF8482E2CF35');
        $this->addSql('ALTER TABLE ateliers DROP FOREIGN KEY FK_B988056119EB6921');
        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_3340157319EB6921');
        $this->addSql('ALTER TABLE ateliers DROP FOREIGN KEY FK_B98805611823061F');
        $this->addSql('ALTER TABLE fiche_maintenance_machine DROP FOREIGN KEY FK_793D96AC37F5F043');
        $this->addSql('ALTER TABLE fiche_maintenance_machine DROP FOREIGN KEY FK_793D96ACF6B75B26');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_100285584827B9B2');
        $this->addSql('ALTER TABLE machine DROP FOREIGN KEY FK_1505DF84AC14B70A');
        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_33401573A0905086');
        $this->addSql('ALTER TABLE fiche_maintenance DROP FOREIGN KEY FK_CF3C95213457256');
        $this->addSql('DROP TABLE ateliers');
        $this->addSql('DROP TABLE attestation_cqs');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE contrats');
        $this->addSql('DROP TABLE fiche_maintenance');
        $this->addSql('DROP TABLE fiche_maintenance_machine');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE techniciens');
        $this->addSql('ALTER TABLE user DROP discr');
    }
}
