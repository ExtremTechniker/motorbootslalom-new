<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230107204002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person ADD vorname VARCHAR(255) NOT NULL, ADD nachname VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD geburtstag DATE DEFAULT NULL, ADD geschlecht VARCHAR(1) NOT NULL, ADD telefon VARCHAR(255) DEFAULT NULL, ADD telefon_mobil VARCHAR(255) DEFAULT NULL, ADD strasse VARCHAR(255) DEFAULT NULL, ADD hausnummer INT DEFAULT NULL, ADD plz VARCHAR(255) DEFAULT NULL, ADD ort VARCHAR(255) DEFAULT NULL, ADD pilot TINYINT(1) NOT NULL, ADD mbs_lizenz VARCHAR(255) NOT NULL, ADD ms11_lizenz VARCHAR(255) NOT NULL, ADD renn_lizenz VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person DROP vorname, DROP nachname, DROP email, DROP geburtstag, DROP geschlecht, DROP telefon, DROP telefon_mobil, DROP strasse, DROP hausnummer, DROP plz, DROP ort, DROP pilot, DROP mbs_lizenz, DROP ms11_lizenz, DROP renn_lizenz');
    }
}
