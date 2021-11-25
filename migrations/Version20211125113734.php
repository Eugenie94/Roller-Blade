<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125113734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD date_of_birth DATETIME NOT NULL, ADD age INT NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE address address VARCHAR(255) NOT NULL, CHANGE phone phone INT NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP date_of_birth, DROP age, CHANGE email email VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address address VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE phone phone INT DEFAULT NULL');
    }
}
