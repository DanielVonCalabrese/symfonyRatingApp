<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210723190334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ratings DROP rating_id');
        $this->addSql('ALTER TABLE songs DROP song_id');
        $this->addSql('ALTER TABLE users DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE songs ADD song_id INT NOT NULL');
        $this->addSql('ALTER TABLE users ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE ratings ADD rating_id INT NOT NULL');
    }
}
