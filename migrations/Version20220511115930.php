<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511115930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question ADD general_id INT DEFAULT NULL, ADD technical_id INT DEFAULT NULL, ADD tuning_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ED0E2C4F1 FOREIGN KEY (general_id) REFERENCES general (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EB9FC167E FOREIGN KEY (technical_id) REFERENCES technical (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E42776A1D FOREIGN KEY (tuning_id) REFERENCES tuning (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494ED0E2C4F1 ON question (general_id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EB9FC167E ON question (technical_id)');
        $this->addSql('CREATE INDEX IDX_B6F7494E42776A1D ON question (tuning_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494ED0E2C4F1');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EB9FC167E');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E42776A1D');
        $this->addSql('DROP INDEX IDX_B6F7494ED0E2C4F1 ON question');
        $this->addSql('DROP INDEX IDX_B6F7494EB9FC167E ON question');
        $this->addSql('DROP INDEX IDX_B6F7494E42776A1D ON question');
        $this->addSql('ALTER TABLE question DROP general_id, DROP technical_id, DROP tuning_id');
    }
}
