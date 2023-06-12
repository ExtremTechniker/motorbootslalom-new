<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230122213815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE disqualifikation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lauf (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lauf_disqualifikation (lauf_id INT NOT NULL, disqualifikation_id INT NOT NULL, INDEX IDX_6724CD02A4ADFE52 (lauf_id), INDEX IDX_6724CD023D1C1C8E (disqualifikation_id), PRIMARY KEY(lauf_id, disqualifikation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE penalty_points (id INT AUTO_INCREMENT NOT NULL, lauf_id INT NOT NULL, object VARCHAR(255) NOT NULL, points INT NOT NULL, INDEX IDX_EE5F1F69A4ADFE52 (lauf_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lauf_disqualifikation ADD CONSTRAINT FK_6724CD02A4ADFE52 FOREIGN KEY (lauf_id) REFERENCES lauf (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lauf_disqualifikation ADD CONSTRAINT FK_6724CD023D1C1C8E FOREIGN KEY (disqualifikation_id) REFERENCES disqualifikation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE penalty_points ADD CONSTRAINT FK_EE5F1F69A4ADFE52 FOREIGN KEY (lauf_id) REFERENCES lauf (id)');
        $this->addSql('DROP TABLE laeufe');
        $this->addSql('ALTER TABLE user CHANGE is_verified verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE laeufe (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lauf_disqualifikation DROP FOREIGN KEY FK_6724CD02A4ADFE52');
        $this->addSql('ALTER TABLE lauf_disqualifikation DROP FOREIGN KEY FK_6724CD023D1C1C8E');
        $this->addSql('ALTER TABLE penalty_points DROP FOREIGN KEY FK_EE5F1F69A4ADFE52');
        $this->addSql('DROP TABLE disqualifikation');
        $this->addSql('DROP TABLE lauf');
        $this->addSql('DROP TABLE lauf_disqualifikation');
        $this->addSql('DROP TABLE penalty_points');
        $this->addSql('ALTER TABLE user CHANGE verified is_verified TINYINT(1) NOT NULL');
    }
}
