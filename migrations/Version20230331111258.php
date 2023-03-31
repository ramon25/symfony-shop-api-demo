<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230331111258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart_user (cart_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6276D6701AD5CDBF (cart_id), INDEX IDX_6276D670A76ED395 (user_id), PRIMARY KEY(cart_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart_user ADD CONSTRAINT FK_6276D6701AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_user ADD CONSTRAINT FK_6276D670A76ED395 FOREIGN KEY (user_id) REFERENCES security_user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_user DROP FOREIGN KEY FK_6276D6701AD5CDBF');
        $this->addSql('ALTER TABLE cart_user DROP FOREIGN KEY FK_6276D670A76ED395');
        $this->addSql('DROP TABLE cart_user');
    }
}
