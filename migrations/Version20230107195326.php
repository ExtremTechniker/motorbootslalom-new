<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230107195326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ebene (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, kurz VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE institution (id INT AUTO_INCREMENT NOT NULL, land_id INT DEFAULT NULL, staat_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, kurzform VARCHAR(10) NOT NULL, ort VARCHAR(255) DEFAULT NULL, INDEX IDX_3A9F98E51994904A (land_id), INDEX IDX_3A9F98E5457D14C9 (staat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laeufe (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meisterschaft (id INT AUTO_INCREMENT NOT NULL, veranstalter_id INT NOT NULL, ebene_id INT NOT NULL, bezeichnung VARCHAR(255) NOT NULL, kurzform VARCHAR(10) DEFAULT NULL, jahr INT NOT NULL, veranstaltungen INT NOT NULL, streichresultate INT NOT NULL, qualifikation_noetig TINYINT(1) DEFAULT NULL, offen TINYINT(1) DEFAULT NULL, header_title VARCHAR(255) DEFAULT NULL, header_untertitel VARCHAR(255) DEFAULT NULL, header_logo_src VARCHAR(255) DEFAULT NULL, header_logo2_src VARCHAR(255) DEFAULT NULL, veranstaltung_text VARCHAR(500) DEFAULT NULL, ort_datum VARCHAR(255) DEFAULT NULL, unterschreibende VARCHAR(255) DEFAULT NULL, INDEX IDX_E62F995E9C75142 (veranstalter_id), INDEX IDX_E62F995AC360AC (ebene_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person_institution (person_id INT NOT NULL, institution_id INT NOT NULL, INDEX IDX_5774C76D217BBB47 (person_id), INDEX IDX_5774C76D10405986 (institution_id), PRIMARY KEY(person_id, institution_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE veranstaltung (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE veranstaltung_meisterschaft (veranstaltung_id INT NOT NULL, meisterschaft_id INT NOT NULL, INDEX IDX_DB79D62C6F7E218 (veranstaltung_id), INDEX IDX_DB79D62CFB5BE5A5 (meisterschaft_id), PRIMARY KEY(veranstaltung_id, meisterschaft_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E51994904A FOREIGN KEY (land_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE institution ADD CONSTRAINT FK_3A9F98E5457D14C9 FOREIGN KEY (staat_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE meisterschaft ADD CONSTRAINT FK_E62F995E9C75142 FOREIGN KEY (veranstalter_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE meisterschaft ADD CONSTRAINT FK_E62F995AC360AC FOREIGN KEY (ebene_id) REFERENCES ebene (id)');
        $this->addSql('ALTER TABLE person_institution ADD CONSTRAINT FK_5774C76D217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE person_institution ADD CONSTRAINT FK_5774C76D10405986 FOREIGN KEY (institution_id) REFERENCES institution (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE veranstaltung_meisterschaft ADD CONSTRAINT FK_DB79D62C6F7E218 FOREIGN KEY (veranstaltung_id) REFERENCES veranstaltung (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE veranstaltung_meisterschaft ADD CONSTRAINT FK_DB79D62CFB5BE5A5 FOREIGN KEY (meisterschaft_id) REFERENCES meisterschaft (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E51994904A');
        $this->addSql('ALTER TABLE institution DROP FOREIGN KEY FK_3A9F98E5457D14C9');
        $this->addSql('ALTER TABLE meisterschaft DROP FOREIGN KEY FK_E62F995E9C75142');
        $this->addSql('ALTER TABLE meisterschaft DROP FOREIGN KEY FK_E62F995AC360AC');
        $this->addSql('ALTER TABLE person_institution DROP FOREIGN KEY FK_5774C76D217BBB47');
        $this->addSql('ALTER TABLE person_institution DROP FOREIGN KEY FK_5774C76D10405986');
        $this->addSql('ALTER TABLE veranstaltung_meisterschaft DROP FOREIGN KEY FK_DB79D62C6F7E218');
        $this->addSql('ALTER TABLE veranstaltung_meisterschaft DROP FOREIGN KEY FK_DB79D62CFB5BE5A5');
        $this->addSql('DROP TABLE ebene');
        $this->addSql('DROP TABLE institution');
        $this->addSql('DROP TABLE laeufe');
        $this->addSql('DROP TABLE meisterschaft');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE person_institution');
        $this->addSql('DROP TABLE veranstaltung');
        $this->addSql('DROP TABLE veranstaltung_meisterschaft');
    }
}
