<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717210439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Added advert entity';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE advert_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE advert (id BIGINT NOT NULL, type_id BIGINT DEFAULT NULL, category_id BIGINT DEFAULT NULL, name VARCHAR(75) NOT NULL, description TEXT DEFAULT NULL, price NUMERIC(23, 2) DEFAULT NULL, slug VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_54F1F40BC54C8C93 ON advert (type_id)');
        $this->addSql('CREATE INDEX IDX_54F1F40B12469DE2 ON advert (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_54F1F40B5E237E06C54C8C9312469DE2 ON advert (name, type_id, category_id)');
        $this->addSql('COMMENT ON COLUMN advert.name IS \'Наименование объявления\'');
        $this->addSql('COMMENT ON COLUMN advert.description IS \'Описание объявления\'');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40BC54C8C93 FOREIGN KEY (type_id) REFERENCES advert_type (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE advert ADD CONSTRAINT FK_54F1F40B12469DE2 FOREIGN KEY (category_id) REFERENCES advert_category (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_84EEA3405E237E06 ON advert_category (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C5FE16645E237E06 ON advert_type (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE advert_id_seq CASCADE');
        $this->addSql('ALTER TABLE advert DROP CONSTRAINT FK_54F1F40BC54C8C93');
        $this->addSql('ALTER TABLE advert DROP CONSTRAINT FK_54F1F40B12469DE2');
        $this->addSql('DROP TABLE advert');
        $this->addSql('DROP INDEX UNIQ_C5FE16645E237E06');
        $this->addSql('DROP INDEX UNIQ_84EEA3405E237E06');
    }
}
