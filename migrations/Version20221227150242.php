<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221227150242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport_activite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, installation INTEGER NOT NULL, interqualite INTEGER NOT NULL, interdepannage INTEGER NOT NULL, visite INTEGER NOT NULL, recuperation INTEGER NOT NULL, autre VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('DROP TABLE rapport');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rapport (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, installation INTEGER NOT NULL, interqualite INTEGER NOT NULL, interdepannage INTEGER NOT NULL, visite INTEGER NOT NULL, recuperation INTEGER NOT NULL, autre VARCHAR(255) DEFAULT NULL COLLATE "BINARY", created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('DROP TABLE rapport_activite');
    }
}
