<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210724074203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ratings_rel (songs_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(songs_id, users_id))');
        $this->addSql('CREATE INDEX IDX_79989FC7C365A331 ON ratings_rel (songs_id)');
        $this->addSql('CREATE INDEX IDX_79989FC767B3B43D ON ratings_rel (users_id)');
        $this->addSql('ALTER TABLE ratings_rel ADD CONSTRAINT FK_79989FC7C365A331 FOREIGN KEY (songs_id) REFERENCES songs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ratings_rel ADD CONSTRAINT FK_79989FC767B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE ratings_rel');
    }
}
