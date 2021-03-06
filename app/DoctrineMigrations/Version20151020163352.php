<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151020163352 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE self_user DROP FOREIGN KEY FK_3303DEF8591CC992');
        $this->addSql('ALTER TABLE self_user DROP FOREIGN KEY FK_3303DEF810405986');
        $this->addSql('ALTER TABLE self_user ADD CONSTRAINT FK_3303DEF8591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE self_user ADD CONSTRAINT FK_3303DEF810405986 FOREIGN KEY (institution_id) REFERENCES institution (id) ON DELETE SET NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE self_user DROP FOREIGN KEY FK_3303DEF810405986');
        $this->addSql('ALTER TABLE self_user DROP FOREIGN KEY FK_3303DEF8591CC992');
        $this->addSql('ALTER TABLE self_user ADD CONSTRAINT FK_3303DEF810405986 FOREIGN KEY (institution_id) REFERENCES institution (id)');
        $this->addSql('ALTER TABLE self_user ADD CONSTRAINT FK_3303DEF8591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
    }
}
