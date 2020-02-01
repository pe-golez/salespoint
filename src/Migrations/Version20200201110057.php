<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200201110057 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE invoice_detail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE invoice_header_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE invoice_detail (id INT NOT NULL, item_id INT DEFAULT NULL, invoice_id INT NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9530E2C0126F525E ON invoice_detail (item_id)');
        $this->addSql('CREATE INDEX IDX_9530E2C02989F1FD ON invoice_detail (invoice_id)');
        $this->addSql('CREATE TABLE invoice_header (id INT NOT NULL, invoice_number VARCHAR(255) NOT NULL, transaction_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE invoice_detail ADD CONSTRAINT FK_9530E2C0126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice_detail ADD CONSTRAINT FK_9530E2C02989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice_header (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE invoice_detail DROP CONSTRAINT FK_9530E2C02989F1FD');
        $this->addSql('DROP SEQUENCE invoice_detail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE invoice_header_id_seq CASCADE');
        $this->addSql('DROP TABLE invoice_detail');
        $this->addSql('DROP TABLE invoice_header');
    }
}
