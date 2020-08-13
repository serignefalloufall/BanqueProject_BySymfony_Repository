<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812232800 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, typeclient_id INT DEFAULT NULL, employeur_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(60) NOT NULL, adresse VARCHAR(60) NOT NULL, tel VARCHAR(60) DEFAULT NULL, email VARCHAR(60) NOT NULL, profession VARCHAR(60) DEFAULT NULL, salaire NUMERIC(10, 0) DEFAULT NULL, INDEX IDX_C7440455FAD40BBD (typeclient_id), INDEX IDX_C74404555D7C53EC (employeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employeur (id INT AUTO_INCREMENT NOT NULL, numidentification VARCHAR(50) NOT NULL, raisonsocial VARCHAR(50) DEFAULT NULL, nomemployeur VARCHAR(50) DEFAULT NULL, adresseemployeur VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeclient (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typecompte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455FAD40BBD FOREIGN KEY (typeclient_id) REFERENCES typeclient (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404555D7C53EC FOREIGN KEY (employeur_id) REFERENCES employeur (id)');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA998260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526011FA04BC FOREIGN KEY (typecompte_id) REFERENCES typecompte (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526019EB6921');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404555D7C53EC');
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA998260155');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455FAD40BBD');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526011FA04BC');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE employeur');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE typeclient');
        $this->addSql('DROP TABLE typecompte');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260D725330D');
    }
}
