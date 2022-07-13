<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220707193507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enseignant DROP specialitéenseignant');
        $this->addSql('ALTER TABLE inscription ADD pack VARCHAR(255) NOT NULL, DROP type_inscription, DROP code, DROP description, DROP année_inscription');
        $this->addSql('ALTER TABLE parents ADD login_parents VARCHAR(255) NOT NULL, ADD fonction_parents VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enseignant ADD specialitéenseignant VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inscription ADD code INT NOT NULL, ADD description VARCHAR(255) NOT NULL, ADD année_inscription INT NOT NULL, CHANGE pack type_inscription VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE parents DROP login_parents, DROP fonction_parents');
    }
}
