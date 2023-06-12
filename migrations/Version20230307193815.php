<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307193815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boje (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disqualifikations_anforderung (id INT AUTO_INCREMENT NOT NULL, lauf_id INT NOT NULL, disqualifikations_grund_id INT NOT NULL, bemerkung VARCHAR(512) DEFAULT NULL, INDEX IDX_FBEDB708A4ADFE52 (lauf_id), INDEX IDX_FBEDB7083B9B6301 (disqualifikations_grund_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE disqualifikations_anforderung ADD CONSTRAINT FK_FBEDB708A4ADFE52 FOREIGN KEY (lauf_id) REFERENCES lauf (id)');
        $this->addSql('ALTER TABLE disqualifikations_anforderung ADD CONSTRAINT FK_FBEDB7083B9B6301 FOREIGN KEY (disqualifikations_grund_id) REFERENCES disqualifikation (id)');
        $this->addSql('ALTER TABLE lauf_disqualifikation DROP FOREIGN KEY FK_6724CD023D1C1C8E');
        $this->addSql('ALTER TABLE lauf_disqualifikation DROP FOREIGN KEY FK_6724CD02A4ADFE52');
        $this->addSql('DROP TABLE lauf_disqualifikation');
        $this->addSql('ALTER TABLE penalty_points ADD boje_id INT DEFAULT NULL, DROP object');
        $this->addSql('ALTER TABLE penalty_points ADD CONSTRAINT FK_EE5F1F693E9D4BC2 FOREIGN KEY (boje_id) REFERENCES boje (id)');
        $this->addSql('CREATE INDEX IDX_EE5F1F693E9D4BC2 ON penalty_points (boje_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE penalty_points DROP FOREIGN KEY FK_EE5F1F693E9D4BC2');
        $this->addSql('CREATE TABLE lauf_disqualifikation (lauf_id INT NOT NULL, disqualifikation_id INT NOT NULL, INDEX IDX_6724CD02A4ADFE52 (lauf_id), INDEX IDX_6724CD023D1C1C8E (disqualifikation_id), PRIMARY KEY(lauf_id, disqualifikation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lauf_disqualifikation ADD CONSTRAINT FK_6724CD023D1C1C8E FOREIGN KEY (disqualifikation_id) REFERENCES disqualifikation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lauf_disqualifikation ADD CONSTRAINT FK_6724CD02A4ADFE52 FOREIGN KEY (lauf_id) REFERENCES lauf (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disqualifikations_anforderung DROP FOREIGN KEY FK_FBEDB708A4ADFE52');
        $this->addSql('ALTER TABLE disqualifikations_anforderung DROP FOREIGN KEY FK_FBEDB7083B9B6301');
        $this->addSql('DROP TABLE boje');
        $this->addSql('DROP TABLE disqualifikations_anforderung');
        $this->addSql('DROP INDEX IDX_EE5F1F693E9D4BC2 ON penalty_points');
        $this->addSql('ALTER TABLE penalty_points ADD object VARCHAR(255) NOT NULL, DROP boje_id');
    }
}
