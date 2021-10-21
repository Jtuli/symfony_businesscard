<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014160016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE globals_social');
        $this->addSql('ALTER TABLE social ADD visible TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE globals_social (globals_id INT NOT NULL, social_id INT NOT NULL, INDEX IDX_4D0FB1FCE4BFF7 (globals_id), INDEX IDX_4D0FB1FCFFEB5B27 (social_id), PRIMARY KEY(globals_id, social_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE globals_social ADD CONSTRAINT FK_4D0FB1FCE4BFF7 FOREIGN KEY (globals_id) REFERENCES globals (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE globals_social ADD CONSTRAINT FK_4D0FB1FCFFEB5B27 FOREIGN KEY (social_id) REFERENCES social (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE social DROP visible');
    }
}
