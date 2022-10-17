<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017093714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cell (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, to_change LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', value_to_change LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, to_change LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', value_to_change LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, user_personnage_id INT NOT NULL, wallet_id INT NOT NULL, talent_id INT NOT NULL, serveur INT NOT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, current_xp INT NOT NULL, total_xp INT NOT NULL, current_lp INT NOT NULL, total_lp INT NOT NULL, current_pm INT NOT NULL, total_pm INT NOT NULL, physical_atk INT NOT NULL, magical_atk INT NOT NULL, physical_def INT NOT NULL, magical_def INT NOT NULL, agility INT NOT NULL, vitality INT NOT NULL, stat_point INT NOT NULL, INDEX IDX_6AEA486DB0BFFE12 (user_personnage_id), UNIQUE INDEX UNIQ_6AEA486D712520F3 (wallet_id), INDEX IDX_6AEA486D18777CEF (talent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE races (id INT AUTO_INCREMENT NOT NULL, url_image_male VARCHAR(255) NOT NULL, url_image_female VARCHAR(255) NOT NULL, name_male_fr VARCHAR(255) NOT NULL, name_female_fr VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, racial_advantages LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', name_male_en VARCHAR(255) NOT NULL, name_female_en VARCHAR(255) NOT NULL, description_en LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE racial_advantage (id INT AUTO_INCREMENT NOT NULL, races_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_58C3F53299AE984C (races_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, stat_to_change LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', value_to_change LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, register_date DATETIME NOT NULL, is_banned TINYINT(1) NOT NULL, username VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_race (id INT AUTO_INCREMENT NOT NULL, racial_advantage_id INT NOT NULL, personnage_id INT NOT NULL, url_img LONGTEXT NOT NULL, name_race_fr VARCHAR(255) NOT NULL, name_race_en VARCHAR(255) NOT NULL, description_fr LONGTEXT NOT NULL, description_en LONGTEXT NOT NULL, INDEX IDX_A0EEF7662A087264 (racial_advantage_id), UNIQUE INDEX UNIQ_A0EEF7665E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wallet (id INT AUTO_INCREMENT NOT NULL, gold INT NOT NULL, silver INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DB0BFFE12 FOREIGN KEY (user_personnage_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D712520F3 FOREIGN KEY (wallet_id) REFERENCES wallet (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D18777CEF FOREIGN KEY (talent_id) REFERENCES talent (id)');
        $this->addSql('ALTER TABLE racial_advantage ADD CONSTRAINT FK_58C3F53299AE984C FOREIGN KEY (races_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE user_race ADD CONSTRAINT FK_A0EEF7662A087264 FOREIGN KEY (racial_advantage_id) REFERENCES racial_advantage (id)');
        $this->addSql('ALTER TABLE user_race ADD CONSTRAINT FK_A0EEF7665E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_race DROP FOREIGN KEY FK_A0EEF7665E315342');
        $this->addSql('ALTER TABLE racial_advantage DROP FOREIGN KEY FK_58C3F53299AE984C');
        $this->addSql('ALTER TABLE user_race DROP FOREIGN KEY FK_A0EEF7662A087264');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D18777CEF');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DB0BFFE12');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D712520F3');
        $this->addSql('DROP TABLE cell');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE races');
        $this->addSql('DROP TABLE racial_advantage');
        $this->addSql('DROP TABLE talent');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_race');
        $this->addSql('DROP TABLE wallet');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
