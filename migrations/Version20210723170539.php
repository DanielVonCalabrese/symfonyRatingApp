<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723170539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE ratings_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE songs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE ratings (rating_value INT NOT NULL, user_id INT NOT NULL, song_id INT NOT NULL, PRIMARY KEY(user_id, song_id))');
        $this->addSql('CREATE TABLE songs (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE ratings_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE songs_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP TABLE ratings');
        $this->addSql('DROP TABLE songs');
        $this->addSql('DROP TABLE users');
    }
}
