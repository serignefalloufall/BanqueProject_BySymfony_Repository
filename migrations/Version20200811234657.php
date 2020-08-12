<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200811234657 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, region_id_id INT NOT NULL, nom VARCHAR(50) NOT NULL, INDEX IDX_64C19AA9C7209D4F (region_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, type_client_id_id INT DEFAULT NULL, employeur_id_id INT DEFAULT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, adresse VARCHAR(100) DEFAULT NULL, tel VARCHAR(50) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, profession VARCHAR(50) DEFAULT NULL, salaire NUMERIC(9, 0) NOT NULL, INDEX IDX_C74404555B6AB8E5 (type_client_id_id), INDEX IDX_C7440455E9CDF29 (employeur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, client_id_id INT DEFAULT NULL, type_compte_id_id INT DEFAULT NULL, agence_id_id INT DEFAULT NULL, num_compte VARCHAR(50) NOT NULL, cle_rip VARCHAR(50) NOT NULL, frais_ouverture NUMERIC(9, 0) DEFAULT NULL, agio NUMERIC(9, 0) DEFAULT NULL, date_ouverture VARCHAR(50) NOT NULL, date_fermuture VARCHAR(50) DEFAULT NULL, INDEX IDX_CFF65260DC2902E0 (client_id_id), INDEX IDX_CFF652601E6C339 (type_compte_id_id), INDEX IDX_CFF65260D1F6E7C3 (agence_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employeur (id INT AUTO_INCREMENT NOT NULL, num_identification VARCHAR(50) DEFAULT NULL, raison_social VARCHAR(50) DEFAULT NULL, nom_employeur VARCHAR(50) DEFAULT NULL, adresse_employeur VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeclient (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typecompte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9C7209D4F FOREIGN KEY (region_id_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404555B6AB8E5 FOREIGN KEY (type_client_id_id) REFERENCES typeclient (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455E9CDF29 FOREIGN KEY (employeur_id_id) REFERENCES employeur (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF652601E6C339 FOREIGN KEY (type_compte_id_id) REFERENCES typecompte (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260D1F6E7C3 FOREIGN KEY (agence_id_id) REFERENCES agence (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260D1F6E7C3');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260DC2902E0');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455E9CDF29');
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9C7209D4F');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404555B6AB8E5');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF652601E6C339');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE employeur');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE typeclient');
        $this->addSql('DROP TABLE typecompte');
    }
}
