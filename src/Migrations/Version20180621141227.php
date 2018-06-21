<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180621141227 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE tapandgo_posgps (id UUID NOT NULL, lat VARCHAR(255) NOT NULL, long VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tapandgo_posgps.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE tapandgo_city ADD pos_gps_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE tapandgo_city DROP pos_gps');
        $this->addSql('COMMENT ON COLUMN tapandgo_city.pos_gps_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE tapandgo_city ADD CONSTRAINT FK_C726F3EB6DF260CB FOREIGN KEY (pos_gps_id) REFERENCES tapandgo_posgps (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C726F3EB6DF260CB ON tapandgo_city (pos_gps_id)');
        $this->addSql('ALTER TABLE tapandgo_station ADD pos_gps_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE tapandgo_station DROP pos_gps');
        $this->addSql('COMMENT ON COLUMN tapandgo_station.pos_gps_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE tapandgo_station ADD CONSTRAINT FK_3AFF572B6DF260CB FOREIGN KEY (pos_gps_id) REFERENCES tapandgo_posgps (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3AFF572B6DF260CB ON tapandgo_station (pos_gps_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tapandgo_city DROP CONSTRAINT FK_C726F3EB6DF260CB');
        $this->addSql('ALTER TABLE tapandgo_station DROP CONSTRAINT FK_3AFF572B6DF260CB');
        $this->addSql('DROP TABLE tapandgo_posgps');
        $this->addSql('DROP INDEX UNIQ_C726F3EB6DF260CB');
        $this->addSql('ALTER TABLE tapandgo_city ADD pos_gps TEXT NOT NULL');
        $this->addSql('ALTER TABLE tapandgo_city DROP pos_gps_id');
        $this->addSql('DROP INDEX UNIQ_3AFF572B6DF260CB');
        $this->addSql('ALTER TABLE tapandgo_station ADD pos_gps TEXT NOT NULL');
        $this->addSql('ALTER TABLE tapandgo_station DROP pos_gps_id');
    }
}
