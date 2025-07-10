<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210609162526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE apply (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apply_user (apply_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F7F37EAA4DDCCBDE (apply_id), INDEX IDX_F7F37EAAA76ED395 (user_id), PRIMARY KEY(apply_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apply_annonce (apply_id INT NOT NULL, annonce_id INT NOT NULL, INDEX IDX_769DAADF4DDCCBDE (apply_id), INDEX IDX_769DAADF8805AB2F (annonce_id), PRIMARY KEY(apply_id, annonce_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apply_user ADD CONSTRAINT FK_F7F37EAA4DDCCBDE FOREIGN KEY (apply_id) REFERENCES apply (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apply_user ADD CONSTRAINT FK_F7F37EAAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apply_annonce ADD CONSTRAINT FK_769DAADF4DDCCBDE FOREIGN KEY (apply_id) REFERENCES apply (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apply_annonce ADD CONSTRAINT FK_769DAADF8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE location location VARCHAR(255) NOT NULL, CHANGE expire expire DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE job job VARCHAR(90) DEFAULT NULL, CHANGE num_tel num_tel BIGINT DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE image_profil image_profil VARCHAR(255) DEFAULT NULL, CHANGE lastname lastname VARCHAR(90) DEFAULT NULL, CHANGE firstname firstname VARCHAR(90) DEFAULT NULL, CHANGE zip zip INT DEFAULT NULL, CHANGE exp exp INT DEFAULT NULL, CHANGE age age INT DEFAULT NULL, CHANGE etat etat VARCHAR(255) DEFAULT NULL, CHANGE sex sex VARCHAR(255) DEFAULT NULL, CHANGE qualification qualification VARCHAR(255) DEFAULT NULL, CHANGE titre1 titre1 VARCHAR(255) DEFAULT NULL, CHANGE institut1 institut1 VARCHAR(255) DEFAULT NULL, CHANGE periode1 periode1 VARCHAR(255) DEFAULT NULL, CHANGE description1 description1 VARCHAR(255) DEFAULT NULL, CHANGE titre2 titre2 VARCHAR(255) DEFAULT NULL, CHANGE institut2 institut2 VARCHAR(255) DEFAULT NULL, CHANGE periode2 periode2 VARCHAR(255) DEFAULT NULL, CHANGE description2 description2 VARCHAR(255) DEFAULT NULL, CHANGE work1 work1 VARCHAR(255) DEFAULT NULL, CHANGE company1 company1 VARCHAR(255) DEFAULT NULL, CHANGE workperiod1 workperiod1 VARCHAR(255) DEFAULT NULL, CHANGE workdescription1 workdescription1 VARCHAR(255) DEFAULT NULL, CHANGE work2 work2 VARCHAR(255) DEFAULT NULL, CHANGE company2 company2 VARCHAR(255) DEFAULT NULL, CHANGE workperiod2 workperiod2 VARCHAR(255) DEFAULT NULL, CHANGE workdescription2 workdescription2 VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL, CHANGE bio bio VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE apply_user DROP FOREIGN KEY FK_F7F37EAA4DDCCBDE');
        $this->addSql('ALTER TABLE apply_annonce DROP FOREIGN KEY FK_769DAADF4DDCCBDE');
        $this->addSql('DROP TABLE apply');
        $this->addSql('DROP TABLE apply_user');
        $this->addSql('DROP TABLE apply_annonce');
        $this->addSql('ALTER TABLE annonce CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE location location VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE expire expire DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE job job VARCHAR(90) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(90) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE firstname firstname VARCHAR(90) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE num_tel num_tel BIGINT DEFAULT NULL, CHANGE zip zip INT DEFAULT NULL, CHANGE exp exp INT DEFAULT NULL, CHANGE age age INT DEFAULT NULL, CHANGE etat etat VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE sex sex VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE qualification qualification VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE titre1 titre1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE institut1 institut1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE periode1 periode1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description1 description1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE titre2 titre2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE institut2 institut2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE periode2 periode2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description2 description2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE work1 work1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE company1 company1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE workperiod1 workperiod1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE workdescription1 workdescription1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE work2 work2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE company2 company2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE workperiod2 workperiod2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE workdescription2 workdescription2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE country country VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE bio bio VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE city city VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE image_profil image_profil VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
