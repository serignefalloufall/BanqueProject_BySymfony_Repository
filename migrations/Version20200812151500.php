<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812151500 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employeur (id INT AUTO_INCREMENT NOT NULL, num_identification VARCHAR(50) DEFAULT NULL, raison_social VARCHAR(50) DEFAULT NULL, nom_employeur VARCHAR(50) DEFAULT NULL, adresse_employeur VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD employeur_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455E9CDF29 FOREIGN KEY (employeur_id_id) REFERENCES employeur (id)');
        $this->addSql('CREATE INDEX IDX_C7440455E9CDF29 ON client (employeur_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455E9CDF29');
        $this->addSql('DROP TABLE employeur');
        $this->addSql('DROP INDEX IDX_C7440455E9CDF29 ON client');
        $this->addSql('ALTER TABLE client DROP employeur_id_id');
    }
}