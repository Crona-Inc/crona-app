<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231210112133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time_log ADD task_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE time_log ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE time_log ADD CONSTRAINT FK_55BE03AF8DB60186 FOREIGN KEY (task_id) REFERENCES task (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE time_log ADD CONSTRAINT FK_55BE03AF166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_55BE03AF8DB60186 ON time_log (task_id)');
        $this->addSql('CREATE INDEX IDX_55BE03AF166D1F9C ON time_log (project_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE time_log DROP CONSTRAINT FK_55BE03AF8DB60186');
        $this->addSql('ALTER TABLE time_log DROP CONSTRAINT FK_55BE03AF166D1F9C');
        $this->addSql('DROP INDEX IDX_55BE03AF8DB60186');
        $this->addSql('DROP INDEX IDX_55BE03AF166D1F9C');
        $this->addSql('ALTER TABLE time_log DROP task_id');
        $this->addSql('ALTER TABLE time_log DROP project_id');
    }
}
