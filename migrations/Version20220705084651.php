<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705084651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matieres (id INT AUTO_INCREMENT NOT NULL, niveau_id INT DEFAULT NULL, nom_matiere VARCHAR(255) NOT NULL, description_matiere LONGTEXT NOT NULL, etat_matiere TINYINT(1) NOT NULL, image_matiere VARCHAR(255) NOT NULL, INDEX IDX_8D9773D2B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, nom_niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matieres ADD CONSTRAINT FK_8D9773D2B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matieres DROP FOREIGN KEY FK_8D9773D2B3E9C81');
        $this->addSql('DROP TABLE matieres');
        $this->addSql('DROP TABLE niveau');
    }
}
