<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810092233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, garage_id INT DEFAULT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, year VARCHAR(255) NOT NULL, kilometer VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, fuel VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_F65593E5C4FFF555 (garage_id), INDEX IDX_F65593E5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE garage ADD user_id INT DEFAULT NULL, ADD garage_id INT DEFAULT NULL, ADD telephone VARCHAR(255) NOT NULL, DROP codepostal, DROP city');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_9F26610BA76ED395 ON garage (user_id)');
        $this->addSql('CREATE INDEX IDX_9F26610BC4FFF555 ON garage (garage_id)');
        $this->addSql('ALTER TABLE user ADD siret VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, DROP last_name, DROP first_name, DROP number_siret, CHANGE telephone telephone VARCHAR(255) NOT NULL, CHANGE role role VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE annonce');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BA76ED395');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BC4FFF555');
        $this->addSql('DROP INDEX IDX_9F26610BA76ED395 ON garage');
        $this->addSql('DROP INDEX IDX_9F26610BC4FFF555 ON garage');
        $this->addSql('ALTER TABLE garage ADD city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP user_id, DROP garage_id, CHANGE telephone codepostal VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user ADD last_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD first_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD number_siret INT NOT NULL, DROP siret, DROP firstname, DROP lastname, CHANGE telephone telephone INT NOT NULL, CHANGE role role JSON NOT NULL');
    }
}
