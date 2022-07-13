<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220711063053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE inscription');
        $this->addSql('ALTER TABLE matieres ADD CONSTRAINT FK_8D9773D26973EC04 FOREIGN KEY (section_niveau_id) REFERENCES section_niveau (id)');
        $this->addSql('CREATE INDEX IDX_8D9773D26973EC04 ON matieres (section_niveau_id)');
        $this->addSql('ALTER TABLE parents ADD localite_id INT NOT NULL, ADD fonction_parents VARCHAR(255) NOT NULL, ADD rue VARCHAR(255) NOT NULL, ADD civilite_parent VARCHAR(255) NOT NULL, ADD type_parents VARCHAR(255) NOT NULL, ADD etat_conf TINYINT(1) NOT NULL, CHANGE adresse_parent login_parents VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6A924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('CREATE INDEX IDX_FD501D6A924DD2B5 ON parents (localite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, type_inscription VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_inscription DATE NOT NULL, date_expiration DATE NOT NULL, code INT NOT NULL, montant DOUBLE PRECISION NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, année_inscription INT NOT NULL, INDEX IDX_5E90F6D6B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE matieres DROP FOREIGN KEY FK_8D9773D26973EC04');
        $this->addSql('DROP INDEX IDX_8D9773D26973EC04 ON matieres');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6A924DD2B5');
        $this->addSql('DROP INDEX IDX_FD501D6A924DD2B5 ON parents');
        $this->addSql('ALTER TABLE parents ADD adresse_parent VARCHAR(255) NOT NULL, DROP localite_id, DROP login_parents, DROP fonction_parents, DROP rue, DROP civilite_parent, DROP type_parents, DROP etat_conf');
    }
}
