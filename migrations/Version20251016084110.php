<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251016084110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adoption (id INT AUTO_INCREMENT NOT NULL, adoptant_id INT NOT NULL, animal_id INT NOT NULL, date_adoption DATE NOT NULL, prix_adoption NUMERIC(8, 2) DEFAULT NULL, statut LONGTEXT DEFAULT NULL, INDEX IDX_EDDEB6A98D8B49F9 (adoptant_id), INDEX IDX_EDDEB6A98E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adptant (id INT AUTO_INCREMENT NOT NULL, nom_adoptant LONGTEXT NOT NULL, prenom_adoptant LONGTEXT NOT NULL, adresse_adoptant LONGTEXT NOT NULL, telephone_adoptant LONGTEXT NOT NULL, genre_animal_souhaite LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE allee (id INT AUTO_INCREMENT NOT NULL, employe_id INT NOT NULL, numero_allee LONGTEXT NOT NULL, INDEX IDX_771FD92A1B65292 (employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, famille_id INT NOT NULL, carnet_de_sante_id INT NOT NULL, menu_id INT NOT NULL, cage_id INT NOT NULL, nom_animal VARCHAR(100) NOT NULL, race VARCHAR(50) NOT NULL, sexe VARCHAR(1) NOT NULL, date_naissance DATE DEFAULT NULL, date_arrivee DATE NOT NULL, domestique_sauvage VARCHAR(100) NOT NULL, adoptable TINYINT(1) NOT NULL, INDEX IDX_6AAB231F97A77B84 (famille_id), INDEX IDX_6AAB231F8B20F9C8 (carnet_de_sante_id), INDEX IDX_6AAB231FCCD7E912 (menu_id), INDEX IDX_6AAB231F5A70E5B7 (cage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cage (id INT AUTO_INCREMENT NOT NULL, fonctionnalite_id INT NOT NULL, allee_id INT NOT NULL, numero_cage VARCHAR(255) NOT NULL, INDEX IDX_56A64E514477C5D8 (fonctionnalite_id), INDEX IDX_56A64E518E6975D2 (allee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cage_employe (id INT AUTO_INCREMENT NOT NULL, cage_id INT NOT NULL, employe_id INT NOT NULL, date_debut DATE NOT NULL, INDEX IDX_79E207205A70E5B7 (cage_id), INDEX IDX_79E207201B65292 (employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carnet_sante (id INT AUTO_INCREMENT NOT NULL, date_creation DATE NOT NULL, observations_generales LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, nom_classe LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contraction (id INT AUTO_INCREMENT NOT NULL, carnet_sante_id INT NOT NULL, maladie_id INT NOT NULL, date_contraction DATE NOT NULL, INDEX IDX_B31F3747590947D0 (carnet_sante_id), INDEX IDX_B31F3747B4B1C397 (maladie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, ville_residence_id INT NOT NULL, nom_employe VARCHAR(50) NOT NULL, prenom_employe VARCHAR(50) NOT NULL, age INT DEFAULT NULL, sexe VARCHAR(1) NOT NULL, poste VARCHAR(50) NOT NULL, INDEX IDX_F804D3B9FD871CC9 (ville_residence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, ordre_id INT NOT NULL, nom_famille LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_2473F2139291498C (ordre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonctionnalite (id INT AUTO_INCREMENT NOT NULL, nom LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladie (id INT AUTO_INCREMENT NOT NULL, nom_maladie LONGTEXT NOT NULL, type_maladie LONGTEXT NOT NULL, contagiosite TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, quantite_viande NUMERIC(5, 2) NOT NULL, quantite_legumes NUMERIC(5, 2) NOT NULL, type_menu LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordre (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, nom LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_737992C98F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom_pays VARCHAR(50) NOT NULL, continent VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provenance (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, pays_id INT NOT NULL, date_arrivee_pays DATE NOT NULL, date_depart_pays DATE NOT NULL, motif_transfert LONGTEXT DEFAULT NULL, INDEX IDX_8105DD818E962C16 (animal_id), INDEX IDX_8105DD81A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccin (id INT AUTO_INCREMENT NOT NULL, nom_vaccin LONGTEXT NOT NULL, type_vaccin LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccination (id INT AUTO_INCREMENT NOT NULL, carnet_de_sante_id INT DEFAULT NULL, vaccin_id INT NOT NULL, date_vaccination DATE NOT NULL, date_prochaine_vaccination DATE DEFAULT NULL, INDEX IDX_1B0999998B20F9C8 (carnet_de_sante_id), INDEX IDX_1B0999999B14AC76 (vaccin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville_residence (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(50) NOT NULL, code_postal VARCHAR(10) NOT NULL, pays VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adoption ADD CONSTRAINT FK_EDDEB6A98D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adptant (id)');
        $this->addSql('ALTER TABLE adoption ADD CONSTRAINT FK_EDDEB6A98E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE allee ADD CONSTRAINT FK_771FD92A1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F8B20F9C8 FOREIGN KEY (carnet_de_sante_id) REFERENCES carnet_sante (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F5A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id)');
        $this->addSql('ALTER TABLE cage ADD CONSTRAINT FK_56A64E514477C5D8 FOREIGN KEY (fonctionnalite_id) REFERENCES fonctionnalite (id)');
        $this->addSql('ALTER TABLE cage ADD CONSTRAINT FK_56A64E518E6975D2 FOREIGN KEY (allee_id) REFERENCES allee (id)');
        $this->addSql('ALTER TABLE cage_employe ADD CONSTRAINT FK_79E207205A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id)');
        $this->addSql('ALTER TABLE cage_employe ADD CONSTRAINT FK_79E207201B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE contraction ADD CONSTRAINT FK_B31F3747590947D0 FOREIGN KEY (carnet_sante_id) REFERENCES carnet_sante (id)');
        $this->addSql('ALTER TABLE contraction ADD CONSTRAINT FK_B31F3747B4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladie (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9FD871CC9 FOREIGN KEY (ville_residence_id) REFERENCES ville_residence (id)');
        $this->addSql('ALTER TABLE famille ADD CONSTRAINT FK_2473F2139291498C FOREIGN KEY (ordre_id) REFERENCES ordre (id)');
        $this->addSql('ALTER TABLE ordre ADD CONSTRAINT FK_737992C98F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE provenance ADD CONSTRAINT FK_8105DD818E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE provenance ADD CONSTRAINT FK_8105DD81A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE vaccination ADD CONSTRAINT FK_1B0999998B20F9C8 FOREIGN KEY (carnet_de_sante_id) REFERENCES carnet_sante (id)');
        $this->addSql('ALTER TABLE vaccination ADD CONSTRAINT FK_1B0999999B14AC76 FOREIGN KEY (vaccin_id) REFERENCES vaccin (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoption DROP FOREIGN KEY FK_EDDEB6A98D8B49F9');
        $this->addSql('ALTER TABLE adoption DROP FOREIGN KEY FK_EDDEB6A98E962C16');
        $this->addSql('ALTER TABLE allee DROP FOREIGN KEY FK_771FD92A1B65292');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F97A77B84');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F8B20F9C8');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FCCD7E912');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F5A70E5B7');
        $this->addSql('ALTER TABLE cage DROP FOREIGN KEY FK_56A64E514477C5D8');
        $this->addSql('ALTER TABLE cage DROP FOREIGN KEY FK_56A64E518E6975D2');
        $this->addSql('ALTER TABLE cage_employe DROP FOREIGN KEY FK_79E207205A70E5B7');
        $this->addSql('ALTER TABLE cage_employe DROP FOREIGN KEY FK_79E207201B65292');
        $this->addSql('ALTER TABLE contraction DROP FOREIGN KEY FK_B31F3747590947D0');
        $this->addSql('ALTER TABLE contraction DROP FOREIGN KEY FK_B31F3747B4B1C397');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B9FD871CC9');
        $this->addSql('ALTER TABLE famille DROP FOREIGN KEY FK_2473F2139291498C');
        $this->addSql('ALTER TABLE ordre DROP FOREIGN KEY FK_737992C98F5EA509');
        $this->addSql('ALTER TABLE provenance DROP FOREIGN KEY FK_8105DD818E962C16');
        $this->addSql('ALTER TABLE provenance DROP FOREIGN KEY FK_8105DD81A6E44244');
        $this->addSql('ALTER TABLE vaccination DROP FOREIGN KEY FK_1B0999998B20F9C8');
        $this->addSql('ALTER TABLE vaccination DROP FOREIGN KEY FK_1B0999999B14AC76');
        $this->addSql('DROP TABLE adoption');
        $this->addSql('DROP TABLE adptant');
        $this->addSql('DROP TABLE allee');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE cage');
        $this->addSql('DROP TABLE cage_employe');
        $this->addSql('DROP TABLE carnet_sante');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE contraction');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE fonctionnalite');
        $this->addSql('DROP TABLE maladie');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE ordre');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE provenance');
        $this->addSql('DROP TABLE vaccin');
        $this->addSql('DROP TABLE vaccination');
        $this->addSql('DROP TABLE ville_residence');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
