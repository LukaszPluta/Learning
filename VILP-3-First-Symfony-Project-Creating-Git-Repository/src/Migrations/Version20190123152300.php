<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190123152300 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE gatunek (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nazwa VARCHAR(255) NOT NULL, opis VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE ksiazka (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, autor_id INTEGER NOT NULL, gatunek_id INTEGER NOT NULL, nazwa VARCHAR(255) NOT NULL, opis VARCHAR(255) NOT NULL, rok INTEGER NOT NULL, kraj VARCHAR(255) NOT NULL, dostepnosc BOOLEAN NOT NULL, data_dodania DATE NOT NULL, data_edycji DATE NOT NULL)');
        $this->addSql('CREATE INDEX IDX_6B09337014D45BBE ON ksiazka (autor_id)');
        $this->addSql('CREATE INDEX IDX_6B0933701BE87849 ON ksiazka (gatunek_id)');
        $this->addSql('DROP TABLE gatunki');
        $this->addSql('DROP TABLE ksiazki');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, date_of_creation, date_last_mod, description FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, date_of_creation DATETIME NOT NULL, date_last_mod DATETIME NOT NULL, description VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO product (id, name, date_of_creation, date_last_mod, description) SELECT id, name, date_of_creation, date_last_mod, description FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE TEMPORARY TABLE __temp__autor AS SELECT id, imie, nazwisko, rok_urodzenia, rok_smierci FROM autor');
        $this->addSql('DROP TABLE autor');
        $this->addSql('CREATE TABLE autor (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, rok_urodzenia INTEGER NOT NULL, imie VARCHAR(255) NOT NULL, nazwisko VARCHAR(255) NOT NULL, rok_smierci INTEGER NOT NULL, kraj VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO autor (id, imie, nazwisko, rok_urodzenia, rok_smierci) SELECT id, imie, nazwisko, rok_urodzenia, rok_smierci FROM __temp__autor');
        $this->addSql('DROP TABLE __temp__autor');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE gatunki (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nazwa_gat CLOB NOT NULL COLLATE BINARY, opis VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE TABLE ksiazki (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tytul CLOB NOT NULL COLLATE BINARY, opis VARCHAR(255) NOT NULL COLLATE BINARY, autor CLOB NOT NULL COLLATE BINARY, gatunek CLOB NOT NULL COLLATE BINARY, rok_wydania INTEGER NOT NULL, kraj_wydania CLOB NOT NULL COLLATE BINARY, dostepnosc BOOLEAN NOT NULL, data_dodania DATETIME NOT NULL, data_edycji DATETIME NOT NULL)');
        $this->addSql('DROP TABLE gatunek');
        $this->addSql('DROP TABLE ksiazka');
        $this->addSql('CREATE TEMPORARY TABLE __temp__autor AS SELECT id, imie, nazwisko, rok_urodzenia, rok_smierci FROM autor');
        $this->addSql('DROP TABLE autor');
        $this->addSql('CREATE TABLE autor (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, rok_urodzenia INTEGER NOT NULL, imie CLOB NOT NULL COLLATE BINARY, nazwisko CLOB NOT NULL COLLATE BINARY, rok_smierci INTEGER DEFAULT NULL, kraj_pochodzenia CLOB NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO autor (id, imie, nazwisko, rok_urodzenia, rok_smierci) SELECT id, imie, nazwisko, rok_urodzenia, rok_smierci FROM __temp__autor');
        $this->addSql('DROP TABLE __temp__autor');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, description, date_of_creation, date_last_mod FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_of_creation DATETIME NOT NULL, date_last_mod DATETIME NOT NULL, category_id INTEGER NOT NULL)');
        $this->addSql('INSERT INTO product (id, name, description, date_of_creation, date_last_mod) SELECT id, name, description, date_of_creation, date_last_mod FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
    }
}
