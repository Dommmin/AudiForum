<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220511113427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model_technical (model_id INT NOT NULL, technical_id INT NOT NULL, INDEX IDX_A622E93D7975B7E7 (model_id), INDEX IDX_A622E93DB9FC167E (technical_id), PRIMARY KEY(model_id, technical_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model_tuning (model_id INT NOT NULL, tuning_id INT NOT NULL, INDEX IDX_87F367197975B7E7 (model_id), INDEX IDX_87F3671942776A1D (tuning_id), PRIMARY KEY(model_id, tuning_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model_technical ADD CONSTRAINT FK_A622E93D7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model_technical ADD CONSTRAINT FK_A622E93DB9FC167E FOREIGN KEY (technical_id) REFERENCES technical (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model_tuning ADD CONSTRAINT FK_87F367197975B7E7 FOREIGN KEY (model_id) REFERENCES model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model_tuning ADD CONSTRAINT FK_87F3671942776A1D FOREIGN KEY (tuning_id) REFERENCES tuning (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE model_technical');
        $this->addSql('DROP TABLE model_tuning');
    }
}
