<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705192442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, nom_administrateur VARCHAR(255) NOT NULL, prenom_administrateur VARCHAR(255) NOT NULL, email_administrateur VARCHAR(255) NOT NULL, mot_passe_administrateur VARCHAR(255) NOT NULL, adresse_administrateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, parents_id INT NOT NULL, nom_eleve VARCHAR(255) NOT NULL, prenom_eleve VARCHAR(255) NOT NULL, login_eleve VARCHAR(255) NOT NULL, email_eleve VARCHAR(255) NOT NULL, phone_eleve INT NOT NULL, date_naissance_eleve DATE NOT NULL, sexe_eleve VARCHAR(255) NOT NULL, etat_eleve VARCHAR(255) NOT NULL, ville_eleve VARCHAR(255) NOT NULL, adresse_eleve VARCHAR(255) NOT NULL, mot_passe_eleve VARCHAR(255) NOT NULL, option_matiere_eleve VARCHAR(255) DEFAULT NULL, photo_eleve VARCHAR(255) DEFAULT NULL, solde_eleve DOUBLE PRECISION NOT NULL, INDEX IDX_ECA105F7B3E9C81 (niveau_id), INDEX IDX_ECA105F7B706B6D3 (parents_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, nom_enseignant VARCHAR(255) NOT NULL, prenom_enseignant VARCHAR(255) NOT NULL, email_enseignant VARCHAR(255) NOT NULL, phone_enseignant INT NOT NULL, sexe_enseignant VARCHAR(255) NOT NULL, adresse_enseignant VARCHAR(255) NOT NULL, grade_enseignant VARCHAR(255) NOT NULL, specialitéenseignant VARCHAR(255) NOT NULL, mot_passe_enseignant VARCHAR(255) NOT NULL, photo_enseignant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, type_inscription VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, date_expiration DATE NOT NULL, code INT NOT NULL, montant DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, année_inscription INT NOT NULL, INDEX IDX_5E90F6D6B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents (id INT AUTO_INCREMENT NOT NULL, nom_parent VARCHAR(255) NOT NULL, prenom_parent VARCHAR(255) NOT NULL, email_parent VARCHAR(255) NOT NULL, phone_parent INT NOT NULL, adresse_parent VARCHAR(255) NOT NULL, mot_passe_parent VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7B706B6D3 FOREIGN KEY (parents_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7B706B6D3');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE parents');
    }
}
