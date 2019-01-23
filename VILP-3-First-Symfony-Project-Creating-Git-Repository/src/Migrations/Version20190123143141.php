<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190123143141 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ksiazki AS SELECT id, tytul, opis, autor, rok_wydania, kraj_wydania, dostepnosc, data_dodania, data_edycji FROM ksiazki');
        $this->addSql('DROP TABLE ksiazki');
        $this->addSql('CREATE TABLE ksiazki (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tytul CLOB NOT NULL COLLATE BINARY, opis VARCHAR(255) NOT NULL COLLATE BINARY, autor CLOB NOT NULL COLLATE BINARY, rok_wydania INTEGER NOT NULL, kraj_wydania CLOB NOT NULL COLLATE BINARY, dostepnosc BOOLEAN NOT NULL, data_dodania DATETIME NOT NULL, data_edycji DATETIME NOT NULL)');
        $this->addSql('INSERT INTO ksiazki (id, tytul, opis, autor, rok_wydania, kraj_wydania, dostepnosc, data_dodania, data_edycji) SELECT id, tytul, opis, autor, rok_wydania, kraj_wydania, dostepnosc, data_dodania, data_edycji FROM __temp__ksiazki');
        $this->addSql('DROP TABLE __temp__ksiazki');
        $this->addSql('CREATE TEMPORARY TABLE __temp__gatunki AS SELECT id, nazwa_gat, opis FROM gatunki');
        $this->addSql('DROP TABLE gatunki');
        $this->addSql('CREATE TABLE gatunki (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, gatunki_id INTEGER NOT NULL, nazwa_gat CLOB NOT NULL COLLATE BINARY, opis VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_B048EAF1ED10EA3 FOREIGN KEY (gatunki_id) REFERENCES ksiazki (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO gatunki (id, nazwa_gat, opis) SELECT id, nazwa_gat, opis FROM __temp__gatunki');
        $this->addSql('DROP TABLE __temp__gatunki');
        $this->addSql('CREATE INDEX IDX_B048EAF1ED10EA3 ON gatunki (gatunki_id)');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, date_of_creation, date_last_mod, description FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, date_of_creation DATETIME NOT NULL, date_last_mod DATETIME NOT NULL, description VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO product (id, name, date_of_creation, date_last_mod, description) SELECT id, name, date_of_creation, date_last_mod, description FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_B048EAF1ED10EA3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__gatunki AS SELECT id, nazwa_gat, opis FROM gatunki');
        $this->addSql('DROP TABLE gatunki');
        $this->addSql('CREATE TABLE gatunki (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nazwa_gat CLOB NOT NULL, opis VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO gatunki (id, nazwa_gat, opis) SELECT id, nazwa_gat, opis FROM __temp__gatunki');
        $this->addSql('DROP TABLE __temp__gatunki');
        $this->addSql('ALTER TABLE ksiazki ADD COLUMN gatunek CLOB NOT NULL COLLATE BINARY');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, description, date_of_creation, date_last_mod FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_of_creation DATETIME NOT NULL, date_last_mod DATETIME NOT NULL, category_id INTEGER NOT NULL)');
        $this->addSql('INSERT INTO product (id, name, description, date_of_creation, date_last_mod) SELECT id, name, description, date_of_creation, date_last_mod FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
    }
}
