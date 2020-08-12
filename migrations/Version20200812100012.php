<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812100012 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tester (id INT AUTO_INCREMENT NOT NULL, val VARCHAR(34) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employeur ADD num_identification VARCHAR(50) DEFAULT NULL, ADD raison_social VARCHAR(50) DEFAULT NULL, ADD nom_employeur VARCHAR(50) DEFAULT NULL, ADD adresse_employeur VARCHAR(50) DEFAULT NULL, DROP numIdentification, DROP raisonSsocial, DROP nomEmployeur, DROP adresseEemployeur');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tester');
        $this->addSql('ALTER TABLE employeur ADD numIdentification VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD raisonSsocial VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD nomEmployeur VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD adresseEemployeur VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP num_identification, DROP raison_social, DROP nom_employeur, DROP adresse_employeur');
    }
}
