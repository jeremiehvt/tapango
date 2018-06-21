<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180621133659 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE tapandgo_city ALTER pos_gps TYPE TEXT');
        $this->addSql('ALTER TABLE tapandgo_city ALTER pos_gps DROP DEFAULT');
        $this->addSql('ALTER TABLE tapandgo_station ADD status BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE tapandgo_station ALTER pos_gps TYPE TEXT');
        $this->addSql('ALTER TABLE tapandgo_station ALTER pos_gps DROP DEFAULT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tapandgo_city ALTER pos_gps TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE tapandgo_city ALTER pos_gps DROP DEFAULT');
        $this->addSql('ALTER TABLE tapandgo_station DROP status');
        $this->addSql('ALTER TABLE tapandgo_station ALTER pos_gps TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE tapandgo_station ALTER pos_gps DROP DEFAULT');
    }
}
