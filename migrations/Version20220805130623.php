<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220805130623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE races (id INT AUTO_INCREMENT NOT NULL, url_image_male VARCHAR(255) NOT NULL, url_image_female VARCHAR(255) NOT NULL, name_male VARCHAR(255) NOT NULL, name_female VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, racial_advantages LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE racial_advantage (id INT AUTO_INCREMENT NOT NULL, races_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_58C3F53299AE984C (races_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_race (id INT AUTO_INCREMENT NOT NULL, racial_advantage_id INT DEFAULT NULL, url_image VARCHAR(255) NOT NULL, name_race VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_A0EEF7662A087264 (racial_advantage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE racial_advantage ADD CONSTRAINT FK_58C3F53299AE984C FOREIGN KEY (races_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE user_race ADD CONSTRAINT FK_A0EEF7662A087264 FOREIGN KEY (racial_advantage_id) REFERENCES racial_advantage (id)');
        $this->addSql('ALTER TABLE personnage ADD race_id INT NOT NULL');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D6E59D40D FOREIGN KEY (race_id) REFERENCES user_race (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AEA486D6E59D40D ON personnage (race_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE racial_advantage DROP FOREIGN KEY FK_58C3F53299AE984C');
        $this->addSql('ALTER TABLE user_race DROP FOREIGN KEY FK_A0EEF7662A087264');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D6E59D40D');
        $this->addSql('DROP TABLE races');
        $this->addSql('DROP TABLE racial_advantage');
        $this->addSql('DROP TABLE user_race');
        $this->addSql('DROP INDEX UNIQ_6AEA486D6E59D40D ON personnage');
        $this->addSql('ALTER TABLE personnage DROP race_id');
    }
}
