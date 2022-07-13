<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220708080645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement_niveau_inscription DROP FOREIGN KEY FK_A6417AE213CAD24D');
        $this->addSql('ALTER TABLE abonnement_niveau_niveau DROP FOREIGN KEY FK_CAC81D6F13CAD24D');
        $this->addSql('DROP TABLE abonnement_niveau');
        $this->addSql('DROP TABLE abonnement_niveau_inscription');
        $this->addSql('DROP TABLE abonnement_niveau_niveau');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement_niveau (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE abonnement_niveau_inscription (abonnement_niveau_id INT NOT NULL, inscription_id INT NOT NULL, INDEX IDX_A6417AE213CAD24D (abonnement_niveau_id), INDEX IDX_A6417AE25DAC5993 (inscription_id), PRIMARY KEY(abonnement_niveau_id, inscription_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE abonnement_niveau_niveau (abonnement_niveau_id INT NOT NULL, niveau_id INT NOT NULL, INDEX IDX_CAC81D6F13CAD24D (abonnement_niveau_id), INDEX IDX_CAC81D6FB3E9C81 (niveau_id), PRIMARY KEY(abonnement_niveau_id, niveau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE abonnement_niveau_inscription ADD CONSTRAINT FK_A6417AE213CAD24D FOREIGN KEY (abonnement_niveau_id) REFERENCES abonnement_niveau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abonnement_niveau_inscription ADD CONSTRAINT FK_A6417AE25DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abonnement_niveau_niveau ADD CONSTRAINT FK_CAC81D6F13CAD24D FOREIGN KEY (abonnement_niveau_id) REFERENCES abonnement_niveau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abonnement_niveau_niveau ADD CONSTRAINT FK_CAC81D6FB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id) ON DELETE CASCADE');
    }
}
