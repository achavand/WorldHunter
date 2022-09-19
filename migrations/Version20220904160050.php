<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220904160050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE races ADD name_male_fr VARCHAR(255) NOT NULL, ADD name_female_fr VARCHAR(255) NOT NULL, DROP name_male, DROP name_female');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE races ADD name_male VARCHAR(255) NOT NULL, ADD name_female VARCHAR(255) NOT NULL, DROP name_male_fr, DROP name_female_fr');
    }
}
