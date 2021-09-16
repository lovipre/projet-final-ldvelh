<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916144359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` ADD id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB03479F37AE5 ON `character` (id_user_id)');
        $this->addSql('ALTER TABLE stuff ADD id_character_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stuff ADD CONSTRAINT FK_5941F83E32F7CB07 FOREIGN KEY (id_character_id) REFERENCES `character` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5941F83E32F7CB07 ON stuff (id_character_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03479F37AE5');
        $this->addSql('DROP INDEX UNIQ_937AB03479F37AE5 ON `character`');
        $this->addSql('ALTER TABLE `character` DROP id_user_id');
        $this->addSql('ALTER TABLE stuff DROP FOREIGN KEY FK_5941F83E32F7CB07');
        $this->addSql('DROP INDEX UNIQ_5941F83E32F7CB07 ON stuff');
        $this->addSql('ALTER TABLE stuff DROP id_character_id');
    }
}
