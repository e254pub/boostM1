<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230805231200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Car entity';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE car (
            id INT AUTO_INCREMENT NOT NULL,
            brand VARCHAR(255) NOT NULL,
            model VARCHAR(255) NOT NULL,
            color VARCHAR(20) NOT NULL,
            PRIMARY KEY (id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE car');
    }
}
