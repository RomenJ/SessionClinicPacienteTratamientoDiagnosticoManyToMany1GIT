<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321184045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE diagnostico (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paciente (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paciente_tratamiento (paciente_id INT NOT NULL, tratamiento_id INT NOT NULL, INDEX IDX_2BE190C97310DAD4 (paciente_id), INDEX IDX_2BE190C944168F7D (tratamiento_id), PRIMARY KEY(paciente_id, tratamiento_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paciente_diagnostico (paciente_id INT NOT NULL, diagnostico_id INT NOT NULL, INDEX IDX_D1D4E4FD7310DAD4 (paciente_id), INDEX IDX_D1D4E4FD7A94BA1A (diagnostico_id), PRIMARY KEY(paciente_id, diagnostico_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terapeuta (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tratamiento (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE paciente_tratamiento ADD CONSTRAINT FK_2BE190C97310DAD4 FOREIGN KEY (paciente_id) REFERENCES paciente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paciente_tratamiento ADD CONSTRAINT FK_2BE190C944168F7D FOREIGN KEY (tratamiento_id) REFERENCES tratamiento (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paciente_diagnostico ADD CONSTRAINT FK_D1D4E4FD7310DAD4 FOREIGN KEY (paciente_id) REFERENCES paciente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paciente_diagnostico ADD CONSTRAINT FK_D1D4E4FD7A94BA1A FOREIGN KEY (diagnostico_id) REFERENCES diagnostico (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paciente_tratamiento DROP FOREIGN KEY FK_2BE190C97310DAD4');
        $this->addSql('ALTER TABLE paciente_tratamiento DROP FOREIGN KEY FK_2BE190C944168F7D');
        $this->addSql('ALTER TABLE paciente_diagnostico DROP FOREIGN KEY FK_D1D4E4FD7310DAD4');
        $this->addSql('ALTER TABLE paciente_diagnostico DROP FOREIGN KEY FK_D1D4E4FD7A94BA1A');
        $this->addSql('DROP TABLE diagnostico');
        $this->addSql('DROP TABLE paciente');
        $this->addSql('DROP TABLE paciente_tratamiento');
        $this->addSql('DROP TABLE paciente_diagnostico');
        $this->addSql('DROP TABLE terapeuta');
        $this->addSql('DROP TABLE tratamiento');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
