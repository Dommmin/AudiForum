<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510104812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD technical_id INT DEFAULT NULL, ADD tuning_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1B9FC167E FOREIGN KEY (technical_id) REFERENCES technical (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C142776A1D FOREIGN KEY (tuning_id) REFERENCES tuning (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1B9FC167E ON category (technical_id)');
        $this->addSql('CREATE INDEX IDX_64C19C142776A1D ON category (tuning_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1B9FC167E');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C142776A1D');
        $this->addSql('DROP INDEX IDX_64C19C1B9FC167E ON category');
        $this->addSql('DROP INDEX IDX_64C19C142776A1D ON category');
        $this->addSql('ALTER TABLE category DROP technical_id, DROP tuning_id');
    }
}
