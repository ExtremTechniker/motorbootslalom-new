<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307200527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disqualifikations_anforderung ADD wettkampfrichter_id INT NOT NULL');
        $this->addSql('ALTER TABLE disqualifikations_anforderung ADD CONSTRAINT FK_FBEDB708D2D8B235 FOREIGN KEY (wettkampfrichter_id) REFERENCES wettkampfrichter (id)');
        $this->addSql('CREATE INDEX IDX_FBEDB708D2D8B235 ON disqualifikations_anforderung (wettkampfrichter_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disqualifikations_anforderung DROP FOREIGN KEY FK_FBEDB708D2D8B235');
        $this->addSql('DROP INDEX IDX_FBEDB708D2D8B235 ON disqualifikations_anforderung');
        $this->addSql('ALTER TABLE disqualifikations_anforderung DROP wettkampfrichter_id');
    }
}
