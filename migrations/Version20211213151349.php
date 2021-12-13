<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213151349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE user_details_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE user_details (id INT NOT NULL, username VARCHAR(180) NOT NULL, emailid VARCHAR(180) NOT NULL, first_name VARCHAR(180) NOT NULL, last_name VARCHAR(180) NOT NULL, mobile_no VARCHAR(11) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2A2B1580F85E0677 ON user_details (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2A2B1580ADD90127 ON user_details (emailid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2A2B158060950D04 ON user_details (mobile_no)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE user_details_id_seq CASCADE');
        $this->addSql('DROP TABLE user_details');
    }
}
