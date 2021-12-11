<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207211248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scooter (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(255) NOT NULL, power INT NOT NULL, date_of_manufacture DATETIME NOT NULL, battery_capacity INT NOT NULL, weight INT NOT NULL, max_speed INT NOT NULL, max_distance INT NOT NULL, battery_charge_time INT NOT NULL, max_weight INT NOT NULL, manufacturer VARCHAR(255) NOT NULL, has_screen TINYINT(1) NOT NULL, has_light TINYINT(1) NOT NULL, is_part TINYINT(1) NOT NULL, part_type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD scooter_id INT NOT NULL, CHANGE price price INT NOT NULL');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED587678A648 FOREIGN KEY (scooter_id) REFERENCES scooter (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_77E0ED587678A648 ON ad (scooter_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED587678A648');
        $this->addSql('DROP TABLE scooter');
        $this->addSql('DROP INDEX UNIQ_77E0ED587678A648 ON ad');
        $this->addSql('ALTER TABLE ad DROP scooter_id, CHANGE price price NUMERIC(6, 2) NOT NULL');
    }
}
