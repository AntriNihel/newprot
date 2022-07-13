<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705133353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fichier_matiere (id INT AUTO_INCREMENT NOT NULL, type_fichier_id INT DEFAULT NULL, matiere_id INT DEFAULT NULL, nom_fichier_matiere VARCHAR(255) NOT NULL, description_fichier VARCHAR(255) NOT NULL, format_fichier VARCHAR(255) NOT NULL, lien_fichier VARCHAR(255) NOT NULL, INDEX IDX_4B87AB7D12928ADB (type_fichier_id), INDEX IDX_4B87AB7DF46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matieres (id INT AUTO_INCREMENT NOT NULL, niveau_id INT DEFAULT NULL, nom_matiere VARCHAR(255) NOT NULL, description_matiere LONGTEXT NOT NULL, etat_matiere TINYINT(1) NOT NULL, image_matiere VARCHAR(255) NOT NULL, INDEX IDX_8D9773D2B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, nom_niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_fichier_matiere (id INT AUTO_INCREMENT NOT NULL, nom_type_fichier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fichier_matiere ADD CONSTRAINT FK_4B87AB7D12928ADB FOREIGN KEY (type_fichier_id) REFERENCES type_fichier_matiere (id)');
        $this->addSql('ALTER TABLE fichier_matiere ADD CONSTRAINT FK_4B87AB7DF46CD258 FOREIGN KEY (matiere_id) REFERENCES matieres (id)');
        $this->addSql('ALTER TABLE matieres ADD CONSTRAINT FK_8D9773D2B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fichier_matiere DROP FOREIGN KEY FK_4B87AB7DF46CD258');
        $this->addSql('ALTER TABLE matieres DROP FOREIGN KEY FK_8D9773D2B3E9C81');
        $this->addSql('ALTER TABLE fichier_matiere DROP FOREIGN KEY FK_4B87AB7D12928ADB');
        $this->addSql('DROP TABLE fichier_matiere');
        $this->addSql('DROP TABLE matieres');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE type_fichier_matiere');
    }
}
