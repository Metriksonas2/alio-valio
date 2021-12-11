<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207204601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type VARCHAR(255) NOT NULL, price NUMERIC(6, 2) NOT NULL, priority VARCHAR(255) NOT NULL, views INT DEFAULT 0 NOT NULL, likes INT DEFAULT 0 NOT NULL, expiration_date DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, is_active TINYINT(1) DEFAULT \'1\' NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_77E0ED58A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE system_notification (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, content VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AC675EC7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE system_notification ADD CONSTRAINT FK_AC675EC7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ad');
        $this->addSql('DROP TABLE system_notification');
    }
}
