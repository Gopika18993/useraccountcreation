<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213152855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_2a2b1580add90127');
        $this->addSql('DROP INDEX uniq_2a2b158060950d04');
        $this->addSql('ALTER TABLE user_details ADD mobileno INT NOT NULL');
        $this->addSql('ALTER TABLE user_details DROP mobile_no');
        $this->addSql('ALTER TABLE user_details ALTER emailid TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE user_details ALTER first_name TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE user_details ALTER last_name DROP NOT NULL');
        $this->addSql('ALTER TABLE user_details ALTER last_name TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_details ADD mobile_no VARCHAR(11) NOT NULL');
        $this->addSql('ALTER TABLE user_details DROP mobileno');
        $this->addSql('ALTER TABLE user_details ALTER first_name TYPE VARCHAR(180)');
        $this->addSql('ALTER TABLE user_details ALTER last_name SET NOT NULL');
        $this->addSql('ALTER TABLE user_details ALTER last_name TYPE VARCHAR(180)');
        $this->addSql('ALTER TABLE user_details ALTER emailid TYPE VARCHAR(180)');
        $this->addSql('CREATE UNIQUE INDEX uniq_2a2b1580add90127 ON user_details (emailid)');
        $this->addSql('CREATE UNIQUE INDEX uniq_2a2b158060950d04 ON user_details (mobile_no)');
    }
}
