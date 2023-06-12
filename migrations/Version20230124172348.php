<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230124172348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE meisterschaft_veranstaltung (meisterschaft_id INT NOT NULL, veranstaltung_id INT NOT NULL, INDEX IDX_57255CF4FB5BE5A5 (meisterschaft_id), INDEX IDX_57255CF46F7E218 (veranstaltung_id), PRIMARY KEY(meisterschaft_id, veranstaltung_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starter_knoten (id INT AUTO_INCREMENT NOT NULL, kreuzknoten TINYINT(1) NOT NULL, palstek TINYINT(1) NOT NULL, schotstek TINYINT(1) NOT NULL, webeleinstek TINYINT(1) NOT NULL, punkte_gesamt INT NOT NULL, erledigt TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starter_meisterschaft (id INT AUTO_INCREMENT NOT NULL, meisterschaft_id INT NOT NULL, pilot_id INT NOT NULL, verein_id INT NOT NULL, klasse VARCHAR(255) NOT NULL, punkte_gesamt NUMERIC(7, 3) NOT NULL, platz INT NOT NULL, INDEX IDX_69DD7A0FFB5BE5A5 (meisterschaft_id), INDEX IDX_69DD7A0FCE55439B (pilot_id), INDEX IDX_69DD7A0F8AED6EB (verein_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starter_veranstaltung (id INT AUTO_INCREMENT NOT NULL, veranstaltung_id INT NOT NULL, verein_id INT NOT NULL, knoten_id INT NOT NULL, klasse VARCHAR(255) NOT NULL, startnummer INT NOT NULL, gewicht DOUBLE PRECISION NOT NULL, zusatz_gewicht DOUBLE PRECISION NOT NULL, wertungspunkte NUMERIC(7, 3) NOT NULL, gaststarter TINYINT(1) NOT NULL, platz INT NOT NULL, uim_punkte INT NOT NULL, INDEX IDX_F5BCA8496F7E218 (veranstaltung_id), INDEX IDX_F5BCA8498AED6EB (verein_id), UNIQUE INDEX UNIQ_F5BCA849338AEAA (knoten_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wettkampfrichter_bojen (id INT AUTO_INCREMENT NOT NULL, boje VARCHAR(255) NOT NULL, allowed TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meisterschaft_veranstaltung ADD CONSTRAINT FK_57255CF4FB5BE5A5 FOREIGN KEY (meisterschaft_id) REFERENCES meisterschaft (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meisterschaft_veranstaltung ADD CONSTRAINT FK_57255CF46F7E218 FOREIGN KEY (veranstaltung_id) REFERENCES veranstaltung (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE starter_meisterschaft ADD CONSTRAINT FK_69DD7A0FFB5BE5A5 FOREIGN KEY (meisterschaft_id) REFERENCES meisterschaft (id)');
        $this->addSql('ALTER TABLE starter_meisterschaft ADD CONSTRAINT FK_69DD7A0FCE55439B FOREIGN KEY (pilot_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE starter_meisterschaft ADD CONSTRAINT FK_69DD7A0F8AED6EB FOREIGN KEY (verein_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE starter_veranstaltung ADD CONSTRAINT FK_F5BCA8496F7E218 FOREIGN KEY (veranstaltung_id) REFERENCES veranstaltung (id)');
        $this->addSql('ALTER TABLE starter_veranstaltung ADD CONSTRAINT FK_F5BCA8498AED6EB FOREIGN KEY (verein_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE starter_veranstaltung ADD CONSTRAINT FK_F5BCA849338AEAA FOREIGN KEY (knoten_id) REFERENCES starter_knoten (id)');
        $this->addSql('ALTER TABLE veranstaltung_meisterschaft DROP FOREIGN KEY FK_DB79D62C6F7E218');
        $this->addSql('ALTER TABLE veranstaltung_meisterschaft DROP FOREIGN KEY FK_DB79D62CFB5BE5A5');
        $this->addSql('DROP TABLE veranstaltung_meisterschaft');
        $this->addSql('ALTER TABLE meisterschaft DROP veranstaltungen');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE veranstaltung_meisterschaft (veranstaltung_id INT NOT NULL, meisterschaft_id INT NOT NULL, INDEX IDX_DB79D62C6F7E218 (veranstaltung_id), INDEX IDX_DB79D62CFB5BE5A5 (meisterschaft_id), PRIMARY KEY(veranstaltung_id, meisterschaft_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE veranstaltung_meisterschaft ADD CONSTRAINT FK_DB79D62C6F7E218 FOREIGN KEY (veranstaltung_id) REFERENCES veranstaltung (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE veranstaltung_meisterschaft ADD CONSTRAINT FK_DB79D62CFB5BE5A5 FOREIGN KEY (meisterschaft_id) REFERENCES meisterschaft (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meisterschaft_veranstaltung DROP FOREIGN KEY FK_57255CF4FB5BE5A5');
        $this->addSql('ALTER TABLE meisterschaft_veranstaltung DROP FOREIGN KEY FK_57255CF46F7E218');
        $this->addSql('ALTER TABLE starter_meisterschaft DROP FOREIGN KEY FK_69DD7A0FFB5BE5A5');
        $this->addSql('ALTER TABLE starter_meisterschaft DROP FOREIGN KEY FK_69DD7A0FCE55439B');
        $this->addSql('ALTER TABLE starter_meisterschaft DROP FOREIGN KEY FK_69DD7A0F8AED6EB');
        $this->addSql('ALTER TABLE starter_veranstaltung DROP FOREIGN KEY FK_F5BCA8496F7E218');
        $this->addSql('ALTER TABLE starter_veranstaltung DROP FOREIGN KEY FK_F5BCA8498AED6EB');
        $this->addSql('ALTER TABLE starter_veranstaltung DROP FOREIGN KEY FK_F5BCA849338AEAA');
        $this->addSql('DROP TABLE meisterschaft_veranstaltung');
        $this->addSql('DROP TABLE starter_knoten');
        $this->addSql('DROP TABLE starter_meisterschaft');
        $this->addSql('DROP TABLE starter_veranstaltung');
        $this->addSql('DROP TABLE wettkampfrichter_bojen');
        $this->addSql('ALTER TABLE meisterschaft ADD veranstaltungen INT NOT NULL');
    }
}
