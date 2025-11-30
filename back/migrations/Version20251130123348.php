<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251130123348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_course (user_id INT NOT NULL, course_id INT NOT NULL, PRIMARY KEY (user_id, course_id))');
        $this->addSql('CREATE INDEX IDX_73CC7484A76ED395 ON user_course (user_id)');
        $this->addSql('CREATE INDEX IDX_73CC7484591CC992 ON user_course (course_id)');
        $this->addSql('ALTER TABLE user_course ADD CONSTRAINT FK_73CC7484A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_course ADD CONSTRAINT FK_73CC7484591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d649d60322ac');
        $this->addSql('DROP INDEX idx_8d93d649d60322ac');
        $this->addSql('ALTER TABLE "user" ADD role VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP favorite_courses');
        $this->addSql('ALTER TABLE "user" DROP role_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_course DROP CONSTRAINT FK_73CC7484A76ED395');
        $this->addSql('ALTER TABLE user_course DROP CONSTRAINT FK_73CC7484591CC992');
        $this->addSql('DROP TABLE user_course');
        $this->addSql('ALTER TABLE "user" ADD favorite_courses JSON NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE "user" DROP role');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d649d60322ac FOREIGN KEY (role_id) REFERENCES role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_8d93d649d60322ac ON "user" (role_id)');
    }
}
