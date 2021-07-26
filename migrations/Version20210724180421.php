<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210724180421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE ratings_rel (songs_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(songs_id, users_id))');
        $this->addSql('CREATE INDEX IDX_79989FC7C365A331 ON ratings_rel (songs_id)');
        $this->addSql('CREATE INDEX IDX_79989FC767B3B43D ON ratings_rel (users_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('ALTER TABLE ratings_rel ADD CONSTRAINT FK_79989FC7C365A331 FOREIGN KEY (songs_id) REFERENCES songs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ratings_rel ADD CONSTRAINT FK_79989FC767B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE ratings_rel');
        $this->addSql('DROP TABLE "user"');
    }
}
